<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $title = 'Halaman Login';

        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login', compact('title'));
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'username'  => 'required',
            'password'  => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login Berhasil');
        }
        return back()->with('error', 'Username atau password salah');
    }
}
