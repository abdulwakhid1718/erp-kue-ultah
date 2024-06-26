@extends('layouts.app')

@section('title', 'Daftar Desain Kue')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Desain Kue</h1>
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
                <th>No.</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Ukuran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cakeDesigns as $cakeDesign)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($cakeDesign->gambar)
                            <img src="{{ asset('storage/' . $cakeDesign->gambar) }}" alt="{{ $cakeDesign->nama_kue }}"
                                width="100">
                        @endif
                    </td>
                    <td>{{ $cakeDesign->nama_kue }}</td>
                    <td>{{ $cakeDesign->deskripsi }}</td>
                    <td>
                        <ul>
                            @foreach ($cakeDesign->ukuran_kue as $size)
                                <li>Ukuran : {{ $size->ukuran }} | Harga : Rp. {{ $size->harga }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="/admin/desainkue/{{ $cakeDesign->id }}/edit" class="btn btn-warning btn-sm"><i
                                class="bi bi-pencil-fill"></i></a>
                        <form id="delete-form-{{ $cakeDesign->id }}" action="/admin/desainkue/{{ $cakeDesign->id }}"
                            method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="confirmDelete({{ $cakeDesign->id }})"><i class="bi bi-trash2-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/admin/desainkue/create" class="btn btn-primary mb-3"><i class="bi bi-plus-square-fill"></i> Tambah Desain
        Kue</a>
@endsection
