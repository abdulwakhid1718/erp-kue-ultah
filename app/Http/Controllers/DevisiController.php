<?php

namespace App\Http\Controllers;

use App\Models\Devisi;
use App\Http\Requests\StoreDevisiRequest;
use App\Http\Requests\UpdateDevisiRequest;

class DevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devisi = Devisi::all();
        return view('admin.devisi.index', [
            'devisis' => $devisi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.devisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDevisiRequest $request)
    {
        // Validasi data dari request
        $validatedData = $request->validated();

        // Simpan data ke dalam database
        Devisi::create($validatedData);

        // Redirect ke halaman yang sesuai
        return redirect()->route('devisi.index')->with('success', 'Devisi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Devisi $devisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $devisi = Devisi::findOrFail($id);
        return view('admin.devisi.edit', [
            'devisi' => $devisi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDevisiRequest $request, $id)
    {
        /// Validasi data dari request
        $validatedData = $request->validated();

        // Temukan devisi berdasarkan ID
        $devisi = Devisi::findOrFail($id);

        // Update data di dalam database
        $devisi->update($validatedData);

        // Redirect ke halaman yang sesuai
        return redirect()->route('devisi.index')->with('success', 'Devisi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan devisi berdasarkan ID
       $devisi = Devisi::findOrFail($id);

       // Hapus devisi
       $devisi->delete();

       // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
       return redirect()->route('devisi.index')->with('success', 'Devisi berhasil dihapus.');
    }
}
