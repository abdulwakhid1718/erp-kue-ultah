@extends('user.layouts_user.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Pesanan</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Tanggal Pesan</th>
                    <th>Status</th>
                    <th>Total Harga</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanans as $pesanan)
                    <tr>
                        <td>{{ $pesanan->id }}</td>
                        <td>{{ $pesanan->created_at }}</td>
                        <td>{{ $pesanan->status_pesanan }}</td>
                        <td>Rp {{ number_format($pesanan->harga_total, 0, ',', '.') }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#pesananModal{{ $pesanan->id }}">Lihat Detail</button>

                            <!-- Modal -->
                            <div class="modal fade" id="pesananModal{{ $pesanan->id }}" tabindex="-1"
                                aria-labelledby="pesananModalLabel{{ $pesanan->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pesananModalLabel{{ $pesanan->id }}">Detail Pesanan
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>ID Pesanan: {{ $pesanan->id }}</p>
                                            <p>Tanggal Pesan: {{ $pesanan->created_at }}</p>
                                            <p>Status Pesanan: {{ $pesanan->status_pesanan }}</p>
                                            <p>Total Harga: Rp {{ number_format($pesanan->harga_total, 0, ',', '.') }}</p>
                                            <hr />
                                            <h5>Detail Barang:</h5>
                                            <ul class="list-group">
                                                @foreach ($pesanan->detail_pesanans as $detail)
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <img src="{{ asset('storage/' . $detail->desain_kue->gambar) }}"
                                                                    alt="Foto Kue" class="img-thumbnail" />
                                                            </div>
                                                            <div class="col-md-10">
                                                                <h6>Nama Barang: {{ $detail->desain_kue->nama_kue }}</h6>
                                                                <p>Jumlah: {{ $detail->jumlah_kue }}</p>
                                                                <p>Harga Satuan: Rp
                                                                    {{ number_format($detail->harga_satuan, 0, ',', '.') }}
                                                                </p>
                                                                <p>Ukuran Kue:
                                                                    {{ $detail->ukuran_kue }}</p>
                                                                <p>Catatan Pembeli: {{ $detail->catatan ?? '-' }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
