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