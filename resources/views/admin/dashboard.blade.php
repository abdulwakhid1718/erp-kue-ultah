@extends('layouts.app')

@section('title', 'Dashboard')

@section('main')
    <br>

    <h1 class="text-center">Selamat Datang {{ Auth::guard('pegawai')->user()->jabatan->nama_jabatan }}</h1>
    <br>
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Bahan Baku</h5>
                    <p class="card-text">{{ $jumlahBahanBaku }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Desain Kue</h5>
                    <p class="card-text">{{ $jumlahDesain }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pengeluaran</h5>
                    <p class="card-text">Rp 0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Keuntungan</h5>
                    <p class="card-text">Rp 0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pegawai</h5>
                    <p class="card-text">{{ $jumlahPegawai }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pelanggan</h5>
                    <p class="card-text">{{ $jumlahPelanggan }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
