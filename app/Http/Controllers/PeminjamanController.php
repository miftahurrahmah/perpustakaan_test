<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Book;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function index()
    {
        $query = Peminjaman::with(['book', 'anggota'])
            ->where('status', '!=', 'Dikembalikan');

        $peminjaman = $query->get()->map(function($item){
            $item->tgl_peminjaman_formatted = $item->tgl_peminjaman
                ? Carbon::parse($item->tgl_peminjaman)->translatedFormat('d F Y')
                : '-';

            $item->tgl_pengembalian_formatted = $item->tgl_pengembalian
                ? Carbon::parse($item->tgl_pengembalian)->translatedFormat('d F Y')
                : '-';

            return $item;
        });

        $anggota = Anggota::all();
        $book = Book::all();

        return view('transaksi.index', compact('peminjaman', 'anggota', 'book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_peminjaman' => 'required|date',
            'book_id' => 'required|exists:books,id',
            'anggota_id' => 'required|exists:anggotas,id',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->stock <= 0) {
            return redirect()->back()->with('error', 'Stok buku tidak mencukupi!');
        }

        Peminjaman::create([
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'book_id' => $book->id,
            'anggota_id' => $request->anggota_id,
        ]);

        $book->decrement('stock');

        return redirect()->back()->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->tgl_pengembalian = now();
        $peminjaman->status = 'Dikembalikan';
        $peminjaman->save();

        $book = $peminjaman->book;

        if($book) {
            $book->increment('stock');
        }

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan!');
    }
}
