@extends('layouts.app')

@section('title', 'Edit Desain Kue')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Desain Kue</h1>
    </div>
    <form action="/admin/desainkue/{{ $cakeDesign->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama_kue') is-invalid @enderror" id="name" name="nama_kue"
                value="{{ old('nama_kue', $cakeDesign->nama_kue) }}" required>
            @error('nama_kue')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="description" name="deskripsi" rows="3"
                required>{{ old('deskripsi', $cakeDesign->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label><br>
            @if ($cakeDesign->gambar)
                <img src="{{ asset('storage/' . $cakeDesign->gambar) }}" alt="{{ $cakeDesign->nama_kue }}" width="100">
            @endif
            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="image" name="gambar">
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sizes" class="form-label">Ukuran</label>
            <div id="sizes">
                @foreach ($cakeDesign->ukuran_kue as $index => $size)
                    <div class="input-group mb-2">
                        <input type="text" class="form-control @error("sizes.{$index}.ukuran") is-invalid @enderror"
                            name="sizes[{{ $index }}][ukuran]" placeholder="Ukuran"
                            value="{{ old("sizes.{$index}.ukuran", $size->ukuran) }}" required>
                        <input type="number" class="form-control @error("sizes.{$index}.harga") is-invalid @enderror"
                            name="sizes[{{ $index }}][harga]" placeholder="Harga" step="0.01"
                            value="{{ old("sizes.{$index}.harga", $size->harga) }}" required>
                        <button type="button" class="btn btn-danger remove-size">Hapus</button>
                        @error("sizes.{$index}.ukuran")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error("sizes.{$index}.harga")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-success add-size"><i class="bi bi-plus-square-fill"></i> Tambah
                Ukuran</button>
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-save2-fill"></i> Simpan</button>
    </form>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let sizeIndex = {{ count($cakeDesign->ukuran_kue) }};

            document.querySelector('.add-size').addEventListener('click', function() {
                const newSizeGroup = document.createElement('div');
                newSizeGroup.classList.add('input-group', 'mb-2');
                newSizeGroup.innerHTML = `
                    <input type="text" class="form-control" name="sizes[${sizeIndex}][ukuran]" placeholder="Ukuran" required>
                    <input type="number" class="form-control" name="sizes[${sizeIndex}][harga]" placeholder="Harga" step="0.01" required>
                    <button type="button" class="btn btn-danger remove-size">Hapus</button>
                `;
                document.getElementById('sizes').appendChild(newSizeGroup);
                sizeIndex++;

                newSizeGroup.querySelector('.remove-size').addEventListener('click', function() {
                    newSizeGroup.remove();
                });
            });

            document.querySelectorAll('.remove-size').forEach(button => {
                button.addEventListener('click', function() {
                    button.parentElement.remove();
                });
            });
        });
    </script>
@endpush
