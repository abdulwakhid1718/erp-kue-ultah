<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\BahanBaku;
use App\Models\DesainKue;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        // Mengambil jumlah bahan baku
        $jumlahBahanBaku = BahanBaku::count();

        // Mengambil jumlah pegawai
        $jumlahPegawai = Pegawai::count();

        // Mengambil jumlah produk terjual (disesuaikan dengan struktur data Anda)
        $JumlahPelanggan = Pelanggan::count();
        $jumlahDesain = DesainKue::count();

        return view('admin.dashboard', [
            'jumlahBahanBaku' => $jumlahBahanBaku,
            'jumlahPegawai' => $jumlahPegawai,
            'jumlahPelanggan' => $JumlahPelanggan,
            'jumlahDesain' => $jumlahDesain,
        ]);
    }
}
