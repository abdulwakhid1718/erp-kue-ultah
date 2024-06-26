@extends('layouts.app')

@section('title', 'Bahan Baku')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Bahan Baku</h1>
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
                <th>Gambar</th>
                <th>Nama Bahan Baku</th>
                <th>Deskripsi</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 0; @endphp
            @foreach ($bahan_baku as $item)
                @php $no++; @endphp
                <tr>
                    <td>{{ $no }}</td>
                    <td>
                        @if ($item->foto_bahan_baku)
                            <img src="{{ asset('storage/' . $item->foto_bahan_baku) }}" alt="Foto Bahan Baku"
                                style="width: 100px;">
                        @else
                            Tidak ada foto
                        @endif
                    </td>
                    <td width="20%">{{ $item->nama_bahan_baku }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ $item->satuan }}</td>
                    <td width="20%">
                        <a href="/admin/bahanbaku/{{ $item->id }}/edit" type="button" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form id="delete-form-{{ $item->id }}" action="/admin/bahanbaku/{{ $item->id }}"
                            method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="confirmDelete({{ $item->id }})"><i class="bi bi-trash2-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/admin/bahanbaku/create" class="btn btn-primary">
        <i class="bi bi-plus-square-fill"></i>
        Tambah item
    </a>

    <a href="/admin/requestbahan/" class="btn btn-success">
        <i class="bi bi-arrow-clockwise"></i>
        Permintaan bahan baku
    </a>

@endsection
