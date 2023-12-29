
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
