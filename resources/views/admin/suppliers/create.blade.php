@extends('layouts.app')

@section('title', 'Tambah Supplier')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input Data Supplier</h1>
    </div>

    <form method="post" action="/admin/suppliers">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Supplier:</label>
            <input type="text" class="form-control" id="nama" name="nama_supplier" placeholder="Masukan Nama"
                required />
        </div>
        <div class="form-group">
            <label for="alamat">Alamat Supplier:</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukan Alamat" required></textarea>
        </div>
        <div class="form-group">
            <label for="email">Email Supplier:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email" required />
        </div>
        <div class="form-group">
            <label for="telepon">Nomor Telepon Supplier:</label>
            <input type="tel" class="form-control" id="telepon" name="nomor_telepon" placeholder="Masukan Telepon"
                required />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
