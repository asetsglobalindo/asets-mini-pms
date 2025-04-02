<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginAttempt(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'remember' => 'nullable|boolean', // Optional, check if 'remember' is passed
        ]);

        // Ambil data dari form
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Cek apakah pengguna ingin tetap login (remember me)
        $remember = $request->remember ? true : false;

        // Cek kredensial dan login
        if (Auth::attempt($credentials, $remember)) {
            // Jika login berhasil, redirect ke halaman utama atau dashboard
            return redirect()->intended('/');
        } else {
            // Jika login gagal, kembalikan error
            return back()->withErrors(['email' => 'Email atau password salah.'])->withInput($request->only('email'));
        }
    }

    public function logout()
    {
        auth()->logout(); // Logout pengguna
        return redirect()->route('login');
    }
}
