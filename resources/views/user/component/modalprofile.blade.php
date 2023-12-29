<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Profile
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name"
                            name="name"value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="image">Upload Gambar</label>
                        <img src="{{ asset('storage/uploads/' . Auth::user()->image) }}" class="img-preview img-fluid mb-3 col-sm-3 d-block">
                        <input type="file" name="image" id="image" required accept="image/*"
                            class="form-control-file" onchange="previewImage()">

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
