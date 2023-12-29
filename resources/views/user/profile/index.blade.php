@extends('user.layout.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Halaman Profile</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"
                                    class="text-success">SIDIKLAH</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-3 text-center">
                                        <img src="{{ asset('storage/uploads/' . Auth::user()->image) }}"
                                            class="img-thumbnail" alt="User Image">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label for="inputSekolah" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control text-bold" id="sekolah"
                                                    name="sekolah" value="{{ Auth::user()->name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSekolah" class="col-sm-2 col-form-label">Nama Sekolah</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control text-bold" id="sekolah" name="sekolah" value="{{ $data->nama_sekolah }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSekolah" class="col-sm-2 col-form-label">NPSN</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control text-bold" id="sekolah" name="sekolah" value="{{ $data->npsn }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSekolah" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control text-bold" id="sekolah" name="sekolah" readonly>{{ $data->alamat }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type='button' class='btn btn-sm btn-success mt-3' data-toggle="modal"
                                            data-target="#editModal"><i class='fas fa-edit'></i>
                                            Edit Profile</button>
                                    </div>
                                </div>
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
    @include('user.component.modalprofile')
    @include('admin.component.alert')
    @include('konsultan.component.script')

@endsection
