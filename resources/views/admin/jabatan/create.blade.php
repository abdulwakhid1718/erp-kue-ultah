@extends('layouts.app')

@section('title', 'Tambah Jabatan')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input Data Jabatan</h1>
    </div>

    <form method="post" action="/admin/jabatan">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Jabatan:</label>
            <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" id="nama"
                name="nama_jabatan" placeholder="Masukan Nama" required />
            @error('nama_jabatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="devisi">Devisi</label>
            <select class="form-select @error('devisi_id') is-invalid @enderror" name="devisi_id"
                aria-label="Default select example">
                <option selected>~~ Pilih Devisi ~~</option>
                @foreach ($devisi as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_devisi }}</option>
                @endforeach
            </select>
            @error('devisi_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
