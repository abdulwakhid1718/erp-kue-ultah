<?php

namespace App\Http\Controllers\Auth;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('pelanggan')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('user.registrasi');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'username' => $request->username,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login/pelanggan')->with('success', 'Registration successful. Please login.');
    }

    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout(); // Memanggil fungsi logout dari guard pegawai
        $request->session()->invalidate(); // Menghapus sesi pegawai
        $request->session()->regenerateToken(); // Me-regenerate token sesi

        return redirect('/'); // Redirect ke halaman utama atau halaman login
    }
}
