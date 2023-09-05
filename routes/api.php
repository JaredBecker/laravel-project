<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Example of how you would create an endpoint
// These routes need to be prefixed with api/ when accessing them ie test.co.za/api/posts
Route::get('/posts', function() {
    $dummy_data = [
        'author' => 'Jared',
        'date_posted' => new DateTime(),
        'likes' => 69,
        'comments' => 420,
    ];

    return response()->json($dummy_data);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
