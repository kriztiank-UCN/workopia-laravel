<?php

namespace App\Http\Controllers;

use App\Models\User;
// Types
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

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
        
        // Optionally, you can log the user in after registration
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful!');

        // print_r($validatedData);
        // die();
    }
}
