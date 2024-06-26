@extends('layouts.app')

@section('title', 'Catat Jam Lembur')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Catat Jam Lembur</div>

                    <div class="card-body">
                        <form method="POST" action="/admin/jamlembur">
                            @csrf

                            <div class="form-group">
                                <label for="pegawai_id">Pegawai:</label>
                                <select name="pegawai_id" id="pegawai_id"
                                    class="form-control @error('pegawai_id') is-invalid @enderror" required>
                                    <option value="">Pilih Pegawai</option>
                                    @foreach ($pegawais as $pegawai)
                                        <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                                    @endforeach
                                </select>
                                @error('pegawai_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" name="tanggal" id="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror" required>
                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="total_jam">Total Jam:</label>
                                <input type="number" name="total_jam" id="total_jam"
                                    class="form-control @error('total_jam') is-invalid @enderror" required>
                                @error('total_jam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
