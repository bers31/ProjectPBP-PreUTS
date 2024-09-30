<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil data login
        $credentials = $request->only('username', 'password');

        // Cek apakah username dan password valid
        if (Auth::attempt($credentials)) {
            // Jika berhasil login, redirect ke dashboard
            return redirect()->intended('/dashboard_mahasiswa');
        }

        // Jika gagal login, kembalikan ke halaman login dengan pesan error
        return back()->with('loginError', 'Username atau password salah.');
    }
}