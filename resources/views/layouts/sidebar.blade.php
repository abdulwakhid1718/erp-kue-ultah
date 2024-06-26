<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <h3 class="ml-3">
        <span class="badge badge-danger">B</span>Day Cake
    </h3>
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="/admin">
                    Beranda <span class="sr-only">(current)</span>
                </a>
            </li>

            {{-- Menu berdasarkan jabatan --}}
            @if (Auth::guard('pegawai')->user()->jabatan->nama_jabatan === 'HR Manager' ||
                    Auth::guard('pegawai')->user()->jabatan->nama_jabatan === 'Manajer Pergudangan' ||
                    Auth::guard('pegawai')->user()->jabatan->nama_jabatan === 'Operations Manager' ||
                    Auth::guard('pegawai')->user()->jabatan->nama_jabatan === 'Owner')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kontak
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/admin/suppliers">Supplier</a>
                        <a class="dropdown-item" href="/admin/pelanggan">Pelanggan</a>
                    </div>
                </li>
            @endif

            @if (Auth::guard('pegawai')->user()->jabatan->nama_jabatan === 'HR Manager' ||
                    Auth::guard('pegawai')->user()->jabatan->nama_jabatan === 'Owner')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kepegawaian
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/admin/devisi">Data Devisi</a>
                        <a class="dropdown-item" href="/admin/jabatan">Data Jabatan</a>
                        <a class="dropdown-item" href="/admin/pegawai">Data Pegawai</a>
                        <a class="dropdown-item" href="/admin/gaji">Penggajian</a>
                        <a class="dropdown-item" href="/admin/jamlembur">Catatan Jam Lembur</a>
                    </div>
                </li>
            @endif

            @if (Auth::guard('pegawai')->user()->jabatan->nama_jabatan === 'Manajer Pergudangan' ||
                    Auth::guard('pegawai')->user()->jabatan->nama_jabatan === 'Owner')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Inventory
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/admin/bahanbaku">Bahan Baku</a>
                        <a class="dropdown-item" href="/admin/requestbahan">Permintaan Bahan Baku</a>
                    </div>
                </li>
            @endif

            @if (Auth::guard('pegawai')->user()->jabatan->nama_jabatan === 'Operations Manager' ||
                    Auth::guard('pegawai')->user()->jabatan->nama_jabatan === 'Owner')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produksi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/admin/produksi_pesanan">Produksi Pesanan</a>
                        <a class="dropdown-item" href="/admin/desainkue">Desain Kue</a>
                    </div>
                </li>
            @endif

            {{-- Menu untuk Manajer Penjualan --}}
            @if (Auth::guard('pegawai')->user()->jabatan->nama_jabatan === 'Manajer Penjualan' ||
                    Auth::guard('pegawai')->user()->jabatan->nama_jabatan === 'Owner')
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Penjualan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/admin/pesanan">Pesanan</a> --}}
                {{-- <a class="dropdown-item" href="/admin/laporan_penjualan">Laporan Penjualan</a> --}}
                {{-- </div>
                </li> --}}
            @endif
        </ul>
    </div>
</nav>
