<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Devisi;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        return view('admin.jabatan.index', [
            'jabatans' => $jabatan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $devisi = Devisi::all();
        return view('admin.jabatan.create', compact('devisi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(StoreJabatanRequest $request)
    {
        // Validasi data dari request
        $validatedData = $request->validated();

        // Simpan data ke dalam database
        Jabatan::create($validatedData);

        // Redirect ke halaman yang sesuai
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $Jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $devisi = Devisi::all();
        return view('admin.Jabatan.edit', [
            'jabatan' => $jabatan,
            'devisi' => $devisi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJabatanRequest $request, $id)
    {
        /// Validasi data dari request
        $validatedData = $request->validated();

        // Temukan Jabatan berdasarkan ID
        $jabatan = Jabatan::findOrFail($id);

        // Update data di dalam database
        $jabatan->update($validatedData);

        // Redirect ke halaman yang sesuai
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan Jabatan berdasarkan ID
       $jabatan = Jabatan::findOrFail($id);

       // Hapus Jabatan
       $jabatan->delete();

       // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
       return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}
