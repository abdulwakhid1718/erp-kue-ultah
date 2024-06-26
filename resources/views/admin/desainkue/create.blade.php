@extends('layouts.app')

@section('title', 'Tambah Desain Kue')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Desain</h1>
    </div>
    <form action="/admin/desainkue" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="nama_kue" value="{{ old('nama_kue') }}" required>
            @error('nama_kue')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="image" name="gambar">
            @error('gambar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sizes" class="form-label">Ukuran</label>
            <div id="sizes">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="sizes[0][ukuran]" placeholder="Ukuran" required>
                    <input type="number" class="form-control" name="sizes[0][harga]" placeholder="Harga" step="0.01"
                        required>
                    <button type="button" class="btn btn-success add-size">Tambah</button>
                </div>
            </div>
            @error('sizes.*.ukuran')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('sizes.*.harga')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let sizeIndex = 1;

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
        });
    </script>
@endpush
