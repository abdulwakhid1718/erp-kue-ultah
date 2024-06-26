@extends('layouts.app')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Pesanan</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pesanan ID: {{ $pesanan->id }}</h5>
            <p class="card-text">Nama Pelanggan: {{ $pesanan->pelanggan->nama_pelanggan }}</p>
            <p class="card-text">Tanggal Pesanan: {{ $pesanan->tanggal_pesanan }}</p>
            <p class="card-text">Status Pesanan: <span
                    class="badge badge-{{ $pesanan->status_pesanan == 'pending' ? 'danger' : ($pesanan->status_pesanan == 'proses' ? 'warning' : ($pesanan->status_pesanan == 'selesai' ? 'info' : 'success')) }}">
                    {{ $pesanan->status_pesanan }}
                </span></p>
            <p class="card-text">Total Harga: Rp {{ number_format($pesanan->harga_total, 0, ',', '.') }}</p>
            <hr />
            <h5>Detail Barang:</h5>
            @if ($detailPesanans && $detailPesanans->count())
                <ul class="list-group">
                    @foreach ($detailPesanans as $detail)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ asset('storage/' . $detail->desain_kue->gambar) }}" alt="Foto Kue"
                                        class="img-thumbnail" />
                                </div>
                                <div class="col-md-10">
                                    <h6>Nama Barang: {{ $detail->desain_kue->nama_kue }}</h6>
                                    <p>Jumlah: {{ $detail->jumlah_kue }}</p>
                                    <p>Total Harga: Rp {{ number_format($detail->total_harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Tidak ada detail barang untuk pesanan ini.</p>
            @endif
        </div>
    </div>
@endsection
