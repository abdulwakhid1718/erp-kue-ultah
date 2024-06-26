<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\DesainKue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $cakes = DesainKue::with('ukuran_kue')->get(); // Contoh pengambilan semua data dari model Cake

        return view('user.home', ['cakes' => $cakes]);
    }

    public function beli($id)
    {
        $cake = DesainKue::findOrFail($id);

        return view('user.detail', compact('cake'));
    }

    public function list_pesanan()
    {
        $pelanggan = Auth::guard('pelanggan')->user();
        $pesanans = Pesanan::with('detail_pesanans.desain_kue.ukuran_kue')
                            ->where('pelanggan_id', $pelanggan->id)
                            ->get();
        return view('user.list_pesanan', compact('pesanans'));
    }

}
