@if (!function_exists('determineSmallBoxContent'))
    @php
        function determineSmallBoxContent($keterangan)
        {
            // Logika penentuan konten berdasarkan keterangan
            // Misalnya, jika keterangan adalah "Sehat Sekali", tampilkan progress bar dengan kelas dan gaya yang sesuai
            switch ($keterangan) {
                case 'Sehat Sekali':
                    $progressBarClass = 'bg-success';
                    $progressBarWidth = 'width:100%';
                    $progressBarLabel = ''.$keterangan ; // Gantilah 'skor' dengan nama kolom yang sesuai dalam tabel skor
                    break;
                case 'Sehat':
                    $progressBarClass = 'bg-warning';
                    $progressBarWidth = 'width:100%';
                    $progressBarLabel = ''.$keterangan;
                    break;
                case 'Kurang Sehat':
                    $progressBarClass = 'bg-danger';
                    $progressBarWidth = 'width:100%'; // Sesuaikan dengan logika yang sesuai dengan data skor
                    $progressBarLabel = ''.$keterangan;
                    break;
                default:
                    $progressBarClass = 'bg-danger';
                    $progressBarWidth = 'width: 0%';
                    $progressBarLabel = 'Tidak Diketahui';
                    break;
            }

            // Membuat string HTML untuk progress bar
            $progressBarHTML = '<div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar ' . $progressBarClass . '" style="' . $progressBarWidth . '; font-size: 14px;">' . $progressBarLabel . '</div>
                    </div>';


            echo $progressBarHTML;
        }
    @endphp
@endif
