<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show registration form
    public function create() {
        return view('users.register');
    }

    public function store(Request $request) {
        $form_fields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash password
        $form_fields['password'] = bcrypt($form_fields['password']);

        // Create User
        $user = User::create($form_fields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in!');
    }

    public function logout(Request $request) {
        // Logout
        auth()->logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate csrf token
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }
}
