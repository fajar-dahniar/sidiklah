@extends('admin.layout.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Supervisi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="text-success">SIDIKLAH</a></li>
                            <li class="breadcrumb-item active">Supervisi</li>
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
                            <div class="card-header">
                                <h3 class="card-title">Tabel Data Instrumen Supervisi</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <div class="input-group-append">
                                            <button type='button' class='btn btn-sm btn-success float-right'
                                                data-toggle="modal" data-target="#tambahModal"><i
                                                    class='fas fa-plus-square'></i>
                                                Tambah Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-hover table-striped border">
                                    <thead>
                                        <tr align="center">
                                            <th width="10px">NO</th>
                                            <th>ITEM PERTANYAAN</th>
                                            <th width="100px">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td align="center">{{ $loop->iteration }}</td>
                                                <td align="justify">{{ $d->item_pertanyaan }}</td>
                                                <td align="center">
                                                    <button type='button' class='btn btn-sm btn-warning text-white'
                                                        data-toggle="modal" data-target="#editModal{{ $d->id }}">
                                                        <i class='fas fa-edit'></i>
                                                    </button>
                                                    |
                                                    <button type='button' class='btn btn-sm btn-danger' data-toggle="modal"
                                                        data-target="#deleteModal{{ $d->id }}">
                                                        <i class='fas fa-trash'></i>
                                                    </button>
                                                </td>
                                                @include('admin.component.modal_s.update')
                                                @include('admin.component.modal_s.delete')
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    @include('admin.component.modal_s.create')
    @include('admin.component.alert')
@endsection
