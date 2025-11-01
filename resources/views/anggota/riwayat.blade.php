@extends('layouts.main')
@section('content')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Riwayat Peminjaman: {{ $anggota->nama }}</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('anggota.index') }}" class="btn btn-secondary mb-3">Kembali</a>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status</th>
                        <th>Keterlambatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggota->peminjaman as $index => $p)
                        @php
                            $tglPeminjaman = \Carbon\Carbon::parse($p->tgl_peminjaman)->startOfDay();
                            $hariSekarang = \Carbon\Carbon::now()->startOfDay();
                            $totalHari = $tglPeminjaman->diffInDays($hariSekarang);
                            $keterlambatan = null;
                            if($totalHari > 7 && $p->status != 'Dikembalikan') {
                                $keterlambatan = $totalHari - 7;
                            }
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->book->judul_buku ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($p->tgl_peminjaman)->translatedFormat('d F Y') }}</td>
                            <td>{{ $p->tgl_pengembalian ? \Carbon\Carbon::parse($p->tgl_pengembalian)->translatedFormat('d F Y') : '-' }}</td>
                            <td>{{ $p->status }}</td>
                             <td>
                                @if($p->keterlambatan > 0)
                                    <span class="text-danger">
                                        Telat {{ $p->keterlambatan }} hari
                                    </span>
                                @else
                                    <span class="text-success">Tepat waktu</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
