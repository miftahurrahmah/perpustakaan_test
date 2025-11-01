@extends('layouts.main')
@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Data Transaksi</h4>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mb-3 d-flex justify-content-between align-items-center">

                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahPeminjamanModal">
                    <i class="fa fa-plus me-2"></i>Peminjaman
                </a>

                <form method="GET" action="#" class="d-flex align-items-center" style="gap: 10px;">
                    <input
                        type="text"
                        name="keyword"
                        class="form-control"
                        placeholder="Cari"
                        value="{{ request('keyword') }}"
                        style="width: 200px;"
                    >
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Judul Buku</th>
                        <th>Nama Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjaman as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->tgl_peminjaman_formatted }}</td>
                            <td>{{ $item->book->judul_buku ?? '-' }}</td>
                            <td>{{ $item->anggota->nama ?? '-' }}</td>
                            <td>
                                {{ $item->tgl_pengembalian_formatted ?? '-' }}
                                @if($item->keterlambatan)
                                    <br><span class="text-danger">{{ $item->keterlambatan }}</span>
                                @endif
                            </td>
                            <td>{{ $item->status }}</td>
                            <td style="width: 150px;">
                            <div class="d-flex justify-content-center align-items-center gap-2" style="min-height: 40px;">
                                @if($item->status !== 'Dikembalikan')
                                    <form action="{{ route('peminjaman.kembalikan', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin mengembalikan buku ini?')"
                                        class="m-0 p-0">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-success btn-sm d-flex align-items-center gap-1"
                                                title="Kembalikan">
                                            <i class="fa fa-undo"></i> Kembalikan
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@include('transaksi.modal_create')
