@extends('layouts.app')

@section('title', 'Edit Pegawai')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Pegawai</h1>
    </div>

    <form method="post" action="{{ route('pegawai.update', $pegawai->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama pegawai:</label>
            <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama"
                name="nama_pegawai" placeholder="Masukan Nama" value="{{ old('nama_pegawai', $pegawai->nama_pegawai) }}"
                required />
            @error('nama_pegawai')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jenkel" class="form-label">Jenis Kelamin</label>
            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenkel"
                aria-label="Pilih Bahan Baku" required>
                <option value="Laki-Laki" {{ $pegawai->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="Perempuan" {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                name="tanggal_lahir" value="{{ old('tanggal_lahir', $pegawai->tanggal_lahir) }}" required />
            @error('tanggal_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk:</label>
            <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk"
                name="tanggal_masuk" value="{{ old('tanggal_masuk', $pegawai->tanggal_masuk) }}" required />
            @error('tanggal_masuk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="devisi" class="form-label">Devisi</label>
            <select class="form-select @error('devisi') is-invalid @enderror" id="devisi" aria-label="Pilih Bahan Baku"
                name="devisi_id" required>
                <option selected disabled>-- Pilih Devisi --</option>
                @foreach ($devisis as $devisi)
                    <option value="{{ $devisi->id }}"
                        {{ $pegawai->jabatan->devisi_id == $devisi->id ? 'selected' : '' }}>{{ $devisi->nama_devisi }}
                    </option>
                @endforeach
            </select>
            @error('devisi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select class="form-select @error('jabatan_id') is-invalid @enderror" name="jabatan_id" id="jabatan"
                aria-label="Pilih Bahan Baku" required>
                <option selected disabled>-- Pilih Jabatan --</option>
                @foreach ($jabatans as $jabatan)
                    <option value="{{ $jabatan->id }}" {{ $pegawai->jabatan_id == $jabatan->id ? 'selected' : '' }}>
                        {{ $jabatan->nama_jabatan }}</option>
                @endforeach
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
                name="gaji_pokok" placeholder="Masukan Gaji Pokok" value="{{ old('gaji_pokok', $pegawai->gaji_pokok) }}"
                required />
            @error('gaji_pokok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="telepon">Nomor Telepon pegawai:</label>
            <input type="tel" class="form-control @error('nomor_telepon') is-invalid @enderror" id="telepon"
                name="nomor_telepon" placeholder="Masukan Telepon"
                value="{{ old('nomor_telepon', $pegawai->nomor_telepon) }}" required />
            @error('nomor_telepon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                placeholder="Masukan Alamat" required>{{ old('alamat', $pegawai->alamat) }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                name="username" placeholder="Masukan Username" value="{{ old('username', $pegawai->username) }}"
                required />
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" placeholder="Masukan Password" />
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
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

        // Trigger change event on page load if devisi is already selected
        document.addEventListener('DOMContentLoaded', function() {
            var devisiElement = document.getElementById('devisi');
            if (devisiElement.value) {
                devisiElement.dispatchEvent(new Event('change'));
            }
        });
    </script>
@endpush
