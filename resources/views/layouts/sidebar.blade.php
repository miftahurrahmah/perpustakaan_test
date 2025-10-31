<nav id="sidebar" class="bg-dark text-white">
  <div class="p-4 pt-5">
    <div class="text-center mb-4">
      <h5 class="mt-2 fw-bold">Perpustakaan</h5>
    </div>

    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-white d-flex align-items-center gap-2" href="#">
                <i class="fa-solid fa-house me-2"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white d-flex align-items-center gap-2" href="{{ url('/anggota') }}">
                <i class="fa-solid fa-users me-2"></i> <span>Data Anggota</span>
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white d-flex align-items-center gap-2" href="#">
                <i class="fa-solid fa-book me-2"></i> <span>Data Buku</span>
            </a>
        </li>

        <li class="nav-item dropdown mb-2">
            <a class="nav-link dropdown-toggle text-white d-flex align-items-center gap-2"
                href="#" id="laporanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-handshake me-2"></i> <span>Data Transaksi</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark bg-secondary border-0 shadow"aria-labelledby="laporanDropdown">
                <li><a class="dropdown-item text-white" href="#">Pinjaman</a></li>
                    <li><a class="dropdown-item text-white" href="#">Pengembalian</a></li>
            </ul>
        </li>
    </ul>
  </div>
</nav>
