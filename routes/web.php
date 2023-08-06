<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SistemController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


//BARANG
Route::get('/barang', [SistemController::class, 'barangIndex'])->name('barang/index');
Route::get('/barang/create', [SistemController::class, 'barangCreate'])->name('barang/create');
Route::get('/barang/edit/{kode_barang}', [SistemController::class, 'barangEdit'])->name('barang/edit');
Route::post('/barang/create/store', [SistemController::class, 'barangCreatePost'])->name('barang/create/store');
Route::post('/barang/edit/post/{kode_barang}', [SistemController::class, 'barangEditPost'])->name('barang/edit/post');
Route::post('/barang/hapus/{kode_barang}', [SistemController::class, 'barangHapus'])->name('barang/hapus');

//Supplier
Route::get('/supplier', [SistemController::class, 'supplierIndex'])->name('supplier/index');
Route::get('/supplier/create', [SistemController::class, 'supplierCreate'])->name('supplier/create');
Route::post('/supplier/create/post', [SistemController::class, 'SupplierCreateStore'])->name('supplier/create/post');
Route::get('/supplier/edit/{Id_Supplier}', [SistemController::class, 'supplierEdit'])->name('supplier/edit');
Route::post('/supplier/edit/post/{Id_Supplier}', [SistemController::class, 'supplierEditPost'])->name('supplier/edit/post');
Route::post('/supplier/hapus/{Id_Supplier}', [SistemController::class, 'supplierHapus'])->name('supplier/hapus');

// Kategori
Route::get('/kategori', [SistemController::class, 'kategoriIndex'])->name('kategori/index');
Route::get('/kategori/create', [SistemController::class, 'kategoriCreate'])->name('kategori/create');
Route::get('/kategori/edit/{kode_kategori}', [SistemController::class, 'kategoriEdit'])->name('kategori/edit');
Route::post('/kategori/create/post', [SistemController::class, 'kategoriCreatePost'])->name('kategori/create/post');
Route::post('/kategori/edit/post/{kode_kategori}', [SistemController::class, 'kategoriEditPost'])->name('kategori/edit/post');
Route::post('/kategori/hapus/{kode_kategori}', [SistemController::class, 'kategoriHapus'])->name('kategori/hapus');

// Jenis
Route::get('/jenis', [SistemController::class, 'jenisIndex'])->name('jenis/index');
Route::get('/jenis/create', [SistemController::class, 'jenisCreate'])->name('jenis/create');
Route::get('/jenis/edit/{kode_jenis}', [SistemController::class, 'jenisEdit'])->name('jenis/edit');
Route::post('/jenis/create/post', [SistemController::class, 'jenisCreatePost'])->name('jenis/create/post');
Route::post('/jenis/edit/post/{kode_jenis}', [SistemController::class, 'jenisEditPost'])->name('jenis/edit/post');
Route::post('/jenis/hapus/{kode_jenis}', [SistemController::class, 'jenisHapus'])->name('jenis/hapus');

// Detail barang
Route::get('/detail-barang', [SistemController::class, 'detailIndex'])->name('detail-barang/index');
Route::get('/detail/create', [SistemController::class, 'detailCreate'])->name('detail/create');
Route::get('/detail/edit/{kode_detail_barang}', [SistemController::class, 'detailEdit'])->name('detail/edit');
Route::post('/detail/create/post', [SistemController::class, 'detailCreatePost'])->name('detail/create/post');
Route::post('/detail/edit/post/{kode_detail_barang}', [SistemController::class, 'detailEditPost'])->name('detail/edit/post');
Route::post('/detail/hapus/{kode_detail_barang}', [SistemController::class, 'detailHapus'])->name('detail/hapus');

// Transaksi pembelian
Route::get('/transaksi/pembelian', [SistemController::class, 'pembelianIndex'])->name('transaksi/pembelian/index');
Route::get('/pembelian/create', [SistemController::class, 'pembelianCreate'])->name('pembelian/create');
Route::get('/pembelian/edit/{id_transaksi_pembelian}', [SistemController::class, 'pembelianEdit'])->name('pembelian/edit');
Route::post('/pembelian/create/post', [SistemController::class, 'PembelianCreatePost'])->name('pembelian/create/post');
Route::post('/pembelian/edit/post/{id_transaksi_pembelian}', [SistemController::class, 'pembelianEditPost'])->name('pembelian/edit/post');
Route::post('/pembelian/hapus/{id_transaksi_pembelian}', [SistemController::class, 'pembelianHapus'])->name('pembelian/hapus');

// Penjualan
Route::get('/penjualan', [SistemController::class, 'penjualanIndex'])->name('penjualan/index');
Route::get('/penjualan/create', [SistemController::class, 'penjualanCreate'])->name('penjualan/create');
Route::get('/penjualan/edit/{id_transaksi_penjualan}', [SistemController::class, 'penjualanEdit'])->name('penjualan/edit');
Route::post('/penjualan/create/post', [SistemController::class, 'penjualanCreatePost'])->name('penjualan/create/post');
Route::post('/penjualan/edit/post/{id_transaksi_penjualan}', [SistemController::class, 'penjualanEditPost'])->name('penjualan/edit/post');
Route::post('/penjualan/hapus/{id_transaksi_penjualan}', [SistemController::class, 'penjualanHapus'])->name('penjualan/hapus');

// Laporan
Route::get('/Laporan', [LaporanController::class, 'LaporanIndex'])->name('laporan/index');
Route::get('/Laporan/PDF', [LaporanController::class, 'LaporanPDF'])->name('laporanpdf');
