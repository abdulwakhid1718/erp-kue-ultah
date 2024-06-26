@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('main')
    <hr>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb3 border-bottom">
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
        @if (session('error'))
            <div class="toast text-white bg-error" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-delay="2000">
                <div class="toast-header">
                    <strong class="me-auto">Error</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('error') }}
                </div>
            </div>
        @endif
    </div>

    <table class="table table-bordered" id="pegawaiTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pegawai</th>
                <th>Jenis Kelamin</th>
                <th>Devisi</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawais as $pegawai)
                <tr data-id="{{ $pegawai->id }}">
                    <td>{{ $pegawai->id }}</td>
                    <td>{{ $pegawai->nama_pegawai }}</td>
                    <td>{{ $pegawai->jenis_kelamin }}</td>
                    <td>{{ $pegawai->jabatan->devisi->nama_devisi }}</td>
                    <td>{{ $pegawai->jabatan->nama_jabatan }}</td>
                    <td>
                        <a href="/admin/pegawai/{{ $pegawai->id }}/edit" class="btn btn-sm btn-warning"><i
                                class="bi bi-pencil-fill"></i></a>
                        <button type="button" class="btn btn-primary btn-sm add-jam-lembur" data-id="{{ $pegawai->id }}">
                            <i class="bi bi-plus"></i> Tambah Jam Lembur
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Catatan Jam Lembur Pegawai</h1>
    </div>

    <table class="table table-striped" id="pegawaiTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pegawai</th>
                <th>Tanggal</th>
                <th>Total Jam Lembur</th>
                <th>Total Tarif Lembur</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jamlemburs as $jamlembur)
                <tr data-id="{{ $jamlembur->id }}">
                    <td>{{ $jamlembur->id }}</td>
                    <td>{{ $jamlembur->pegawai->nama_pegawai }}</td>
                    <td>{{ $jamlembur->tanggal }}</td>
                    <td>{{ $jamlembur->jam_lembur }} Jam</td>
                    <td>Rp. {{ $jamlembur->tarif_lembur }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Tambah Jam Lembur -->
    <div class="modal fade" id="modalAddJamLembur" tabindex="-1" aria-labelledby="modalAddJamLemburLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/admin/jamlembur/" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddJamLemburLabel">Tambah Jam Lembur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="pegawai_id" id="modalPegawaiId">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="jam_lembur" class="form-label">Total Jam Lembur</label>
                            <input type="number" class="form-control" id="jam_lembur" name="jam_lembur" min="0"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="tarif_lembur" class="form-label">Tarif Lembur per Jam</label>
                            <input type="number" class="form-control" id="tarif_lembur" name="tarif_lembur" min="0"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectedRow = null;

            // Menambahkan event listener untuk tombol Tambah Jam Lembur
            document.querySelectorAll('.add-jam-lembur').forEach(button => {
                button.addEventListener('click', function() {
                    const pegawaiId = this.getAttribute('data-id');
                    document.getElementById('modalPegawaiId').value = pegawaiId;
                    setDefaultTodayDate(); // Panggil fungsi untuk mengatur tanggal default
                    $('#modalAddJamLembur').modal('show');
                });
            });

            // Fungsi untuk mengatur tanggal default
            function setDefaultTodayDate() {
                const today = new Date().toISOString().slice(0, 10);
                document.getElementById('tanggal').value = today;
            }
        });
    </script>
@endpush
