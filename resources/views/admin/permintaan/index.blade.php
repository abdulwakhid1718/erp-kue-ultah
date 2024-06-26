@extends('layouts.app')

@section('title', 'Permintaan Bahan Baku')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Permintaan Bahan Baku</h1>
        @if (session('success'))
            <div class="toast text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-delay="2000">
                <div class="toast-header">
                    <strong class="me-auto">Sukses</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        @endif
    </div>
    <a href="{{ route('requestbahan.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-square-fill"></i> Tambah Permintaan
    </a>
    @foreach ($requestsByStatus as $status => $requests)
        <hr>
        <h6
            class="badge 
            @if ($status == 'Menunggu Persetujuan Supplier') bg-secondary 
            @elseif($status == 'Menunggu Pembayaran')
            bg-warning
            @elseif($status == 'Telah dibayar')
            bg-info
            @else
            bg-success @endif
        ">
            {{ $status }}</h6>
        <table class="table table-bordered" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bahan Baku</th>
                    <th>Supplier</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                    @if ($status != 'Selesai')
                        <th>Aksi</th>
                    @endif

                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $request->detail_bahan_baku->bahanbaku->nama_bahan_baku }}</td>
                        <td>{{ $request->detail_bahan_baku->supplier->nama_supplier }}</td>
                        <td>{{ $request->jumlah }}</td>
                        <td>Rp. {{ $request->total_harga }}</td>
                        <td>{{ $request->tanggal_permintaan }}</td>
                        <td>
                            @if ($request->status != 'Selesai')
                                @if ($request->status == 'Menunggu Pembayaran')
                                    <a href="{{ route('requestbahan.edit', $request->id) }}" class="btn btn-success btn-sm">
                                        <i class="bi bi-cash"></i> Bayar
                                    </a>
                                @endif
                                @if ($request->status != 'Telah dibayar' && $request->status != 'Telah dibayar')
                                    <form id="delete-form-{{ $request->id }}"
                                        action="{{ route('requestbahan.destroy', $request->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                            <i class="bi bi-x-square"></i> Batalkan
                                        </button>
                                    </form>
                                @else
                                    <form id="konfirmasi-{{ $request->id }}"
                                        action="{{ route('requestbahan.konfirmasi', $request->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="button" class="btn btn-success btn-sm"
                                            onclick="confirmBarangDiterima({{ $request->id }})">
                                            <i class="bi bi-check-square"></i> Konfirmasi bahan baku diterima
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach


@endsection

@push('scripts')
    <script>
        function confirmBarangDiterima(id) {
            Swal.fire({
                title: "Anda yakin bahan baku sudah sampai?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Yakin!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Hapus data dengan mengirimkan formulir
                    document.getElementById('konfirmasi-' + id).submit();
                }
            });
        }
    </script>
@endpush
