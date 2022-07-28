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