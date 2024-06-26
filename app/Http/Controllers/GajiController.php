<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGajiRequest;
use App\Http\Requests\UpdateGajiRequest;

class GajiController extends Controller
{
    public function index()
    {
        $gajis = Gaji::with('pegawai')->get();
        $pegawais = Pegawai::with('jabatan')->get();
        return view('admin.gajis.index', compact('pegawais', 'gajis'));
    }

    public function create(Request $request)
    {
        $pegawai = Pegawai::with('jamLembur')->findOrFail($request->pegawai_id);
        
        // Menghitung total jam lembur dan tarif lembur
        $totalJamLembur = $pegawai->jamLembur->sum('jam_lembur');
        $totalTarifLembur = $pegawai->jamLembur->sum(function($lembur) {
            return $lembur->jam_lembur * $lembur->tarif_lembur;
        });

        return view('admin.gajis.create', compact('pegawai', 'totalJamLembur', 'totalTarifLembur'));
    }

    public function store(StoreGajiRequest $request)
    {
        $validatedData = $request->validated();
        // Simpan data ke dalam database
        Gaji::create($validatedData);

        return redirect('admin/gaji')->with('success', 'Gaji berhasil ditambahkan');
    }
}