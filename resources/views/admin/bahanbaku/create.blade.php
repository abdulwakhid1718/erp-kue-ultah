@extends('layouts.app')

@section('title', 'Tambah Bahan Baku')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input Data Bahan Baku</h1>
    </div>

    <form method="post" action="/admin/bahanbaku" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Bahan Baku</label>
            <input type="text" class="form-control @error('nama_bahan_baku') is-invalid @enderror" id="nama"
                name="nama_bahan_baku" placeholder="Masukan Nama" value="{{ old('nama_bahan_baku') }}" required />
            @error('nama_bahan_baku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3"
                placeholder="Masukan deskripsi">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok"
                placeholder="Masukan stok" value="{{ old('stok') }}" />
            @error('stok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="satuan">Satuan</label>
            <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan"
                placeholder="Masukan satuan" value="{{ old('satuan') }}" required />
            @error('satuan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="foto_bahan_baku">Foto Bahan Baku</label>
            <input type="file" class="form-control @error('foto_bahan_baku') is-invalid @enderror" id="foto_bahan_baku"
                name="foto_bahan_baku" required />
            @error('foto_bahan_baku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
