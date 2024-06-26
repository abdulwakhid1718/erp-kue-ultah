@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Supplier</h1>
    </div>

    <form method="post" action="/admin/suppliers/{{ $supplier->id }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nama">Nama Supplier:</label>
            <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" id="nama"
                name="nama_supplier" placeholder="Masukan Nama" required value="{{ $supplier->nama_supplier }}" />
            @error('nama_supplier')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat Supplier:</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                placeholder="Masukan Alamat" required>{{ $supplier->alamat }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email Supplier:</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                placeholder="Masukan Email" required value="{{ $supplier->email }}" />
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="telepon">Nomor Telepon Supplier:</label>
            <input type="tel" class="form-control @error('nomor_telepon') is-invalid @enderror" id="telepon"
                name="nomor_telepon" placeholder="Masukan Telepon" required value="{{ $supplier->nomor_telepon }}" />
            @error('nomor_telepon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
