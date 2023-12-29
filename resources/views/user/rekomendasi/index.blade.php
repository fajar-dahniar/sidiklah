@extends('user.layout.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Rekomendasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"
                                    class="text-success">SIDIKLAH</a></li>
                            <li class="breadcrumb-item active">Rekomendasi</li>
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
                                <h3 class="card-title">Informasi Konsultan </h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example2" class="table table-hover table-striped border">
                                    <thead>
                                        <tr align="center">
                                            <th width="10px">NO</th>
                                            <th>FOTO PROFIL</th>
                                            <th>NAMA LENGKAP</th>
                                            <th>PENGALAMAN KERJA PROFESIONAL</th>
                                            <th>KARYA ILMIAH</th>
                                            <th>REKOMENDASI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td align="center">{{ $loop->iteration }}</td>
                                                <td align="center">
                                                    <img src="{{ asset('storage/uploads/' . $d->image_user) }}"
                                                        alt="Gambar Konsultan" width="50" class="img-fluid">
                                                </td>

                                                <td>{{ $d->nama_user }}</td>
                                                <td width="300px" align="justify">{{ $d->pengalaman_kerja }}</td>
                                                <td width="300px">{{ $d->karya_ilmiah }}</td>
                                                <td align="center"><button data-toggle="modal"
                                                        data-target="#ModalWA{{ $d->id }}"
                                                        class="btn btn-sm btn-info"><i class="far fa-eye"></i> Lihat
                                                    </button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    @if ($sekolah)
                        <div class="col-12">
                            <div class="card" style="border-radius: 5px;">
                                <div class="card-body bg-success text-justify" style="border-radius: 5px">
                                    <h5><b>Kesimpulan :</b></h5>
                                    <p>Berdasarkan dari hasil diagnosis yang telah dilakukan sebelumnya dari 3 Aspek
                                        Diagnosis yaitu:
                                    </p>
                                    @foreach ($hasil as $h)
                                        <li><b>{{ $h->aspek_diagnosis }},</b> dengan keterangan : <b>
                                                {{ $h->keterangan }}.</b></li>
                                    @endforeach
                                    <br>
                                    <h5><b>Rekomendasi:</b></h5>
                                    @foreach ($hasil as $h)
                                        <li><b>{{ $h->aspek_diagnosis }}:</b>{{ $h->rekomendasi }}.</li>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    @elseif(Auth::check())
                        <div class="col-12">
                            <div class="card" style="border-radius: 5px;">
                                <div class="card-body bg-success text-justify" style="border-radius: 5px">
                                    <h3>*Konsultan Belum Memberikan Rekomendasi</h3>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    @include('admin.component.alert')
    @include('user.component.modal')
@endsection
