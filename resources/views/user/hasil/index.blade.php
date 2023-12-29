@extends('user.layout.index')
@section('content')
    <style>
        .label {
            display: inline-block;
            width: 120px;
            /* Sesuaikan lebar yang diinginkan */
            
            margin-right: 10px;
            /* Sesuaikan margin kanan yang diinginkan */
        }


    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Hasil Diagnosis</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"
                                    class="text-success">SIDIKLAH</a></li>
                            <li class="breadcrumb-item active">Hasil Diagnosis</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <h6><b>Berikut adalah hasil diagnosis dari :</b></h6>
                                <br>
                                <h6>
                                    <b class="label">Nama :</b>
                                    <span class="value">{{ Auth::user()->name }}</span>
                                </h6>
                                <h6>
                                    <b class="label">Nama Sekolah :</b>
                                    <span class="value">{{ $sekolah->nama_sekolah }}</span>
                                </h6>
                                <h6>
                                    <b class="label">NPSN :</b>
                                    <span class="value">{{ $sekolah->npsn }}</span>
                                </h6>
                                <h6>
                                    <b class="label">Alamat :</b>
                                    <span class="value">{{ $sekolah->alamat }}</span>
                                </h6>

                                <table id="example2" class="table table-hover table-bordered border ">
                                    <thead>
                                        <tr align="center">
                                            <th width="10px">NO</th>
                                            <th>INSTRUMEN</th>
                                            <th>KETERANGAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->aspek_diagnosis }}</td>
                                                <td align="center">
                                                    @include('user.component.progres')
                                                    {!! determineSmallBoxContent($d->keterangan) !!}
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Grafik Hasil Diagnosis</h3>

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
                                    <canvas id="mychart"></canvas>

                                </div>

                            </div>

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
