<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses pengecekan username & password saat tombol ditekan
    public function login(Request $request)
    {
        // Validasi wajib isi
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Cek ke database apakah cocok?
        if (Auth::attempt($credentials)) {
            // Kalau cocok, buatin sesi masuk dan lempar ke Dashboard
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        // Kalau gagal/tidak cocok, tendang balik ke halaman login bawa pesan error
        return back()->withErrors([
            'username' => 'Username atau Password salah, sob!',
        ]);
    }

    // Proses Keluar (Logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
