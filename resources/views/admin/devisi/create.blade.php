@extends('layouts.app')

@section('title', 'Tambah Devisi')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input Data Devisi</h1>
    </div>

    <form method="post" action="/admin/devisi">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Devisi:</label>
            <input type="text" class="form-control @error('nama_devisi') is-invalid @enderror" id="nama"
                name="nama_devisi" placeholder="Masukan Nama" required />
            @error('nama_devisi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Deskripsi Devisi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3"
                placeholder="Masukan Deskripsi" required></textarea>
            @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
