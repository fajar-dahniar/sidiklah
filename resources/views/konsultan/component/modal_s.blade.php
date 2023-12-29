<div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Form Rekomendasi
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rekomendasi-supervisi.update', $d->id) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <label for="rekomendasi">Berikan Rekomendasi</label>
                    <textarea type="text" name="rekomendasi" class="form-control"></textarea>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Kembali</button>
                        <button type="submit"
                            class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
