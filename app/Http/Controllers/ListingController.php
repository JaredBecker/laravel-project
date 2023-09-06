<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

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
        return view('listings.index', [
            'listings' => Listing::all(),
        ]);
    }

    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}
