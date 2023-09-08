<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // This checks if a user is authenticated and if not it redirects to a route NAMED login. You need to add ->name('login')
        // to the route so it knows which on to load
        return $request->expectsJson() ? null : route('login');
    }
}
