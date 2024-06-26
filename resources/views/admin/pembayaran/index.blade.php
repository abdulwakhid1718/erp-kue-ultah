@extends('layouts.app')

@section('title', 'Permintaan Bahan Baku')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Permintaan Bahan Baku</h1>
        @if (session('success'))
            <div class="toast text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-delay="2000">
                <div class="toast-header">
                    <strong class="me-auto">Sukses</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        @endif

    </div>

    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Bahan Baku</th>
                <th>Supplier</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $permintaan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $permintaan->detail_bahan_baku->bahanbaku->nama_bahan_baku }}</td>
                    <td>{{ $permintaan->detail_bahan_baku->supplier->nama_supplier }}</td>
                    <td>{{ $permintaan->jumlah }}</td>
                    <td>Rp. {{ $permintaan->total_harga }}</td>
                    <td>{{ $permintaan->tanggal_permintaan }}</td>
                    <td><span class="badge bg-warning">{{ $permintaan->status }}</span></td>
                    <td>
                        <a href="{{ route('requestbahan.edit', $permintaan->id) }}" class="btn btn-success btn-sm">
                            <i class="bi bi-cash"></i> Bayar
                        </a>
                        <form id="delete-form-{{ $permintaan->id }}"
                            action="{{ route('requestbahan.destroy', $permintaan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                <i class="bi bi-x-square"></i> Batalkan
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('requestbahan.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-square-fill"></i> Tambah Permintaan
    </a>
@endsection
