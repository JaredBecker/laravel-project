<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [ListingController::class, 'index']);

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
