@extends('layouts.app')
@section('title', 'Data Produksi Pesanan')
@section('main')
    {{-- @dd($pegawai) --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produksi Pesanan</h1>
    </div>

    <div class="row">
        <!-- Pesanan Pending -->
        <h3>Pesanan Pending</h3>
        @foreach ($pendingPesanan as $pesanan)
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header"><strong>{{ $pesanan->detailPesanan->first()->desainKue->nama_kue }}</strong>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Pesanan ID: {{ $pesanan->id }}</h5>
                        <div class="row">
                            <div class="col">Nama Pelanggan</div>
                            <div class="col">: {{ $pesanan->pelanggan->nama_pelanggan }}</div>
                        </div>
                        <div class="row">
                            <div class="col">Tanggal Pesanan</div>
                            <div class="col">: {{ $pesanan->tanggal_pesanan }}</div>
                        </div>
                        <div class="row">
                            <div class="col">Jumlah Item</div>
                            <div class="col">: {{ $pesanan->detail_count }}</div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <span class="badge badge-warning">Pending</span>
                            </div>
                        </div>
                        <br />
                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#modalMulaiProduksi">
                            Mulai Produksi
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#detailPesananModal">
                            Lihat Detail Pesanan
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Pesanan Diproses -->
        <h3>Pesanan Diproses</h3>
        @foreach ($diprosesPesanan as $produksi)
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <strong>{{ $produksi->pesanan->detailPesanan->first()->desainKue->nama_kue }}</strong>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Pesanan ID: {{ $produksi->pesanan_id }}</h5>
                        <div class="row">
                            <div class="col">Nama Pelanggan</div>
                            <div class="col">: {{ $produksi->pesanan->pelanggan->nama_pelanggan }}</div>
                        </div>
                        <div class="row">
                            <div class="col">Tanggal Pesanan</div>
                            <div class="col">: {{ $produksi->pesanan->tanggal_pesanan }}</div>
                        </div>
                        <div class="row">
                            <div class="col">Jumlah Item</div>
                            <div class="col">: {{ $produksi->pesanan->detailPesanan->count() }}</div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <span class="badge badge-warning">Sedang Diproses</span>
                            </div>
                        </div>
                        <br />
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#detailProduksiModal">
                            Lihat Detail Produksi
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#detailPesananModal">
                            Lihat Detail Pesanan
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Pesanan Selesai -->
        <h3>Pesanan Selesai</h3>
        @foreach ($selesaiPesanan as $produksi)
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <strong>{{ $produksi->pesanan->detailPesanan->first()->desainKue->nama_kue }}</strong>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Pesanan ID: {{ $produksi->pesanan_id }}</h5>
                        <div class="row">
                            <div class="col">Nama Pelanggan</div>
                            <div class="col">: {{ $produksi->pesanan->pelanggan->nama_pelanggan }}</div>
                        </div>
                        <div class="row">
                            <div class="col">Tanggal Pesanan</div>
                            <div class="col">: {{ $produksi->pesanan->tanggal_pesanan }}</div>
                        </div>
                        <div class="row">
                            <div class="col">Jumlah Item</div>
                            <div class="col">: {{ $produksi->pesanan->detailPesanan->count() }}</div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <span class="badge badge-success">Selesai</span>
                            </div>
                        </div>
                        <br />
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#detailProduksiModal">
                            Lihat Detail Produksi
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#detailPesananModal">
                            Lihat Detail Pesanan
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
<div class="modal fade" id="detailProduksiModal" tabindex="-1" role="dialog"
    aria-labelledby="detailProduksiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailProduksiModalLabel">
                    Detail Produksi
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Informasi Produksi -->
                <div class="row">
                    <div class="col-md-6">
                        <div>ID Produksi: 1</div>
                        <div>Tanggal Produksi: 2024-04-30</div>
                        <div>Jumlah Pegawai: 5</div>
                        <div>Jumlah Produksi: 100</div>
                    </div>
                </div>

                <!-- Informasi Bahan Baku -->
                <div class="row">
                    <div class="col-md-6">
                        <h6>Bahan Baku:</h6>
                        <ul>
                            <li>Telur: 10</li>
                            <li>Terigu: 20</li>
                            <!-- Tambahkan item bahan baku lainnya -->
                        </ul>
                    </div>
                </div>

                <!-- Informasi Pegawai -->
                <div class="row">
                    <div class="col-md-6">
                        <h6>Pegawai yang Terlibat:</h6>
                        <ul>
                            <li>Pegawai A</li>
                            <li>Pegawai B</li>
                            <!-- Tambahkan pegawai lainnya -->
                        </ul>
                    </div>
                </div>

                <!-- Informasi Produk -->
                <div class="row">
                    <div class="col-md-6">
                        <h6>Produk:</h6>
                        <div>
                            <img src="http://4.bp.blogspot.com/-bc9AQIdfBIg/U1Hmb3ZCEXI/AAAAAAAAABU/qiFvDqWpC5k/s1600/Blackforest.jpg"
                                alt="Foto Produk" width="100" />
                            <div>Nama Produk: Kue Tart</div>
                            <!-- Tambahkan informasi produk lainnya -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Pesanan -->
<div class="modal fade" id="detailPesananModal" tabindex="-1" role="dialog"
    aria-labelledby="detailPesananModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailPesananModalLabel">
                    Detail Pesanan
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">ID Pesanan</div>
                    <div class="col">: 123</div>
                </div>
                <div class="row">
                    <div class="col">Tanggal Pesanan</div>
                    <div class="col">: 2024-04-30</div>
                </div>
                <div class="row">
                    <div class="col">Nama Pelanggan</div>
                    <div class="col">: John Doe</div>
                </div>
                <div class="row">
                    <div class="col">Nama Produk</div>
                    <div class="col">: Kue Black Forest</div>
                </div>
                <div class="row">
                    <div class="col">Jumlah Item</div>
                    <div class="col">: 5</div>
                </div>
                <div class="row">
                    <div class="col">Foto</div>
                    <div class="col">
                        <img src="http://4.bp.blogspot.com/-bc9AQIdfBIg/U1Hmb3ZCEXI/AAAAAAAAABU/qiFvDqWpC5k/s1600/Blackforest.jpg"
                            alt="Foto Produk" class="img-thumbnail" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">Ukuran Kue</div>
                    <div class="col">: 25cm</div>
                </div>
                <div class="row">
                    <div class="col">Catatan Pembeli</div>
                    <div class="col">: Tidak ada catatan khusus</div>
                </div>
                <!-- Tambahkan informasi detail lainnya sesuai kebutuhan -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Mulai Produksi -->
<div class="modal fade" id="modalMulaiProduksi" tabindex="-1" role="dialog"
    aria-labelledby="modalMulaiProduksiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMulaiProduksiLabel">
                    Mulai Produksi
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="bahanBaku">Bahan Baku:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="telur" id="telur"
                                        onchange="toggleJumlahInput('telur', 'telurJumlah')" />
                                    <label class="form-check-label" for="telur">
                                        Telur
                                    </label>
                                    <input type="number" class="form-control" id="telurJumlah" placeholder="Jumlah"
                                        disabled />
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="terigu" id="terigu"
                                        onchange="toggleJumlahInput('terigu', 'teriguJumlah')" />
                                    <label class="form-check-label" for="terigu">
                                        Terigu
                                    </label>
                                    <input type="number" class="form-control" id="teriguJumlah"
                                        placeholder="Jumlah" disabled />
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="mentega" id="mentega"
                                        onchange="toggleJumlahInput('mentega', 'mentegaJumlah')" />
                                    <label class="form-check-label" for="mentega">
                                        Mentega
                                    </label>
                                    <input type="number" class="form-control" id="mentegaJumlah"
                                        placeholder="Jumlah" disabled />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="gula" id="gula"
                                        onchange="toggleJumlahInput('gula', 'gulaJumlah')" />
                                    <label class="form-check-label" for="gula">
                                        Gula Pasir
                                    </label>
                                    <input type="number" class="form-control" id="gulaJumlah" placeholder="Jumlah"
                                        disabled />
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="susu" id="susu"
                                        onchange="toggleJumlahInput('susu', 'susuJumlah')" />
                                    <label class="form-check-label" for="susu">
                                        Susu Cair
                                    </label>
                                    <input type="number" class="form-control" id="susuJumlah" placeholder="Jumlah"
                                        disabled />
                                </div>
                                <!-- Tambahkan checkbox dan input jumlah untuk bahan baku lainnya -->
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pegawai">Pilih Pegawai:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="pegawaiA"
                                        id="pegawaiA" />
                                    <label class="form-check-label" for="pegawaiA">Pegawai A</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="pegawaiB"
                                        id="pegawaiB" />
                                    <label class="form-check-label" for="pegawaiB">Pegawai C</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="pegawaiB"
                                        id="pegawaiB" />
                                    <label class="form-check-label" for="pegawaiB">Pegawai E</label>
                                </div>
                                <!-- Tambahkan pegawai lainnya di sini -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="pegawaiC"
                                        id="pegawaiC" />
                                    <label class="form-check-label" for="pegawaiC">Pegawai B</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="pegawaiD"
                                        id="pegawaiD" />
                                    <label class="form-check-label" for="pegawaiD">Pegawai D</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="pegawaiD"
                                        id="pegawaiD" />
                                    <label class="form-check-label" for="pegawaiD">Pegawai F</label>
                                </div>
                                <!-- Tambahkan pegawai lainnya di sini -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Tutup
                </button>
                <button type="button" class="btn btn-primary">
                    Proses Produksi
                </button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <!-- JavaScript untuk mengambil dan menampilkan data dari backend -->
    <script>
        // Fungsi untuk menampilkan modal dan mengambil data dari backend
        function showDetailProduksi(id) {
            // Menggunakan Ajax untuk mengambil data dari backend
            $.ajax({
                url: '/produksi/' + id, // Ganti dengan endpoint yang sesuai di Laravel
                type: 'GET',
                success: function(response) {
                    // Mengisi data ke dalam modal
                    $('#produksiId').text(response.id);
                    $('#tanggalProduksi').text(response.tanggal_produksi);
                    $('#jumlahPegawai').text(response.jumlah_pegawai);
                    $('#jumlahProduksi').text(response.jumlah_produksi);

                    // Mengisi bahan baku
                    var bahanBakuList = $('#bahanBakuList');
                    bahanBakuList.empty();
                    $.each(response.bahan_baku, function(index, bahan) {
                        bahanBakuList.append('<li>' + bahan.nama + ': ' + bahan.jumlah + '</li>');
                    });

                    // Mengisi pegawai
                    var pegawaiList = $('#pegawaiList');
                    pegawaiList.empty();
                    $.each(response.pegawai, function(index, pegawai) {
                        pegawaiList.append('<li>' + pegawai + '</li>');
                    });

                    // Menampilkan modal
                    $('#detailProduksiModal').modal('show');
                },
                error: function(error) {
                    console.log(error);
                    alert('Gagal memuat data produksi');
                }
            });
        }
    </script>
@endpush
