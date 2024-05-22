<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\DetailPencabutanController;
use App\Http\Controllers\DetailPengajuanController;
use App\Http\Controllers\DetailPromoController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PencabutanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromoController;
use App\Models\Detailpromo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('dashboard', [DashboardContoller::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/pengajuan', [DashboardContoller::class, 'pengajuan'])->middleware(['auth', 'verified'])->name('dashboard_pengajuan');
Route::get('/dashboard/pencabutan', [DashboardContoller::class, 'pencabutan'])->middleware(['auth', 'verified'])->name('dashboard_pencabutan');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('barang',BarangController::class)->middleware('auth');
Route::resource('pelanggan',PelangganController::class)->middleware('auth');
Route::resource('pengajuan',PengajuanController::class)->middleware('auth');
Route::resource('pencabutan',PencabutanController::class)->middleware('auth');
Route::resource('detailpengajuan',DetailPengajuanController::class)->middleware('auth');
Route::resource('detailpencabutan',DetailPencabutanController::class)->middleware('auth');
Route::resource('paket',PaketController::class)->middleware('auth');
Route::resource('promo',PromoController::class)->middleware('auth');
Route::resource('detailpromo',DetailPromoController::class)->middleware('auth');






require __DIR__.'/auth.php';
