<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('pegawai')->attempt($credentials)) {
            // Otentikasi berhasil
            $pegawai = Auth::guard('pegawai')->user();
    
            // Periksa jabatan
            if ($pegawai->jabatan->nama_jabatan === 'Manager Penjualan') {
                // Jabatan adalah manager, regenerasi sesi dan redirect ke halaman admin
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }
            else if ($pegawai->jabatan->nama_jabatan === 'HR Manager') {
                // Jabatan adalah manager, regenerasi sesi dan redirect ke halaman admin
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }
            else if ($pegawai->jabatan->nama_jabatan === 'Operations Manager') {
                // Jabatan adalah manager, regenerasi sesi dan redirect ke halaman admin
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            } 
            else if ($pegawai->jabatan->nama_jabatan === 'Manajer Pergudangan') {
                // Jabatan adalah manager, regenerasi sesi dan redirect ke halaman admin
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            } 
            else if ($pegawai->jabatan->nama_jabatan === 'Owner') {
                // Jabatan adalah manager, regenerasi sesi dan redirect ke halaman admin
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            } 
            else {
                // Jabatan bukan manager, logout dan kembalikan dengan pesan error
                Auth::guard('pegawai')->logout();
                return back()->withErrors([
                    'username' => 'Anda tidak memiliki hak akses.',
                ]);
            }
        }
    
        // Otentikasi gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('pegawai')->logout(); // Memanggil fungsi logout dari guard pegawai
        $request->session()->invalidate(); // Menghapus sesi pegawai
        $request->session()->regenerateToken(); // Me-regenerate token sesi

        return redirect('/login'); // Redirect ke halaman utama atau halaman login
    }
}
