@extends('layouts.app')

@section('title', 'Bayar Permintaan Bahan Baku')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bayar Permintaan Bahan Baku</h1>
    </div>

    <form action="{{ route('requestbahan.bayar', $permintaan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
            <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" required>
        </div>
        <button type="submit" class="btn btn-success">
            <i class="bi bi-cash"></i> Bayar
        </button>
    </form>
@endsection
