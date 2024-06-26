<?php

namespace App\Http\Controllers;

use App\Models\DesainKue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDesainKueRequest;
use App\Http\Requests\UpdateDesainKueRequest;

class DesainKueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cakeDesigns = DesainKue::with('ukuran_kue')->get();
        return view('admin.desainkue.index', compact('cakeDesigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.desainkue.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nama_kue' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sizes.*.ukuran' => 'required|string',
            'sizes.*.harga' => 'required|numeric',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('desain_kue', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $cakeDesign = DesainKue::create([
            'nama_kue' => $validatedData['nama_kue'],
            'deskripsi' => $validatedData['deskripsi'],
            'gambar' => $validatedData['image_path'] ?? null,
        ]);

        foreach ($request->sizes as $size) {
            $cakeDesign->ukuran_kue()->create([
                'ukuran' => $size['ukuran'],
                'harga' => $size['harga'],
            ]);
        }

        return redirect('/admin/desainkue')->with('success', 'Desain kue berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DesainKue $desainKue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cakeDesign = DesainKue::with('ukuran_kue')->findOrFail($id);
        return view('admin.desainkue.edit', compact('cakeDesign'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kue' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'sizes.*.ukuran' => 'required|string|max:255',
            'sizes.*.harga' => 'required|numeric|min:0',
        ]);
    
        $cakeDesign = DesainKue::findOrFail($id);
        $cakeDesign->nama_kue = $request->nama_kue;
        $cakeDesign->deskripsi = $request->deskripsi;
    
        if ($request->hasFile('image')) {
            if ($cakeDesign->gambar) {
                Storage::delete('public/' . $cakeDesign->gambar);
            }
            $path = $request->file('image')->store('desain_kue', 'public');
            $cakeDesign->gambar = $path;
        }
    
        $cakeDesign->save();
    
        // Hapus ukuran lama
        $cakeDesign->ukuran_kue()->delete();
    
        // Tambah ukuran baru
        foreach ($request->sizes as $size) {
            $cakeDesign->ukuran_kue()->create([
                'ukuran' => $size['ukuran'],
                'harga' => $size['harga'],
            ]);
        }
    
        return redirect('/admin/desainkue')->with('success', 'Desain kue berhasil diperbarui!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cakeDesign = DesainKue::findOrFail($id);

        // Delete associated cake sizes
        foreach ($cakeDesign->ukuran_kue as $size) {
            $size->delete();
        }

        // Delete cake design
        $cakeDesign->delete();

        return redirect('/admin/desainkue')->with('success', 'Desain kue berhasil dihapus!');
    }
}
