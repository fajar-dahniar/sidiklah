<div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('konsultan.update', $d->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" id="name" required class="form-control"
                            value="{{ $d->name }}">
                    </div>
                    <div class="mb-2">
                        <label for="kerja">Pengalaman Kerja Profesional</label>
                        <input type="text" name="kerja" id="kerja" required class="form-control"
                            value="{{ $d->pengalaman_kerja }}">
                    </div>
                    <div class="mb-2">
                        <label for="karya">Karya Ilmiah</label>
                        <input type="text" name="karya" id="karya" required class="form-control"
                            value="{{ $d->karya_ilmiah }}">
                    </div>
                    <div class="mb-2">
                        <label for="image">Upload Gambar</label>
                        <img src="{{ asset('storage/uploads/' . $d->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        <input type="file" name="image" id="image" required accept="image/*"
                            class="form-control-file" onchange="previewImage()">

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        };

        // Periksa apakah file gambar telah dipilih sebelum membaca sebagai data URL
        if (image.files.length > 0) {
            oFReader.readAsDataURL(image.files[0]);
        }
    }
</script>
