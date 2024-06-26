@extends('layouts.app')

@section('title', 'Pelanggan')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pelanggan</h1>
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
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>Username</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $pelanggan->id }}</td>
                    <td>{{ $pelanggan->nama_pelanggan }}</td>
                    <td>{{ $pelanggan->username }}</td>
                    <td>{{ $pelanggan->email }}</td>
                    <td>
                        <a href="/admin/pelanggan/{{ $pelanggan->id }}/edit" class="btn btn-sm btn-warning"><i
                                class="bi bi-pencil-fill"></i></a>
                        <form id="delete-form-{{ $pelanggan->id }}" action="/admin/pelanggan/{{ $pelanggan->id }}"
                            method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="confirmDelete({{ $pelanggan->id }})"><i class="bi bi-trash2-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/admin/pelanggan/create" class="btn btn-primary">
        <i class="bi bi-plus-square-fill"></i>
        Tambah Pelanggan
    </a>

@endsection
