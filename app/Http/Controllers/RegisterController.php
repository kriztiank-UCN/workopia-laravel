<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Types
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    // @desc  Show register form
    // @route GET /register
    public function register(): View
    {
        return view('auth.register');
    }

    // @desc  Store new user
    // @route POST /register
    public function store(Request $request): RedirectResponse
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create a new user
        $user = User::create($validatedData);

        return redirect()->route('login')->with('success', 'Registration successful You can now log in!');

        // print_r($validatedData);
        // die();
    }
}
