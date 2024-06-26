@extends('layouts.app')
@section('title', 'Data Pesanan')
@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pesanan</h1>
    </div>

    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Pesanan</th>
                <th>Status Pesanan</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanans as $pesanan)
                <tr>
                    <td>{{ $pesanan->id }}</td>
                    <td>{{ $pesanan->pelanggan->nama_pelanggan }}</td>
                    <td>{{ $pesanan->tanggal_pesanan }}</td>
                    <td>
                        <span
                            class="badge badge-{{ $pesanan->status_pesanan == 'pending' ? 'danger' : ($pesanan->status_pesanan == 'proses' ? 'warning' : ($pesanan->status_pesanan == 'selesai' ? 'info' : 'success')) }}">
                            {{ $pesanan->status_pesanan }}
                        </span>
                    </td>
                    <td>Rp {{ number_format($pesanan->harga_total, 0, ',', '.') }}</td>
                    <td>
                        <a href="/admin/pesanan/{{ $pesanan->id }}" class="btn btn-sm btn-primary m-1">Detail</a>
                        @if ($pesanan->status_pesanan == 'Menunggu Pembayaran')
                            <a href="#" class="btn btn-sm btn-success m-1">Konfirmasi Pembayaran</a>
                        @elseif($pesanan->status_pesanan == 'Dalam Proses')
                            <a href="#" class="btn btn-sm btn-success m-1">Konfirmasi Pengiriman</a>
                        @endif
                        <a href="#" class="btn btn-sm btn-danger m-1">Batalkan Pesanan</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
