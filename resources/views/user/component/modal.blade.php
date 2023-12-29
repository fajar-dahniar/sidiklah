<div class="modal fade" id="ModalWA{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Form Chat Whatsapp
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('whatsapp.store') }}" method="post">
                    @csrf

                    <label for="nama">Nama Konsultan</label>
                    <input type="text" class="form-control" name="nama" id="nama"  readonly value="{{ $d->nama_user }}">

                    <label for="nomor">Nomor Telepon</label>
                    <input type="tel" class="form-control" name="nomor" id="nomor" required readonly value="{{ $d->nohp }}">

                    <label for="pesan">Pesan:</label>
                    <textarea class="form-control" placeholder="Tuliskan apa yang ingin anda tanyakan " name="pesan" id="pesan"></textarea>

                    <button type="submit" class="btn btn-sm btn-success mt-3">Kirim ke WhatsApp</button>
                </form>
            </div>
        </div>
    </div>
</div>
