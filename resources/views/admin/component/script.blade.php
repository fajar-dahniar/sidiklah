<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.3.1/dist/tagify.css">
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.3.1/dist/tagify.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi Tagify untuk inputPengalamanKerja
        var inputPengalamanKerja = document.getElementById('inputPengalamanKerja');
        var tagifyPengalamanKerja = new Tagify(inputPengalamanKerja, {
            dropdown: {
                maxItems: 5,
                enabled: 0,
                closeOnSelect: true,
            }
        });

        // Inisialisasi Tagify untuk inputKaryaIlmiah
        var inputKaryaIlmiah = document.getElementById('inputKaryaIlmiah');
        var tagifyKaryaIlmiah = new Tagify(inputKaryaIlmiah, {
            dropdown: {
                maxItems: 5,
                enabled: 0,
                closeOnSelect: true,
            }
        });

        
    });
</script>
