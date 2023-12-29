<script>
    // Fungsi untuk menghitung penjumlahan nilai checkbox
    function hitungTotalCheckbox() {
        var total = 0;
        document.querySelectorAll('.checkbox:checked').forEach(function(checkbox) {
            total += parseInt(checkbox.value);
        });
        document.getElementById('total_checkbox_value').value = total;
    }

    // Tambahkan event listener pada setiap checkbox
    document.querySelectorAll('.checkbox').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            hitungTotalCheckbox();
        });
    });
</script>
