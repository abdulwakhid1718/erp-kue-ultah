@extends('layouts.app')

@section('title', 'Jabatan')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Jabatan</h1>
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
                <th>Nama Jabatan</th>
                <th>Devisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 0; @endphp
            @foreach ($jabatans as $jabatan)
                @php $no++; @endphp
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $jabatan->nama_jabatan }}</td>
                    <td>{{ $jabatan->devisi->nama_devisi }}</td>
                    <td>
                        <a href="/admin/jabatan/{{ $jabatan->id }}/edit" type="button" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form id="delete-form-{{ $jabatan->id }}" action="/admin/jabatan/{{ $jabatan->id }}"
                            method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="confirmDelete({{ $jabatan->id }})"><i class="bi bi-trash2-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/admin/jabatan/create" class="btn btn-primary">
        <i class="bi bi-plus-square-fill"></i>
        Tambah Jabatan
    </a>
@endsection
