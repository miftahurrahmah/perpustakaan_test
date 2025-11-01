<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if (!session()->has('is_admin') || session('is_admin') !== true) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $keyword = $request->keyword;

        if ($keyword) {
            $book = Book::where('judul_buku', 'like', "%$keyword%")
                ->orWhere('penerbit', 'like', "%$keyword%")
                ->orWhere('dimensi', 'like', "%$keyword%")
                ->get();
        } else {
            $book = Book::all();
        }

        return view('book.index', compact('book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'dimensi' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);

        Book::create([
            'judul_buku' => $request->judul_buku,
            'penerbit' => $request->penerbit,
            'dimensi' => $request->dimensi,
            'stock' => $request->stock,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'dimensi' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);

        $book = Book::findOrFail($id);

        $book->update([
            'judul_buku' => $request->judul_buku,
            'penerbit' => $request->penerbit,
            'dimensi' => $request->dimensi,
            'stock' => $request->stock,
        ]);

       return redirect()->back()->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
