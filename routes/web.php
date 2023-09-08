<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// All listings
Route::get('/', [ListingController::class, 'index']);

// Show create form
Route::get('/listings/create', [ListingController::class, 'create'])
    ->middleware('auth');

// Store listing data
Route::post('/listings', [ListingController::class, 'store'])
    ->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage']);

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])
    ->middleware('auth');

// Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])
    ->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])
    ->middleware('auth');

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show registration form
Route::get('/register', [UserController::class, 'create'])
    ->middleware('guest');

// Show login form
Route::get('/login', [UserController::class, 'login'])
    ->name('login')
    ->middleware('guest');

// Logout
Route::post('/logout', [UserController::class, 'logout']);

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Example of how to use request params and how to validate them using where
// Route::get('/posts/{id}', function ($id) {
//     return response('Lookup post: ' . $id);
// })->where('id', '[0-9]+');

// // Example of how to use query params
// Route::get('/search', function (Request $request) {
//     // dd($request->name);
//     return "{$request->name} is {$request->age} years old";
// });
