<style>
    .navbar-wrapper {
        display: flex;
        width: 100%;
    }

    .navbar-left {
        flex: 1;
    }

    .navbar-center {
        flex: 3;
        display: flex;
        align-items: center;
    }

    .navbar-right {
        flex: 1;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .marquee {
        width: 100%;
    }
</style>
<nav class="main-header navbar navbar-expand  navbar-dark bg-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Center navbar links with marquee -->
    <h6 class="marquee">
        <marquee class="mt-2 text-lg"> SELAMAT DATANG DI PROGRAM APLIKASI SISTEM INFORMASI DIAGNOSIS KESEHATAN MANAJEMEN
            SEKOLAH </marquee>
        </h5>
        <!-- Right navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
        <div class="pull-right">
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modallogout"><i
                    class="fas fa-fw fa-sign-out-alt"></i> </button>
        </div>
</nav>


<!-- /.navbar -->
<div class="modal fade" id="modallogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white" id="exampleModalLabel">Bersedia untuk keluar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('auth.logout') }}">
                <div class="modal-body">
                    Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-warning text-white">Keluar</button>
                </div>
            </form>
        </div>
    </div>
</div>
