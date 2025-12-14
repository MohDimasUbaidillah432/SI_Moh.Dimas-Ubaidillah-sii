<?php
use App\Http\Controllers\AnggotaController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::resource('anggota', AnggotaController::class);
Route::get('/anggota/tambah', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota/simpan', [AnggotaController::class, 'store'])->name('anggota.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
