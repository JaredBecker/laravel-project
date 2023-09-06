<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// All listings
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listing',
        'sub_heading' => 'Find the latest Laravel jobs near you',
        'listings' => Listing::all(),
    ]);
});

// Single listing
Route::get('/listing/{id}', function ($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});

// Example of how to use request params and how to validate them using where
// Route::get('/posts/{id}', function ($id) {
//     return response('Lookup post: ' . $id);
// })->where('id', '[0-9]+');

// // Example of how to use query params
// Route::get('/search', function (Request $request) {
//     // dd($request->name);
//     return "{$request->name} is {$request->age} years old";
// });
