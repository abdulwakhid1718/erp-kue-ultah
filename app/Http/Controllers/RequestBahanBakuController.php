<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\BahanBaku;
use Illuminate\Http\Request;
use App\Models\DetailBahanBaku;
use App\Models\RequestBahanBaku;
use App\Models\PembayaranBahanBaku;
use App\Http\Requests\StoreRequestBahanBakuRequest;
use App\Http\Requests\UpdateRequestBahanBakuRequest;

class RequestBahanBakuController extends Controller
{
    public function index()
    {
        $requestsByStatus = [
            'Menunggu Persetujuan Supplier' => [],
            'Menunggu Pembayaran' => [],
            'Telah dibayar' => [],
            'Selesai' => [],
        ];
    
        $requests = RequestBahanBaku::with(['detail_bahan_baku.bahanbaku', 'detail_bahan_baku.supplier'])
            ->whereIn('status', array_keys($requestsByStatus))
            ->get();
    
        foreach ($requests as $permintaan) {
            $requestsByStatus[$permintaan->status][] = $permintaan;
        }
    
        return view('admin.permintaan.index', compact('requestsByStatus'));
    }
    

    public function create()
    {
        $bahanbaku = BahanBaku::all();
        return view('admin.permintaan.create',[
            'bahan_bakus' => $bahanbaku
        ]);
    }

    public function getSuppliers($bahan_baku_id)
    {
        $detailBahanBakus = DetailBahanBaku::where('bahan_baku_id', $bahan_baku_id)->get();

        $supplierIds = $detailBahanBakus->pluck('supplier_id')->unique();

        // Mengambil data supplier berdasarkan supplier_id yang ada dalam array $supplierIds
        $suppliers = Supplier::whereIn('id', $supplierIds)->get();
        
        // Mengembalikan data supplier dalam format JSON
        return response()->json($suppliers);
    }

    public function getPrice($bahan_baku_id, $supplier_id)
    {
        $harga = DetailBahanBaku::where('bahan_baku_id', $bahan_baku_id)
                                    ->where('supplier_id', $supplier_id)
                                    ->pluck('harga')
                                    ->first();

        return response()->json($harga);
    }

    public function store(Request $request)
    {
        // Mengambil data detail bahan baku berdasarkan bahan_baku_id dan supplier_id
        $detailBahanBaku = DetailBahanBaku::where('bahan_baku_id', $request->bahan_baku_id)
                            ->where('supplier_id', $request->supplier_id)
                            ->first();

        $id_detail_bahan_baku = $detailBahanBaku->id;
        $harga_bahan_baku = $detailBahanBaku->harga;
        $total_harga = $harga_bahan_baku * $request->jumlah;
        // dd($total_harga);
        RequestBahanBaku::create([
            'detail_bahan_baku_id' => $id_detail_bahan_baku,
            'jumlah' => $request->jumlah,
            'tanggal_permintaan' => now(),
            'total_harga' => $total_harga,
            'status' => 'Menunggu Persetujuan Supplier',
        ]);

        return redirect()->route('requestbahan.index')->with('success', 'Permintaan bahan baku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $permintaan = RequestBahanBaku::findOrFail($id);
        return view('admin.pembayaran.create', compact('permintaan'));
    }

    public function update(UpdateRequestBahanBakuRequest $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $permintaan = RequestBahanBaku::findOrFail($id);
        $permintaan->update($request->all());

        return redirect()->route('requestbahan.index')
                         ->with('success', 'Permintaan bahan baku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $permintaan = RequestBahanBaku::findOrFail($id);
        $permintaan->delete();

        return redirect()->route('requestbahan.index')
                         ->with('success', 'Permintaan bahan baku berhasil dihapus.');
    }

    public function bayar(Request $request, $permintaanid)
    {
        $permintaan = RequestBahanBaku::findOrFail($permintaanid);
        
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $buktiPembayaran = $request->file('bukti_pembayaran');
        $buktiPembayaranPath = $buktiPembayaran->store('bukti_pembayaran', 'public');

        $pembayaran = new PembayaranBahanBaku();
        $pembayaran->request_bahan_baku_id = $permintaan->id;
        $pembayaran->tanggal_pembayaran = now();
        $pembayaran->bukti_pembayaran = $buktiPembayaranPath;
        $pembayaran->save();

         // Ubah status permintaan bahan baku
        $permintaan->status = 'Telah dibayar';
        $permintaan->save();

        return redirect()->route('requestbahan.index')->with('success', 'Permintaan bahan baku telah dibayar.');
    }

    public function konfirmasi($permintaanid)
    {
        $permintaan = RequestBahanBaku::findOrFail($permintaanid);

        // Cek apakah permintaan sudah dibayar
        if ($permintaan->status !== 'Telah dibayar') {
            return redirect()->route('requestbahan.index')->with('error', 'Permintaan bahan baku belum dibayar.');
        }

        // Tambah stok bahan baku
        $detailBahanBaku = $permintaan->detail_bahan_baku;
        $idBahanBaku = $detailBahanBaku->bahan_baku_id;
        $bahanBaku = BahanBaku::findOrFail($idBahanBaku);
        $bahanBaku->stok += $permintaan->jumlah;
        $bahanBaku->save();

        // Ubah status permintaan menjadi 'selesai'
        $permintaan->status = 'Selesai';
        $permintaan->save();

        return redirect()->route('requestbahan.index')->with('success', 'Bahan baku telah dikonfirmasi dan stok telah ditambahkan.');
    }
}
