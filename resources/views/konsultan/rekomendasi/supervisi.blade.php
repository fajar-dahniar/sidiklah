@extends('konsultan.layout.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Rekomendasi-Supervisi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard-konsultan.index') }}"
                                    class="text-success">SIDIKLAH</a></li>
                            <li class="breadcrumb-item active">Rekomendasi-Supervisi</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Hasil Diagnosis Supervisi</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-hover border">
                                    <thead>
                                        <tr align="center">
                                            <th align="center" width="10px">NO</th>
                                            <th align="center">NAMA</th>
                                            <th align="center">SEKOLAH</th>
                                            <th align="center">ASPEK DIAGNOSIS</th>
                                            <th align="center">KETERANGAN</th>
                                            <th align="center">REKOMENDASI</th>
                                            <th align="center">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td align="center">{{ $loop->iteration }}</td>
                                                <td>{{ $d->name }}</td>
                                                <td>{{ $d->nama_sekolah }}</td>
                                                <td>{{ $d->aspek_diagnosis }}</td>
                                                <td align="center">{{ $d->keterangan }}</td>
                                                <td align="justify">{{ $d->rekomendasi }}</td>
                                                <td align="center" width="150px">
                                                    <button type='button' class='btn btn-sm btn-success text-white'
                                                        data-toggle="modal" data-target="#editModal{{ $d->id }}">
                                                        <i class='fas fa-edit'></i> Beri Rekomendasi
                                                    </button>
                                                </td>
                                                @include('konsultan.component.modal_s')
                                            </tr>
                                        @endforeach
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
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    @include('admin.component.alert')
    @include('konsultan.component.script')
@endsection
