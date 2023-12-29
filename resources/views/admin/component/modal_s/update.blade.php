<div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('supervisi-admin.update', $d->id) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <label for="item_pertanyaan">Item Pertanyaan</label>
                    <textarea type="text" name="item_pertanyaan" class="form-control">{{ $d->item_pertanyaan }}</textarea>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Kembali</button>
                        <button type="submit"
                            class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
