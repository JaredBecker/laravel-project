<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Laravel best practice when it comes to naming controller functions
 *
 * index - Get all resources
 * show - Show single resource
 * create - Show form to create new resource
 * store - Store new resource
 * edit - Show form to edit resource
 * update - Update resource
 * destroy - Delete resource
 */

class ListingController extends Controller
{
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(6)
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show create form
    public function create()
    {
        return view('listings.create');
    }

    // Store listing data
    public function store(Request $request)
    {
        $form_fields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $form_fields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Gets the ID of the currently logged in user
        $form_fields['user_id'] = auth()->id();

        Listing::create($form_fields);

        return redirect('/')->with('message', 'Job Listing Created Successfully!');
    }

    public function edit(Listing $listing)
    {
        // Make sure logged in user is owner of listing
        if ($listing->user_id != auth()->id()) {
            return redirect('/')->with('message', 'You can not edit other users listings!');
        }

        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        $form_fields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $form_fields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($form_fields);

        return back()->with('message', 'Job Listing Updated Successfully!');
    }

    public function destroy(Listing $listing)
    {
        // Make sure logged in user is owner of listing
        if ($listing->user_id != auth()->id()) {
            return redirect('/')->with('message', 'You can not edit other users listings!');
        }

        $listing->delete();

        return redirect('/')->with('message', 'Job Listing Deleted Successfully!');
    }

    // Manage Listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
