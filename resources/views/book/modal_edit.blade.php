<div class="modal fade" id="editBukuModal{{ $book->id }}" tabindex="-1" aria-labelledby="editBukuModalLabel{{ $book->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title" id="editBukuModalLabel{{ $book->id }}">Edit Data Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form id="formEditBuku{{ $book->id }}" action="{{ route('book.update', $book->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="judul_buku{{ $book->id }}" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="judul_buku{{ $book->id }}" name="judul_buku" value="{{ $book->judul_buku }}" required>
          </div>

          <div class="mb-3">
            <label for="penerbit{{ $book->id }}" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit{{ $book->id }}" name="penerbit" value="{{ $book->penerbit }}" required>
          </div>

          <div class="mb-3">
            <label for="dimensi{{ $book->id }}" class="form-label">Dimensi</label>
            <input type="text" class="form-control" id="dimensi{{ $book->id }}" name="dimensi" value="{{ $book->dimensi }}" required>
          </div>
          <div class="mb-3">
            <label for="stock{{ $book->id }}" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock{{ $book->id }}" name="stock" value="{{ $book->stock }}" required>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" form="formEditBuku{{ $book->id }}" class="btn btn-warning text-dark">Simpan</button>
      </div>
    </div>
  </div>
</div>
