<?php

namespace App\Http\Controllers;

use App\Models\Listing;

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
}
