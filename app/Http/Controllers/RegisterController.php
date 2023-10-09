<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'between:4,255'],
            'username' => ['required', 'between:4,255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:6', 'max:255'],
        ]);

        User::create($attributes);

        redirect('/');
    }
}
