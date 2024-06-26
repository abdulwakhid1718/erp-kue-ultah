<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\ProduksiPesanan;
use App\Http\Requests\StoreProduksiPesananRequest;
use App\Http\Requests\UpdateProduksiPesananRequest;

class ProduksiPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // Mengambil pesanan dengan status pending dari tabel pesanan
        $pendingPesanan = Pesanan::where('status_pesanan', 'pending')->get();

        // Mengambil produksi pesanan dengan status diproses dan selesai dari tabel produksi_pesanan
        $diprosesPesanan = ProduksiPesanan::with('pesanan')
                            ->where('status', 'diproses')
                            ->get();

        $selesaiPesanan = ProduksiPesanan::with('pesanan')
                            ->where('status', 'selesai')
                            ->get();
        
        $pegawai = Pegawai::whereHas('jabatan', function ($query) {
            $query->where('nama_jabatan', 'Staff Produksi');
        })->get();

        // Menghitung jumlah detail pesanan untuk setiap pesanan pending
        foreach ($pendingPesanan as $pesanan) {
            $pesanan->detail_count = DetailPesanan::where('pesanan_id', $pesanan->id)->count();
        }

        return view('admin.produksi.index', [
            'pendingPesanan' => $pendingPesanan,
            'diprosesPesanan' => $diprosesPesanan,
            'selesaiPesanan' => $selesaiPesanan,
            'pegawai' => $pegawai,
        ]);
    }

    // Contoh di dalam controller Anda (misalnya ProductionController)
public function getProductionDetail($id)
{
    $produksi = Produksi::find($id); // Misalnya, Produksi adalah model untuk data produksi

    if (!$produksi) {
        return response()->json(['error' => 'Produksi tidak ditemukan'], 404);
    }

    // Contoh data yang dikirimkan sebagai JSON
    return response()->json([
        'id' => $produksi->id,
        'tanggal_produksi' => $produksi->tanggal_produksi,
        'jumlah_pegawai' => $produksi->jumlah_pegawai,
        'jumlah_produksi' => $produksi->jumlah_produksi,
        'bahan_baku' => $produksi->bahan_baku, // Misalnya, berbentuk array atau JSON lagi
        'pegawai' => $produksi->pegawai()->pluck('nama')->toArray() // Contoh jika pegawai berelasi
    ]);
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduksiPesananRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProduksiPesanan $produksiPesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProduksiPesanan $produksiPesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduksiPesananRequest $request, ProduksiPesanan $produksiPesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProduksiPesanan $produksiPesanan)
    {
        //
    }

    public function proses($id)
    {
        $validatedData = request()->validate([
            'pegawai' => 'required|array',
            'bahan_baku' => 'required|array',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        $pesanan = Pesanan::findOrFail($id);

        $produksiPesanan = ProduksiPesanan::create([
            'pesanan_id' => $pesanan->id,
            'tanggal_produksi' => now(),
            'status' => 'Sedang Diproduksi',
        ]);

        foreach ($validatedData['pegawai'] as $pegawaiId) {
            TenagaKerjaProduksi::create([
                'produksi_pesanan_id' => $produksiPesanan->id,
                'pegawai_id' => $pegawaiId,
            ]);
        }

        foreach ($validatedData['bahan_baku'] as $bahanBakuId => $jumlah) {
            DetailProduksi::create([
                'produksi_pesanan_id' => $produksiPesanan->id,
                'bahan_baku_id' => $bahanBakuId,
                'jumlah' => $jumlah,
            ]);
        }

        $pesanan->status = 'Sedang Diproduksi';
        $pesanan->save();

        return redirect()->back()->with('success', 'Produksi pesanan berhasil dimulai');
    }
}
