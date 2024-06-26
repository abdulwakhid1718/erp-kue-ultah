@extends('user.layouts_user.app')

@section('title', 'Produk Kue Ulang Tahun')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($cakes as $cake)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $cake->gambar) }}" class="card-img-top" alt="{{ $cake->nama_kue }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cake->nama_kue }}</h5>
                            <p class="card-text">{{ $cake->deskripsi }}</p>
                            <p class="card-text"><strong>Harga: Rp
                                    {{ $cake->ukuran_kue[0]->harga }}</strong>
                            </p>
                            <a href="/beli-kue/{{ $cake->id }}" class="btn btn-primary">Beli</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
