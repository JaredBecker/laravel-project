<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

// All listings
Route::get('/', [ListingController::class, 'index']);

// Show create form
Route::get('/listing/create', [ListingController::class, 'create']);

// Store listing data
Route::post('/listings', [ListingController::class, 'store']);

// Single listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);

// Example of how to use request params and how to validate them using where
// Route::get('/posts/{id}', function ($id) {
//     return response('Lookup post: ' . $id);
// })->where('id', '[0-9]+');

// // Example of how to use query params
// Route::get('/search', function (Request $request) {
//     // dd($request->name);
//     return "{$request->name} is {$request->age} years old";
// });
