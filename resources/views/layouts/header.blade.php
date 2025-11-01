<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 shadow-sm">
  <div class="container-fluid">
    <span class="navbar-brand fw-bold">Website Perpustakaan</span>

   <div class="ms-auto">
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
        </form>
    </div>
  </div>
</nav>
