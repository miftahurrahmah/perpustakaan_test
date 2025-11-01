@extends('layouts.main')

@section('content')

<div class="container-fluid px-5">

    <div class="row mb-4 g-3">
        <div class="col-md-4">
            <div class="card text-white bg-success shadow h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <img src="https://img.icons8.com/ios-filled/50/ffffff/user-group-man-man.png" width="50" />
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Jumlah Anggota</h5>
                        <h3>{{ $totalAnggota }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning shadow h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <img src="https://img.icons8.com/ios-filled/50/ffffff/book.png" width="50" />
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Jumlah Buku</h5>
                        <h3>{{ $totalBuku }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-info shadow h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <img src="https://img.icons8.com/ios-filled/50/ffffff/calendar.png" width="50" />
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Peminjaman Hari Ini</h5>
                        <h3>{{ $totalPeminjamanHariIni }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-center fw-bold bg-light">
                    📊 Jumlah Peminjaman Buku per Hari (7 Hari Terakhir)
                </div>
                <div class="card-body">
                    <canvas id="chartPeminjaman" style="max-height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartPeminjaman').getContext('2d');
    const chartPeminjaman = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: {!! json_encode($data) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>

@endsection
