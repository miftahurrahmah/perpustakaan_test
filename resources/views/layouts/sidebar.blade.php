<nav id="sidebar" class="bg-dark text-white">
  <div class="p-4 pt-5">
    <div class="text-center mb-4">
      <h5 class="mt-2 fw-bold">Perpustakaan</h5>
    </div>

    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-white d-flex align-items-center gap-2" href="/dashboard">
                <i class="fa-solid fa-house me-2"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white d-flex align-items-center gap-2" href="{{ url('/anggota') }}">
                <i class="fa-solid fa-users me-2"></i> <span>Data Anggota</span>
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white d-flex align-items-center gap-2" href="/book">
                <i class="fa-solid fa-book me-2"></i> <span>Data Buku</span>
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white d-flex align-items-center gap-2" href="/peminjaman">
                <i class="fa-solid fa-handshake me-2"></i> <span>Data Transaksi</span>
            </a>
        </li>
    </ul>
  </div>
</nav>
