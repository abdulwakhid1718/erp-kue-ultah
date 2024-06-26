<?php
use App\Models\ProduksiPesanan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DevisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesainKueController;
use App\Http\Controllers\JamLemburController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProduksiPesananController;
use App\Http\Controllers\Auth\PegawaiAuthController;
use App\Http\Controllers\RequestBahanBakuController;
use App\Http\Controllers\Auth\PelangganAuthController;

Route::middleware(['auth:pegawai'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index']);
    Route::resource('/admin/suppliers', SupplierController::class);
    Route::resource('/admin/bahanbaku', BahanBakuController::class);
    Route::resource('/admin/pelanggan', PelangganController::class);
    Route::resource('/admin/requestbahan', RequestBahanBakuController::class);
    Route::post('/requestbahan/bayar/{id}', [RequestBahanBakuController::class, 'bayar'])->name('requestbahan.bayar');
    Route::post('requestbahan/{id}/konfirmasi', [RequestBahanBakuController::class, 'konfirmasi'])->name('requestbahan.konfirmasi');
    Route::resource('/admin/devisi', DevisiController::class);
    Route::resource('/admin/jabatan', JabatanController::class);
    Route::resource('/admin/pegawai', PegawaiController::class);
    Route::resource('admin/gaji', GajiController::class);
    Route::resource('admin/jamlembur', JamLemburController::class);
    Route::resource('admin/desainkue', DesainKueController::class);
    Route::resource('admin/produksi_pesanan', ProduksiPesananController::class);
    Route::resource('admin/pesanan', PesananController::class);
    Route::get('/get-suppliers/{bahan_baku_id}', [RequestBahanBakuController::class, 'getSuppliers']);
    Route::get('/get-price/{bahan_baku_id}/{supplier_id}', [RequestBahanBakuController::class, 'getPrice']);
    Route::get('/admin/pegawais/jabatan/{devisi_id}', [PegawaiController::class, 'getJabatanByDevisi']);
    Route::post('logout/pegawai', [PegawaiAuthController::class, 'logout'])->name('pegawai.logout');
    Route::get('/admin/produksi/{id}', 'ProduksiPesananController@getProductionDetail')->name('produksi.show');

});

Route::middleware(['auth:pelanggan'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/beli-kue/{id}', [HomeController::class, 'beli'])->name('beli.kue');
    Route::post('logout/pelanggan', [PelangganAuthController::class, 'logout'])->name('pelanggan.logout');
    Route::get('/list_pesanan', [HomeController::class, 'list_pesanan'])->name('pesanan.index');
});

Route::middleware(['guest:pegawai,web'])->group(function () {
    Route::get('login', [PegawaiAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login/pegawai', [PegawaiAuthController::class, 'login']);
});

Route::middleware(['guest:pelanggan'])->group(function () {
    Route::get('/', [PelangganAuthController::class, 'showLoginForm'])->name('pelanggan.login');
    Route::post('login/pelanggan', [PelangganAuthController::class, 'login']);
    Route::get('/register', [PelangganAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [PelangganAuthController::class, 'register'])->name('register.pelanggan');
});
