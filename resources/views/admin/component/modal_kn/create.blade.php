<!-- Form tambah data -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Konsultan
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('konsultan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" id="name" required class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="pengalaman_kerja">Pengalaman Kerja Profesional</label>
                        <div id="daftar_pengalaman">
                            <div class="input-group mb-2">
                                <input type="text" name="pengalaman_kerja[]" class="form-control" required>
                                <button type="button" class="btn btn-sm btn-info" onclick="tambahInput()"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="karya_ilmiah">Karya Ilmiah</label>
                        <div id="daftar_karya_ilmiah">
                            <div class="input-group mb-2">
                                <input type="text" name="karya_ilmiah[]" class="form-control" required>
                                <button type="button" class="btn btn-sm btn-info" onclick="tambahInputKaryaIlmiah()"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="image">Upload Gambar</label>
                        <input type="file" name="image" id="image" required accept="image/*"
                            class="form-control-file" onchange="previewImage()">
                        <img class="img-preview img-fluid mt-3 col-sm-5">
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
<script>
    function tambahInput() {
        var daftarPengalaman = document.getElementById('daftar_pengalaman');
        var inputBaru = document.createElement('div');
        inputBaru.className = 'input-group mb-2';
        inputBaru.innerHTML = '<input type="text" name="pengalaman_kerja[]" class="form-control" required>' +
            '<button type="button" class="btn btn-sm btn-danger" onclick="hapusInput(this)"><i class="fas fa-trash"></i></button>';
        daftarPengalaman.appendChild(inputBaru);
    }

    function hapusInput(element) {
        var daftarPengalaman = document.getElementById('daftar_pengalaman');
        var inputHapus = element.parentNode;
        daftarPengalaman.removeChild(inputHapus);
    }
</script>

<script>
    function tambahInputKaryaIlmiah() {
        var daftarKaryaIlmiah = document.getElementById('daftar_karya_ilmiah');
        var inputBaru = document.createElement('div');
        inputBaru.className = 'input-group mb-2';
        inputBaru.innerHTML = '<input type="text" name="karya_ilmiah[]" class="form-control" required>' +
            '<button type="button" class="btn btn-sm btn-danger" onclick="hapusInputKaryaIlmiah(this)"><i class="fas fa-trash"></i></button>';
        daftarKaryaIlmiah.appendChild(inputBaru);
    }

    function hapusInputKaryaIlmiah(element) {
        var daftarKaryaIlmiah = document.getElementById('daftar_karya_ilmiah');
        var inputHapus = element.parentNode;
        daftarKaryaIlmiah.removeChild(inputHapus);
    }
</script>

