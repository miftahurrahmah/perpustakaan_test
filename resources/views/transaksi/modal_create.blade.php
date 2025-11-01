<div class="modal fade" id="tambahPeminjamanModal" tabindex="-1" aria-labelledby="tambahPeminjamanModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="tambahPeminjamanModalLabel">Tambah Peminjaman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form id="formTambahPeminjaman" action="{{ route('peminjaman.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="tgl_peminjaman" class="form-label">Tanggal Peminjaman</label>
            <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" required>
          </div>

          <div class="mb-3">
            <label for="book_id" class="form-label">Judul Buku</label>
            <select id="book_id" name="book_id" required></select>
          </div>

          <div class="mb-3">
            <label for="anggota_id" class="form-label">Nama Peminjam</label>
            <select id="anggota_id" name="anggota_id" required></select>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" form="formTambahPeminjaman" class="btn btn-success">Simpan</button>
      </div>

    </div>
  </div>
</div>
