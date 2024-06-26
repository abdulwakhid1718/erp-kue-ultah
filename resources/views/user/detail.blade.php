<!-- resources/views/user/detail.blade.php -->

@extends('user.layouts_user.app')

@section('title', 'Detail Kue')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $cake->gambar) }}" class="img-fluid" alt="{{ $cake->nama_kue }}">
            </div>
            <div class="col-md-6">
                <h2>{{ $cake->nama_kue }}</h2>
                <p><strong>Deskripsi:</strong> {{ $cake->deskripsi }}</p>

                <!-- Dropdown untuk pilihan ukuran -->
                <div class="form-group mb-3">
                    <label for="ukuran"><b>Pilih Ukuran:</b></label>
                    <select class="form-control" id="ukuran" name="ukuran">
                        @foreach ($cake->ukuran_kue as $ukuran)
                            <option value="{{ $ukuran->id }}">{{ $ukuran->ukuran }} - Rp {{ $ukuran->harga }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Harga akan ditampilkan berdasarkan pilihan ukuran -->
                <p><strong>Harga:</strong> <span id="harga">{{ $cake->ukuran_kue[0]->harga }}</span></p>

                <!-- Tombol untuk membeli kue -->
                <a href="{{ route('beli.kue', $cake->id) }}" class="btn btn-primary">Beli Sekarang</a>
            </div>
        </div>
    </div>

    <!-- Script untuk mengubah harga berdasarkan pilihan ukuran -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ukuranSelect = document.getElementById('ukuran');
            var hargaElement = document.getElementById('harga');

            ukuranSelect.addEventListener('change', function() {
                var selectedOption = ukuranSelect.options[ukuranSelect.selectedIndex];
                var harga = selectedOption.text.match(/Rp (\d+)/)[1];
                hargaElement.textContent = harga;
            });
        });
    </script>
@endsection
