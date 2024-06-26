<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\DetailPesanan;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::all();
        return view('admin.pesanan.index', compact('pesanans'));
    }

    public function create()
    {
        return view('admin.pesanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'tanggal_pesanan' => 'required|date',
            'status_pesanan' => 'required|string|max:255',
            'total_harga' => 'required|numeric',
        ]);

        Pesanan::create($request->all());

        return redirect('/admin/pesanan')->with('success', 'Pesanan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pesanan = Pesanan::with('pelanggan')->findOrFail($id);
        $detailPesanans = DetailPesanan::with('desain_kue')->where('pesanan_id', $id)->get();
        return view('admin.pesanan.show', compact('pesanan', 'detailPesanans'));
    }

    public function edit(Pesanan $pesanan)
    {
        return view('admin.pesanan.edit', compact('pesanan'));
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'tanggal_pesanan' => 'required|date',
            'status_pesanan' => 'required|string|max:255',
            'total_harga' => 'required|numeric',
        ]);

        $pesanan->update($request->all());

        return redirect()->route('admin.pesanan.index')
                         ->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();

        return redirect()->route('admin.pesanan.index')
                         ->with('success', 'Pesanan berhasil dihapus.');
    }
}
