@extends('layouts.app')

@section('title', 'Edit Jabatan')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Jabatan</h1>
    </div>

    <form method="post" action="/admin/jabatan/{{ $jabatan->id }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nama">Nama Jabatan:</label>
            <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" id="nama"
                name="nama_jabatan" placeholder="Masukan Nama" required value="{{ $jabatan->nama_jabatan }}" />
            @error('nama_jabatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="deskripsi">Devisi Jabatan:</label>
            <select class="form-select @error('devisi_id') is-invalid @enderror" name="devisi_id"
                aria-label="Default select example">
                <option selected>~~ Pilih Devisi ~~</option>
                @foreach ($devisi as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $jabatan->devisi->id) selected @endif>
                        {{ $item->nama_devisi }}
                    </option>
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
