@extends('layouts.app')

@section('title', 'Tambah Pegawai')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input Data Pegawai</h1>
    </div>

    <form method="post" action="/admin/pegawai">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama pegawai:</label>
                    <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama"
                        name="nama_pegawai" placeholder="Masukan Nama" required />
                    @error('nama_pegawai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenkel" class="form-label">Jenis Kelamin</label>
                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                        id="jenkel" aria-label="Pilih Bahan Baku" required>
                        <option selected value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username akun:</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                        name="username" placeholder="Masukan Username" required />
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        id="tanggal_lahir" name="tanggal_lahir" required />
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk:</label>
                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror"
                        id="tanggal_masuk" name="tanggal_masuk" required />
                    @error('tanggal_masuk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="devisi" class="form-label">Devisi</label>
                    <select class="form-select @error('devisi_id') is-invalid @enderror" id="devisi" name="devisi_id"
                        aria-label="Pilih Bahan Baku" required>
                        <option selected disabled>-- Pilih Devisi --</option>
                        @foreach ($devisis as $devisi)
                            <option value="{{ $devisi->id }}">{{ $devisi->nama_devisi }}</option>
                        @endforeach
                    </select>
                    @error('devisi_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select class="form-select @error('jabatan_id') is-invalid @enderror" name="jabatan_id" id="jabatan"
                        aria-label="Pilih Bahan Baku" required>
                        <option selected disabled>-- Pilih Jabatan --</option>
                    </select>
                    @error('jabatan_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gaji_pokok">Gaji Pokok:</label>
                    <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok"
                        name="gaji_pokok" placeholder="Masukan Gaji Pokok" required />
                    @error('gaji_pokok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="Masukan Password" required />
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telepon">Nomor Telepon pegawai:</label>
                    <input type="tel" class="form-control @error('nomor_telepon') is-invalid @enderror" id="telepon"
                        name="nomor_telepon" placeholder="Masukan Telepon" required />
                    @error('nomor_telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                        placeholder="Masukan Alamat" required></textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        document.getElementById('devisi').addEventListener('change', async function() {
            var devisiId = this.value;
            var jabatanSelect = document.getElementById('jabatan');

            // Clear previous options
            jabatanSelect.innerHTML = '<option selected disabled>-- Pilih Jabatan --</option>';

            if (devisiId) {
                await fetch(`/admin/pegawais/jabatan/${devisiId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(jabatan => {
                            var option = document.createElement('option');
                            option.value = jabatan.id;
                            option.textContent = jabatan.nama_jabatan;
                            jabatanSelect.appendChild(option);
                        });
                    });
            }
        });
    </script>
@endpush
