@extends('user.layout.index')
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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"
                                    class="text-success">SIDIKLAH</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if ($sekolah)
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title ">Data Diri</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <div class="input-group-append">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <img src="{{ asset('storage/uploads/' . Auth::user()->image) }}"
                                                class="img-thumbnail" alt="User Image">
                                        </div>
                                        <div class="col-9">
                                            <div class="form-group row">
                                                <label for="inputSekolah" class="col-sm-2 col-form-label">Nama
                                                    Lengkap</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control text-bold" id="sekolah"
                                                        name="sekolah" value="{{ Auth::user()->name }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputSekolah" class="col-sm-2 col-form-label">Nama
                                                    Sekolah</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control text-bold" id="sekolah"
                                                        name="sekolah" value="{{ $sekolah->nama_sekolah }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputNPSN" class="col-sm-2 col-form-label">NPSN</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control text-bold" id="npsn"
                                                        name="npsn" value="{{ $sekolah->npsn }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <textarea type="text" class="form-control text-bold" id="alamat" name="alamat" readonly>{{ $sekolah->alamat }}</textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        @elseif(Auth::check())
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-danger">*Silahkan isi form dibawah ini terlebih dahulu!</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <div class="input-group-append">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <form action="{{ route('dashboard.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputSekolah" class="col-sm-1 col-form-label">Sekolah</label>
                                            <div class="col-sm-11">
                                                <input type="text"
                                                    class="form-control text-bold @error('sekolah') is-invalid @enderror"
                                                    id="sekolah" name="sekolah">
                                                @error('sekolah')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputNPSN" class="col-sm-1 col-form-label">NPSN</label>
                                            <div class="col-sm-11">
                                                <input type="number"
                                                    class="form-control text-bold @error('sekolah') is-invalid @enderror"
                                                    id="npsn" name="npsn">
                                                @error('npsn')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputAlamat" class="col-sm-1 col-form-label">Alamat</label>
                                            <div class="col-sm-11">
                                                <textarea type="text" class="form-control text-bold @error('alamat') is-invalid @enderror" id="alamat"
                                                    name="alamat"></textarea>
                                                @error('alamat')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-sm btn-success float-right"><i
                                                class='fas fa-save'></i> Simpan</button>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        @endif
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- AREA CHART -->
            </div>
            <!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner ">
                                <h3>Hasil Diagnosis</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-document"></i>

                            </div>
                            <a href="{{ route('hasil.index') }}" class="small-box-footer">Lihat Detail <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>Rekomendasi</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('user.rekom') }}" class="small-box-footer">Lihat
                                rekomendasi <i class="fas fa-arrow-circle-right"></i></a>

                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>Whatsapp</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-navicon"></i>
                            </div>
                            <a href="https://web.whatsapp.com/" class="small-box-footer" target="_blank">Klik untuk
                                membuka
                                <i class="fas fa-arrow-circle-right"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body text-justify">
                                <p class="text-md text-black">* Seiring dengan dinamika perkembangan pendidikan, manajemen
                                    sekolah memiliki peran yang semakin penting dalam memastikan kelancaran dan kualitas
                                    proses pembelajaran. Untuk itu, perlu adanya evaluasi secara menyeluruh terhadap
                                    kesehatan manajemen sekolah sebagai landasan untuk pengambilan keputusan yang tepat.
                                    <br>
                                    <br>
                                    Dalam rangka meningkatkan kualitas manajemen sekolah, kami telah menyusun suatu
                                    diagnosis kesehatan. Diagnosis ini bertujuan untuk menganalisis berbagai aspek manajemen
                                    sekolah, mulai dari perencanaan, pelaksanaan, hingga evaluasi. Melalui penilaian ini,
                                    diharapkan dapat teridentifikasi potensi-potensi perbaikan yang dapat mendukung
                                    terwujudnya sekolah yang efektif, efisien, dan inklusif.
                                    <br>
                                    Kami mengundang semua pihak terkait, mulai dari tenaga pendidik, tenaga kependidikan,
                                    hingga para pemangku kepentingan, untuk berpartisipasi aktif dalam proses diagnosis ini.
                                    Kontribusi dan pandangan dari berbagai pihak akan menjadi sumber daya berharga dalam
                                    menyusun rekomendasi dan strategi perbaikan yang lebih akurat dan berbasis kebutuhan.
                                    <br>
                                    <br>
                                    Terima kasih atas partisipasi dan kontribusi Anda dalam upaya meningkatkan kualitas
                                    pendidikan di sekolah ini. Semoga hasil dari diagnosis kesehatan manajemen sekolah ini
                                    dapat menjadi landasan yang kuat untuk mencapai tujuan pembelajaran yang berkualitas dan
                                    inklusif.
                                </p>
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
        <!-- /.content -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    @include('admin.component.alert')
@endsection
