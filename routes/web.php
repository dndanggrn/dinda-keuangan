<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UangMasukController;
use App\Http\Controllers\UangKeluarController;
use App\Http\Controllers\RekapitulasiController;

Route::get('/', function() { return redirect()->route('dashboard'); });
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('uangmasuk', UangMasukController::class);
Route::resource('uangkeluar', UangKeluarController::class);
Route::get('/rekapitulasi', [RekapitulasiController::class, 'index'])->name('rekapitulasi.index');
Route::get('/rekapitulasi/cetak', [RekapitulasiController::class, 'cetakPdf'])->name('rekapitulasi.cetak');