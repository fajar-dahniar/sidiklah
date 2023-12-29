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
                <form action="{{ route('sekolah.update', $d->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" id="name" required class="form-control"
                            value="{{ $d->name }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="sekolah">Nama Sekolah</label>
                        <input type="text" name="sekolah" id="sekolah" required class="form-control"
                            value="{{ $d->nama_sekolah }}">
                        @error('sekolah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="npsn">NPSN</label>
                        <input type="text" name="npsn" id="npsn" required class="form-control"
                            value="{{ $d->npsn }}">
                        @error('npsn')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="karya">Alamat</label>
                        <textarea type="text" name="alamat" id="alamat" class="form-control">{{ $d->alamat }}</textarea>
                        @error('alamat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
