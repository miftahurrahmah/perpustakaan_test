<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/anggota', [AnggotaController::class, 'index']);
Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
