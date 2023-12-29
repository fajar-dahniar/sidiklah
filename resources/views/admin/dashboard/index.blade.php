@extends('admin.layout.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="text-success">SIDIKLAH</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
                            <div class="info-box-content">

                                <span class="info-box-text">User</span>
                                <span class="info-box-number">
                                    {{ $user }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-md"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Konsultan</span>
                                <span class="info-box-number">{{ $konsultan }}</span>
                            </div>

                        </div>

                    </div>


                    <div class="clearfix hidden-md-up"></div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Diagnosis</span>
                                <span class="info-box-number">{{ $hasil }}</span>
                            </div>

                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-school text-white"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Sekolah</span>
                                <span class="info-box-number">{{ $sekolah }}</span>
                            </div>

                        </div>

                    </div>



                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Hasil Penilaian</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-hover border">
                                    <thead>
                                        <tr>
                                            <th align="center" width="10px">NO</th>
                                            <th align="center">NAMA</th>
                                            <th align="center">SEKOLAH</th>
                                            <th align="center">ASPEK DIAGNOSIS</th>
                                            <th align="center">SKOR</th>
                                            <th align="center">KETERANGAN</th>
                                            <th align="center">REKOMENDASI</th>
                                            <th align="center">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- AREA CHART -->
                <div class="card col-md-12">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Hasil Penilaian</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <canvas id="pie"></canvas>

                        </div>

                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    @include('admin.component.alert')
@endsection
