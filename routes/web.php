<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect("/home");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Pengguna
    Route::get('/penguna', [App\Http\Controllers\UserController::class, 'index'])->name('pengguna');
    Route::get('/penguna/create', [App\Http\Controllers\UserController::class, 'create'])->name('pengguna.create');
    Route::post('/penguna/save', [App\Http\Controllers\UserController::class, 'save'])->name('pengguna.save');
    Route::post('/penguna/update', [App\Http\Controllers\UserController::class, 'update'])->name('pengguna.update');
    Route::get('/penguna/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('pengguna.edit');
    //ASET
    Route::get('/aset', [App\Http\Controllers\AsetController::class, 'index'])->name('data.aset');
    Route::get('/aset/create', [App\Http\Controllers\AsetController::class, 'create'])->name('data.aset.create');
    Route::post('/aset/save', [App\Http\Controllers\AsetController::class, 'save'])->name('data.aset.save');
    Route::post('/aset/update', [App\Http\Controllers\AsetController::class, 'update'])->name('data.aset.update');
    Route::get('/aset/edit/{id}', [App\Http\Controllers\AsetController::class, 'edit'])->name('data.aset.edit');
    Route::get('/aset/delete/{id}', [App\Http\Controllers\AsetController::class, 'delete'])->name('data.aset.delete'); 
    //ASET MASUK
    Route::get('/aset-masuk', [App\Http\Controllers\AsetMasukController::class, 'index'])->name('data.aset.masuk');
    Route::get('/aset-masuk/create', [App\Http\Controllers\AsetMasukController::class, 'create'])->name('data.aset.masuk.create');
    Route::post('/aset-masuk/save', [App\Http\Controllers\AsetMasukController::class, 'save'])->name('data.aset.masuk.save');
    Route::post('/aset-masuk/update', [App\Http\Controllers\AsetMasukController::class, 'update'])->name('data.aset.masuk.update');
    Route::get('/aset-masuk/edit/{id}', [App\Http\Controllers\AsetMasukController::class, 'edit'])->name('data.aset.masuk.edit');
    Route::get('/aset-masuk/delete/{id}', [App\Http\Controllers\AsetMasukController::class, 'delete'])->name('data.aset.masuk.delete'); 
    //ASET MASUK
    Route::get('/aset-keluar', [App\Http\Controllers\AsetKeluarController::class, 'index'])->name('data.aset.keluar');
    Route::get('/aset-keluar/create', [App\Http\Controllers\AsetKeluarController::class, 'create'])->name('data.aset.keluar.create');
    Route::post('/aset-keluar/save', [App\Http\Controllers\AsetKeluarController::class, 'save'])->name('data.aset.keluar.save');
    Route::post('/aset-keluar/update', [App\Http\Controllers\AsetKeluarController::class, 'update'])->name('data.aset.keluar.update');
    Route::get('/aset-keluar/edit/{id}', [App\Http\Controllers\AsetKeluarController::class, 'edit'])->name('data.aset.keluar.edit');
    Route::get('/aset-keluar/delete/{id}', [App\Http\Controllers\AsetKeluarController::class, 'delete'])->name('data.aset.keluar.delete');
    //ASET MASUK
    Route::get('/permintaan-aset', [App\Http\Controllers\PermintaanAsetController::class, 'index'])->name('pengajuan.aset');
    Route::get('/permintaan-aset/pengajuan', [App\Http\Controllers\PermintaanAsetController::class, 'create'])->name('pengajuan.aset.create');
    Route::post('/permintaan-aset/save', [App\Http\Controllers\PermintaanAsetController::class, 'save'])->name('pengajuan.aset.save');
    Route::post('/permintaan-aset/update', [App\Http\Controllers\PermintaanAsetController::class, 'update'])->name('pengajuan.aset.update');
    Route::get('/permintaan-aset/edit/{id}', [App\Http\Controllers\PermintaanAsetController::class, 'edit'])->name('pengajuan.aset.edit');
    Route::get('/permintaan-aset/detail/{id}', [App\Http\Controllers\PermintaanAsetController::class, 'detail'])->name('pengajuan.aset.details');
    Route::get('/permintaan-aset/delete/{id}', [App\Http\Controllers\PermintaanAsetController::class, 'delete'])->name('pengajuan.aset.delete');
    Route::get('/permintaan-aset/acc/{id}', [App\Http\Controllers\PermintaanAsetController::class, 'acc'])->name('pengajuan.aset.acc');
    Route::get('/permintaan-aset/tolak/{id}', [App\Http\Controllers\PermintaanAsetController::class, 'tolak'])->name('pengajuan.aset.tolak');   
    //ASET MASUK
    Route::get('/laporan-aset', [App\Http\Controllers\LaporanAsetController::class, 'index'])->name('pengajuan.laporan');
    Route::get('/laporan-aset/pengajuan', [App\Http\Controllers\LaporanAsetController::class, 'create'])->name('pengajuan.laporan.create');
    Route::post('/laporan-aset/save', [App\Http\Controllers\LaporanAsetController::class, 'save'])->name('pengajuan.laporan.save');
    Route::post('/laporan-aset/update', [App\Http\Controllers\LaporanAsetController::class, 'update'])->name('pengajuan.laporan.update');
    Route::get('/laporan-aset/edit/{id}', [App\Http\Controllers\LaporanAsetController::class, 'edit'])->name('pengajuan.laporan.edit');
    Route::get('/laporan-aset/delete/{id}', [App\Http\Controllers\LaporanAsetController::class, 'delete'])->name('pengajuan.laporan.delete');
    Route::get('/laporan-aset/acc/{id}', [App\Http\Controllers\LaporanAsetController::class, 'acc'])->name('pengajuan.laporan.acc');
    Route::get('/laporan-aset/tolak/{id}', [App\Http\Controllers\LaporanAsetController::class, 'tolak'])->name('pengajuan.laporan.tolak');
    
    Route::get('/permintaan-aset/detail/{id}', [App\Http\Controllers\PermintaanAsetController::class, 'detail'])->name('pengajuan.laporan.detail');