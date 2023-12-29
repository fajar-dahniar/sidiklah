<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIDIKLAH | Sistem Informasi Diagnosis Kesehatan Manajemen Sekolah</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed bg-dark">
    @if (session('success'))
        <div class="alert alert-info" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5" style="border-radius: 10px">
            <div class="card-body bg-success" style="border-radius: 10px">
                <div class="row justify-content-center">
                    <div class="col-12 ">
                        <img class="img-fluid img-responsive" src="{{ asset('assets/dist/img/logo1.png') }}"
                            width="45%" alt="imglogin">
                    </div>
                    <div class="col-12">
                        <div class="text-justify">
                            <p class="lead text-white" style="font-size: 16px; padding: 20px;">
                                Sistem Informasi Diagnosis Kesehatan Manajemen Sekolah (SIDIKLAH) merupakan program
                                aplikasi untuk mendiagnosis kesehatan manajemen sekolah berbasis online bagi pimpinan
                                sekolah di lingkungan satuan pendidikan. Program diagnosis kesehatan manajemen sekolah
                                berbasis pada pemanfaatan teknologi internet (online) yang dapat dilakukan tanpa
                                keterbatasan ruang dan waktu ‘any time any where’. Diagnosis yang dimaksud dalam
                                aplikasi ini adalah bagaimana mengukur kesehatan manajemen sekolah yang dilakukan oleh
                                pimpinan sekolah dalam melakukan upaya-upaya manajemen dalam mengelola sekolah yang
                                berkaitan dengan perencanaan, penganggaran, implementasi program, pengorganisasian,
                                kepemimpinan, supervisi dan evaluasi program.
                                <br>
                                Silahkan download terlebih dahulu panduan penggunaan aplikasi SIDIKLAH.
                            </p>
                        </div>
                        <a href="http://localhost/SIDIKLAH/download" target="_blank"
                            class="btn btn-warning btn-block mt-3 mb-3 text-dark"><i class="fa fa-file-pdf"></i>
                            Download Panduan SIDIKLAH</a>
                        <a class="btn btn-primary active btn-block btn-lg text-center text-white bg-info border-info shadow-none float-right"
                            role="button" href="{{ route('auth.login') }}">LOGIN DISINI&nbsp;<i
                                class="fa fa-angle-double-right"></i>&nbsp;</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{ url('assets/dist/js/pages/dashboard2.js')}}"></script> --}}


</body>

</html>
