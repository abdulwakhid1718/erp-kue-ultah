@extends('layouts.app')

@section('title', 'Daftar Gaji')

@section('main')
    <hr>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Gaji</h1>
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

    <table class="table table-striped" id="example">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pegawai</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Jam Lembur</th>
                <th>Potongan</th>
                <th>Total Gaji</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gajis as $gaji)
                <tr data-id="{{ $gaji->pegawai->id }}">
                    <td>{{ $gaji->id }}</td>
                    <td>{{ $gaji->pegawai->nama_pegawai }}</td>
                    <td>{{ $gaji->bulan }}</td>
                    <td>{{ $gaji->tahun }}</td>
                    <td>{{ $gaji->total_lembur }} Jam</td>
                    <td>{{ $gaji->potongan }}%</td>
                    <td>Rp. {{ $gaji->total_gaji }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Catat Gaji Pegawai</h1>
        <button id="addGajiBtn" class="btn btn-primary" disabled>Tambah Gaji</button>

        <form id="addGajiForm" action="/admin/gaji" method="GET" style="display: none;">
            <input type="hidden" name="pegawai_id" id="pegawai_id">
        </form>

    </div>

    <table class="table table-striped" id="pegawaiTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pegawai</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawais as $pegawai)
                <tr data-id="{{ $pegawai->id }}">
                    <td>{{ $pegawai->id }}</td>
                    <td>{{ $pegawai->nama_pegawai }}</td>
                    <td>{{ $pegawai->jenis_kelamin }}</td>
                    <td>{{ $pegawai->alamat }}</td>
                    <td>{{ $pegawai->nomor_telepon }}</td>
                    <td>{{ $pegawai->jabatan->nama_jabatan }}</td>
                    <td>Rp. {{ $pegawai->gaji_pokok }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <code>Select baris yang ingin ditambahkan gaji</code>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectedRow = null;

            document.querySelectorAll('#pegawaiTable tbody tr').forEach(row => {
                row.addEventListener('click', function() {
                    if (selectedRow) {
                        selectedRow.classList.remove('table-primary');
                    }

                    this.classList.add('table-primary');
                    selectedRow = this;
                    document.getElementById('addGajiBtn').disabled = false;
                    document.getElementById('addGajiBtn').dataset.id = this.getAttribute('data-id');
                });
            });

            document.getElementById('addGajiBtn').addEventListener('click', function() {
                const pegawaiId = this.dataset.id;
                window.location.href = `/admin/gaji/create?pegawai_id=${pegawaiId}`;
            });
        });
    </script>
@endpush
