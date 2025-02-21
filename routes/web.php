<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('/kemahasiswaan')->name('kemahasiswaan.')->middleware(['auth','role:1'])->group(function () {
    Route::get('/data-pendaftar', [App\Http\Controllers\Kemahasiswaan\DataPendaftarController::class,'index'])->name('data-pendaftar.index');
    Route::get('/data-pendaftar/edit/{id}', [App\Http\Controllers\Kemahasiswaan\DataPendaftarController::class,'edit'])->name('data-pendaftar.edit');
    Route::put('/data-pendaftar/update/{id}', [App\Http\Controllers\Kemahasiswaan\DataPendaftarController::class,'update'])->name('data-pendaftar.update');
    Route::get('/data-pendaftar/verifikasi/{id}', [App\Http\Controllers\Kemahasiswaan\DataPendaftarController::class,'verifikasi'])->name('data-pendaftar.verifikasi');
    Route::delete('/data-pendaftar/{id}', [App\Http\Controllers\Kemahasiswaan\DataPendaftarController::class,'destroy'])->name('data-pendaftar.destroy');
    Route::get('/data-persyaratan', [App\Http\Controllers\Kemahasiswaan\DataPersyaratanController::class, 'index'])->name('data-persyaratan.index');
    Route::get('/data-persyaratan/edit', [App\Http\Controllers\Kemahasiswaan\DataPersyaratanController::class, 'edit'])->name('data-persyaratan.edit');
    Route::put('/data-persyaratan/update', [App\Http\Controllers\Kemahasiswaan\DataPersyaratanController::class, 'update'])->name('data-persyaratan.update');
    Route::get('/data-beasiswa', [App\Http\Controllers\Kemahasiswaan\DataBeasiswaController::class, 'index'])->name('data-beasiswa.index');
    Route::get('/data-beasiswa/edit', [App\Http\Controllers\Kemahasiswaan\DataBeasiswaController::class, 'edit'])->name('data-beasiswa.edit');
    Route::put('/data-beasiswa/update', [App\Http\Controllers\Kemahasiswaan\DataBeasiswaController::class, 'update'])->name('data-beasiswa.update');
    Route::get('/data-pengajuan', [App\Http\Controllers\Kemahasiswaan\DataPengajuanController::class, 'index'])->name('data-pengajuan.index');
    Route::delete('/data-pengajuan/{id}', [App\Http\Controllers\Kemahasiswaan\DataPengajuanController::class,'destroy'])->name('data-pengajuan.destroy');
    Route::get('/data-pengajuan/{id}', [App\Http\Controllers\Kemahasiswaan\DataPengajuanController::class, 'show'])->name('data-pengajuan.show');
    Route::get('/tetapkan-penerimaan', [App\Http\Controllers\Kemahasiswaan\DataPengajuanController::class, 'showTetapkan'])->name('data-pengajuan.tetapkan');
    Route::post('/tetapkan-penerimaan', [App\Http\Controllers\Kemahasiswaan\DataPengajuanController::class, 'tetapkanPenerimaan'])->name('data-pengajuan.tetapkan');
    Route::get('/profil', [App\Http\Controllers\Kemahasiswaan\ProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil', [App\Http\Controllers\Kemahasiswaan\ProfilController::class, 'update'])->name('profil.index');
});

Route::prefix('/mahasiswa')->name('mahasiswa.')->middleware(['auth','role:0'])->group(function () {
    Route::get('/profil', [App\Http\Controllers\Mahasiswa\ProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil', [App\Http\Controllers\Mahasiswa\ProfilController::class, 'update'])->name('profil.index');
    Route::get('/informasi-beasiswa', [App\Http\Controllers\Mahasiswa\InformasiBeasiswaController::class, 'index'])->name('informasi-beasiswa.index');
    Route::get('/proses-pengajuan', [App\Http\Controllers\Mahasiswa\ProsesPengajuanController::class,'index'])->name('proses-pengajuan.index');
    Route::get('/pengajuan', [App\Http\Controllers\Mahasiswa\PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/ajukan', [App\Http\Controllers\Mahasiswa\PengajuanController::class, 'create'])->name('pengajuan.create');
    Route::post('/pengajuan/ajukan', [App\Http\Controllers\Mahasiswa\PengajuanController::class, 'store'])->name('pengajuan.store');
});
