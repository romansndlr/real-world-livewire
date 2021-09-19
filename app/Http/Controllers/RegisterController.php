<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;

class RegisterController extends Controller
{
    public function __invoke()
    {
        $attributes = request()->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'username' => 'required|min:3',
        ]);

        $user = User::create([
            'email' => $attributes['email'],
            'password' => Hash::make($attributes['password']),
            'username' => $attributes['username'],
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
}
