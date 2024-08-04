<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanDaftarController;
use App\Http\Controllers\LaporanPasienController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\PasienController;
use Illuminate\Auth\Middleware\Authenticate;



Route::middleware([Authenticate::class])->group(function () {
    Route::resource('laporan-daftar', LaporanDaftarController::class);
    Route::resource('laporan-pasien', LaporanPasienController::class);
    Route::resource('pasien', PasienController::class);
    Route::resource('daftar', DaftarController::class);
    Route::resource('poli', PoliController::class);
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
