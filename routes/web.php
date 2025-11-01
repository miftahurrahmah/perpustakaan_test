<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PeminjamanController;
use App\Models\Anggota;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/anggota', [AnggotaController::class, 'index']);
Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

Route::get('/book', [BookController::class, 'index']);
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
Route::put('/book/{id}', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('book.destroy');

Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::post('/peminjaman/kembalikan/{id}', [PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembalikan');

Route::get('/api/books', function(Request $request){
    $q = $request->q;
    $books = Book::where('judul_buku', 'like', "%$q%")->get(['id','judul_buku']);
    return response()->json($books);
});

Route::get('/api/anggota', function(Request $request){
    $q = $request->q;
    $anggota = Anggota::where('nama', 'like', "%$q%")
        ->orWhere('no_anggota', 'like', "%$q%")
        ->get(['id','nama','no_anggota']);
    return response()->json($anggota);
});
