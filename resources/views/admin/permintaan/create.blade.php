@extends('layouts.app')

@section('title', 'Buat Permintaan Bahan Baku Baru')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Permintaan Bahan Baku Baru</h1>
    </div>

    <form method="post" action="{{ route('requestbahan.store') }}">
        @csrf
        <div class="mb-3">
            <label for="bahan_baku" class="form-label">Bahan Baku</label>
            <select class="form-select" name="bahan_baku_id" id="bahan_baku" aria-label="Pilih Bahan Baku" required>
                <option selected disabled>-- Pilih Bahan Baku --</option>
                @foreach ($bahan_bakus as $bahan_baku)
                    <option value="{{ $bahan_baku->id }}">{{ $bahan_baku->nama_bahan_baku }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="supplier" class="form-label">Supplier yang menyediakan</label>
            <select class="form-select" name="supplier_id" id="supplier" aria-label="Pilih Supplier" required>
                <option selected disabled>Tidak Ada</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga Bahan Baku</label>
            <input type="text" class="form-control" id="harga" value="0" disabled>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Permintaan</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" required>
        </div>
        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="text" class="form-control" id="total_harga" value="0" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection

@push('scripts')
    <script>
        function ambilHarga(bahan_baku_id, supplier_id) {
            axios.get('/get-price/' + bahan_baku_id + '/' + supplier_id)
                .then(function(response) {
                    document.getElementById('harga').value = response.data;
                    // Setelah harga diambil, perbarui total harga
                    updateTotalHarga();
                })
                .catch(function(error) {
                    console.error('Gagal mengambil harga:', error);
                    // Atau, Anda dapat menampilkan pesan kesalahan kepada pengguna
                    // alert('Gagal mengambil harga bahan baku!');
                });
        }

        function updateTotalHarga() {
            // Memeriksa apakah harga dan jumlah permintaan valid
            var hargaBahanBaku = parseInt(document.getElementById('harga').value);
            var jumlahPermintaan = parseInt(inputJumlah.value);

            // Periksa apakah harga dan jumlah valid
            if (!isNaN(hargaBahanBaku) && !isNaN(jumlahPermintaan)) {
                var totalHarga = hargaBahanBaku * jumlahPermintaan;
                document.getElementById('total_harga').value = totalHarga;
            } else {
                // Jika harga atau jumlah tidak valid, atur total harga menjadi 0
                document.getElementById('total_harga').value = 0;
                // Atau, Anda dapat menampilkan pesan kesalahan kepada pengguna
                // alert('Masukkan jumlah permintaan dan harga yang valid!');
            }
        }

        // Ambil data supplier berdasarkan bahan baku yang dipilih
        document.getElementById('bahan_baku').addEventListener('change', function() {
            var bahan_baku_id = this.value;
            var supplier_id = document.getElementById('bahan_baku').value;
            var supplierSelect = document.getElementById('supplier');
            console.log(bahan_baku_id);
            supplierSelect.innerHTML = ''; // Bersihkan opsi supplier sebelum menambahkan yang baru

            // Kirim permintaan AJAX untuk mendapatkan daftar supplier
            axios.get('/get-suppliers/' + bahan_baku_id)
                .then(function(response) {
                    // console.log(response);
                    var suppliers = response.data;
                    if (suppliers.length === 0) {
                        // Jika respons kosong, tambahkan objek "supplier kosong"
                        suppliers.push({
                            id: null,
                            nama_supplier: 'Tidak Ada',
                            // Tambahkan properti lain sesuai kebutuhan
                        });
                        document.getElementById('harga').value = 0;
                        document.getElementById('total_harga').value = 0;
                    } else {
                        ambilHarga(bahan_baku_id, supplier_id)
                        updateTotalHarga()
                    }

                    suppliers.forEach(function(supplier) {
                        var option = document.createElement('option');
                        option.value = supplier.id;
                        option.text = supplier.nama_supplier;
                        supplierSelect.appendChild(option);
                    });

                })
                .catch(function(error) {
                    console.error(error);
                });
        });

        // Ambil harga bahan baku berdasarkan supplier yang dipilih
        document.getElementById('supplier').addEventListener('change', function() {
            var bahan_baku_id = document.getElementById('bahan_baku').value;
            var supplier_id = this.value;
            ambilHarga(bahan_baku_id, supplier_id)
        });

        // Ambil elemen input jumlah permintaan
        var inputJumlah = document.getElementById('jumlah');

        // Event listener untuk perubahan nilai pada input jumlah permintaan
        inputJumlah.addEventListener('input', updateTotalHarga);
    </script>
@endpush
