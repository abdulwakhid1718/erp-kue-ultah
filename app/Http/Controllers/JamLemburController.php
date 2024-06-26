<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\JamLembur;
use Illuminate\Http\Request;

class JamLemburController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        $jamlemburs = JamLembur::all();
        return view('admin.jamlembur.index', compact('pegawais', 'jamlemburs'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'tanggal' => 'required|date',
            'jam_lembur' => 'required|integer|min:0',
            'tarif_lembur' => 'required|numeric|min:0',
        ]);

        // Hitung total biaya lembur
        $totalBiayaLembur = $request->jam_lembur * $request->tarif_lembur;

        // Simpan ke database
        JamLembur::create([
            'pegawai_id' => $request->pegawai_id,
            'tanggal' => $request->tanggal,
            'jam_lembur' => $request->jam_lembur,
            'tarif_lembur' => $totalBiayaLembur,
        ]);

        return redirect()->back()->with('success', 'Jam lembur berhasil dicatat.');
    }
}
