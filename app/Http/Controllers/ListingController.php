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
    public function index() {
        // Using Listing::latest() gives you all records sorted in the latest order. This is a built in function
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get(),
        ]);
    }

    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show create form
    public function create() {
        return view('listings.create');
    }

    // Store listing data
    public function store(Request $request) {
        $form_fields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        Listing::create($form_fields);

        return redirect('/');
    }
}
