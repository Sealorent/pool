<?php

use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\ManajemenPengguna;
use App\Http\Controllers\Admin\OperatorController;
use App\Http\Controllers\Admin\PemakaianController;
use App\Http\Controllers\Admin\PemesananController;
use App\Http\Controllers\Admin\RiwayatPemakaian;
use App\Http\Controllers\Admin\RiwayatPemesanan;
use App\Http\Controllers\Admin\RiwayatServis;
use App\Http\Controllers\Admin\ServisController;
use App\Http\Controllers\Admin\RiwayatAktifitas;
use App\Http\Controllers\ProfileController;
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


Route::get('/dashboard', function () {
    return view('pages.dashboard.index', [
        'title' => 'Selamat Datang di Sistem Informasi Kendaraan Tambang PT. Semen Indonesia (Persero) Tbk. ',
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Kendaraan
    Route::resource('kendaraan', KendaraanController::class);
    // Operator
    Route::resource('operator', OperatorController::class);
    // Pemesanan
    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
    Route::get('/pemesanan/create', [PemesananController::class, 'create'])->name('pemesanan.create');
    Route::put('/pemesanan/{id}/update', [PemesananController::class, 'update'])->name('pemesanan.update');
    Route::delete('/pemesanan/{id}/delete', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');
    Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');
    // Pemesanan Selesai
    Route::get('/pemesanan/{id}', [PemesananController::class, 'show'])->name('pemesanan.show');
    // riwayat pemesanan
    Route::get('/riwayat-pemesanan', [RiwayatPemesanan::class, 'index'])->name('riwayat-pemesanan.index');

    // pemakaian
    Route::get('/pemakaian', [PemakaianController::class, 'index'])->name('pemakaian.index');
    Route::put('/pemakaian/{id}/edit', [PemakaianController::class, 'update'])->name('pemakaian.update');

    // riwayat pemakaian
    Route::get('/riwayat-pemakaian', [RiwayatPemakaian::class, 'index'])->name('riwayat-pemakaian.index');
    Route::get('/riwayat-pemakaian/{id}', [RiwayatPemakaian::class, 'show'])->name('riwayat-pemakaian.show');

    // servis
    Route::get('/servis', [ServisController::class, 'index'])->name('servis.index');
    Route::get('/servis/create', [ServisController::class, 'create'])->name('servis.create');
    Route::post('/servis', [ServisController::class, 'store'])->name('servis.store');
    Route::get('/servis/{id}/edit', [ServisController::class, 'edit'])->name('servis.edit');
    Route::put('/servis/{id}/update', [ServisController::class, 'update'])->name('servis.update');

    // riwayat servis
    Route::get('/riwayat-servis', [RiwayatServis::class, 'index'])->name('riwayat-servis.index');

    Route::get('/riwayat-aktivitas', [RiwayatAktifitas::class, 'index'])->name('riwayat-aktivitas.index');
    Route::delete('/riwayat-aktivitas/{id}/delete', [RiwayatAktifitas::class, 'destroy'])->name('riwayat-aktivitas.destroy');
});

Route::middleware('auth', 'SuperAdmin')->group(function () {
    // Manajemen Pengguna
    Route::get('/manajemen-pengguna', [ManajemenPengguna::class, 'index'])->name('manajemen-pengguna.index');
    Route::get('/manajemen-pengguna/create', [ManajemenPengguna::class, 'create'])->name('manajemen-pengguna.create');
    Route::post('/manajemen-pengguna', [ManajemenPengguna::class, 'store'])->name('manajemen-pengguna.store');
    Route::get('/manajemen-pengguna/{id}/edit', [ManajemenPengguna::class, 'edit'])->name('manajemen-pengguna.edit');
    Route::put('/manajemen-pengguna/{id}', [ManajemenPengguna::class, 'update'])->name('manajemen-pengguna.update');
    Route::delete('/manajemen-pengguna/{id}', [ManajemenPengguna::class, 'destroy'])->name('manajemen-pengguna.destroy');

    // riwayat aktivitas
});

require __DIR__ . '/auth.php';
