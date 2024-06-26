@extends('layouts.app')

@section('title', 'Tambah Gaji')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Gaji untuk {{ $pegawai->nama_pegawai }}</h1>
    </div>

    <form method="post" action="/admin/gaji">
        @csrf
        <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama pegawai:</label>
                    <input type="text" class="form-control" value="{{ $pegawai->nama_pegawai }}"
                        placeholder="Masukan Nama" disabled />
                </div>
                <div class="form-group">
                    <label for="nama">Jabatan:</label>
                    <input type="text" class="form-control" value="{{ $pegawai->jabatan->nama_jabatan }}"
                        placeholder="Masukan Jabatan" disabled />
                </div>
                <div class="form-group">
                    <label for="total_lembur">Lembur:</label>
                    <input type="number" class="form-control @error('total_lembur') is-invalid @enderror" id="total_lembur"
                        name="total_lembur" value="{{ $totalJamLembur }}" readonly required />
                    @error('total_lembur')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bulan">Bulan Gaji:</label>
                    <select class="form-control @error('bulan') is-invalid @enderror" id="bulan" name="bulan"
                        required>
                        <option value="">Pilih Bulan</option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>
                    @error('bulan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="potongan">Potongan (%):</label>
                    <input type="number" class="form-control @error('potongan') is-invalid @enderror" id="potongan"
                        name="potongan" value="0" min="0" />
                    <!-- Menambahkan min="0" untuk mencegah nilai negatif -->
                    @error('potongan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Devisi:</label>
                    <input type="text" class="form-control" value="{{ $pegawai->jabatan->devisi->nama_devisi }}"
                        placeholder="Masukan Devisi" disabled />
                </div>
                <div class="form-group">
                    <label for="gaji_pokok">Gaji Pokok:</label>
                    <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok"
                        name="gaji_pokok" value="{{ $pegawai->gaji_pokok }}" disabled required />
                    @error('gaji_pokok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="total_upah_lembur">Total Tarif Lembur:</label>
                    <input type="number" class="form-control @error('total_upah_lembur') is-invalid @enderror"
                        id="total_upah_lembur" name="total_upah_lembur" value="{{ $totalTarifLembur }}" readonly
                        required />
                    @error('total_upah_lembur')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tahun">Tahun Gaji:</label>
                    <select class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun"
                        required>
                        <option value="">Pilih Tahun</option>
                        @for ($i = now()->year; $i >= 2000; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    @error('tahun')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_gaji">Total Gaji:</label>
                    <input type="number" class="form-control @error('total_gaji') is-invalid @enderror" id="total_gaji"
                        name="total_gaji" value="{{ $pegawai->gaji_pokok + $totalTarifLembur }}" readonly />
                    @error('total_gaji')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var gajiPokok = {{ $pegawai->gaji_pokok }};
            var totalTarifLembur = {{ $totalTarifLembur }};

            // Menghitung total gaji saat halaman dimuat
            hitungTotalGaji();

            // Event listener untuk perubahan nilai potongan
            document.getElementById('potongan').addEventListener('input', function() {
                hitungTotalGaji();
            });

            // Fungsi untuk menghitung ulang total gaji
            function hitungTotalGaji() {
                var potongan = parseFloat(document.getElementById('potongan').value);
                var totalLembur = parseFloat(document.getElementById('total_lembur').value);

                // Memastikan potongan tidak negatif
                if (potongan < 0) {
                    potongan = 0; // Jika negatif, atur potongan menjadi 0
                    document.getElementById('potongan').value = 0; // Update nilai input
                }

                var totalGaji = gajiPokok + totalTarifLembur - ((potongan / 100) * (gajiPokok + totalTarifLembur));

                // Menghapus trailing zeros
                document.getElementById('total_gaji').value = Number(totalGaji.toFixed(2));
            }
        });
    </script>
@endpush
