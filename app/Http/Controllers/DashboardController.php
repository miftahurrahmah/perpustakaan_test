<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Book;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('is_admin') || session('is_admin') !== true) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $totalAnggota = Anggota::count();
        $totalBuku = Book::count();
        $totalPeminjamanHariIni = Peminjaman::whereDate('tgl_peminjaman', Carbon::today())->count();

        $labels = [];
        $data = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $labels[] = $date->translatedFormat('D d-m');
            $count = Peminjaman::whereDate('tgl_peminjaman', $date)->count();
            $data[] = $count;
        }

        return view('dashboard', compact(
            'totalAnggota',
            'totalBuku',
            'totalPeminjamanHariIni',
            'labels',
            'data'
        ));
    }
}
