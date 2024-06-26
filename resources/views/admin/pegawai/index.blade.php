@extends('layouts.app')

@section('title', 'Pegawai')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pegawai</h1>
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
                <th>Nama Pegawai</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Devisi</th>
                <th>Jabatan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawais as $pegawai)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pegawai->nama_pegawai }}</td>
                    <td>{{ $pegawai->jenis_kelamin }}</td>
                    <td>{{ $pegawai->tanggal_lahir }}</td>
                    <td>{{ $pegawai->jabatan->devisi->nama_devisi }}</td>
                    <td>{{ $pegawai->jabatan->nama_jabatan }}</td>
                    <td>{{ $pegawai->alamat }}</td>
                    <td>
                        <a href="/admin/pegawai/{{ $pegawai->id }}/edit" class="btn btn-sm btn-warning"><i
                                class="bi bi-pencil-fill"></i></a>
                        <form id="delete-form-{{ $pegawai->id }}" action="/admin/pegawai/{{ $pegawai->id }}"
                            method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="confirmDelete({{ $pegawai->id }})"><i class="bi bi-trash2-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/admin/pegawai/create" class="btn btn-primary">
        <i class="bi bi-plus-square-fill"></i>
        Tambah Pegawai
    </a>

@endsection
