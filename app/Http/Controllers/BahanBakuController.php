<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Http\Requests\StoreBahanBakuRequest;
use App\Http\Requests\UpdateBahanBakuRequest;
use Illuminate\Support\Facades\Storage;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahanBaku = BahanBaku::all();
        return view('admin.bahanbaku.index', [
            "bahan_baku" => $bahanBaku
        ]);
    }

    public function create()
    {
        return view('admin.bahanbaku.create');
    }

    public function store(StoreBahanBakuRequest $request)
    {
        $data = $request->all();
        $data['deskripsi'] = $data['deskripsi'] ?? '-'; 
        $data['stok'] = $data['stok'] ?? 0; 

        if ($request->hasFile('foto_bahan_baku')) {
            $path = $request->file('foto_bahan_baku')->store('foto_bahan_baku', 'public');
            $data['foto_bahan_baku'] = $path;
        }

        BahanBaku::create($data);

        return redirect()->route('bahanbaku.index')
                         ->with('success', 'Bahan baku berhasil ditambahkan.');
    }

    public function show(BahanBaku $bahanBaku)
    {
        $bahan_baku = BahanBaku::findOrFail($id);
        return view('admin.bahanbaku.show', compact('bahan_baku'));
    }
    
    public function edit($id)
    {
        $bahan_baku = BahanBaku::findOrFail($id);
        return view('admin.bahanbaku.edit', compact('bahan_baku'));
    }

    public function update(UpdateBahanBakuRequest $request, $id)
    {
         $bahanBaku = BahanBaku::findOrFail($id);
         $data = $request->all();
 
         if ($request->hasFile('foto_bahan_baku')) {
             // Delete the old photo if it exists
             if ($bahanBaku->foto_bahan_baku) {
                 Storage::delete('public/' . $bahanBaku->foto_bahan_baku);
             }
             $path = $request->file('foto_bahan_baku')->store('foto_bahan_baku', 'public');
             $data['foto_bahan_baku'] = $path;
         } else {
             $data['foto_bahan_baku'] = $bahanBaku->foto; // keep the old photo if no new photo is uploaded
         }
 
         $bahanBaku->update($data);
 
         return redirect()->route('bahanbaku.index')
                          ->with('success', 'Bahan baku berhasil diupdate.');
    }

    public function destroy($id)
    {
         // Temukan supplier berdasarkan ID
       $bahanbaku = BahanBaku::findOrFail($id);

       if ($bahanbaku->foto_bahan_baku) {
        Storage::delete('public/' . $bahanbaku->foto_bahan_baku);
        }

       // Hapus bahanbaku
       $bahanbaku->delete();
        return redirect()->route('bahanbaku.index')
                         ->with('success', 'Bahan baku berhasil dihapus.');
    }
}
