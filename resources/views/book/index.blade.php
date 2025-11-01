@extends('layouts.main')
@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Data Buku</h4>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mb-3 d-flex justify-content-between align-items-center">

                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahBukuModal">
                    <i class="fa fa-plus me-2"></i>Buku
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
                        <th>Judul Buku</th>
                        <th>Penerbit</th>
                        <th>Dimensi</th>
                        <th>Stock</th>
                        <th style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($book as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->judul_buku }}</td>
                            <td>{{ $item->penerbit }}</td>
                            <td>{{ $item->dimensi }}</td>
                            <td>{{ $item->stock }}</td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-center align-items-center gap-2" style="min-height: 40px;">

                                    <a href="#"
                                    class="btn btn-warning btn-sm d-flex align-items-center justify-content-center"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editBukuModal{{ $item->id }}"
                                    style="width: 32px; height: 32px;">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    @include('book.modal_edit', ['book' => $item])

                                    <form action="{{ route('book.destroy', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                        class="m-0 p-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px;"
                                                title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">
                                Belum ada data buku.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@include('book.modal_create')
