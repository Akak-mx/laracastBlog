<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $atrributes = request()->validate([
            'email' => ['required', 'exists:users,email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($atrributes)) {
            session()->regenerate(); // to avoid user theft validation by malignant users

            return redirect('/')->with('success', 'Welcome back!');
        }

        // most used redirect with errors option
        throw ValidationException::withMessages([
            'email' => 'provided credentials cannot be verified',
        ]);
        // Basic redirect with errors option
        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'provided credentials cannot be verified']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
