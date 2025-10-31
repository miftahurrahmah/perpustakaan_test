@extends('layouts.main')
@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Data Anggota</h4>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mb-3 d-flex justify-content-between align-items-center">

                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahAnggotaModal">
                    <i class="fa fa-plus me-2"></i>Anggota
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
                        <th>No Anggota</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggota as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->no_anggota }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->tgl_lahir }}</td>
                            <td class="text-center"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@include('anggota.modal_create')
