@extends('konsultan.layout.index')
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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard-konsultan.index') }}"
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
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
                            <div class="info-box-content">

                                <span class="info-box-text">User</span>
                                <span class="info-box-number">
                                    {{ $usercount }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-md"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Konsultan</span>
                                <span class="info-box-number">{{ $konsultancount }}</span>
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
                            <span class="info-box-icon bg-warning elevation-1"><i
                                    class="fas fa-school text-white"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Sekolah</span>
                                <span class="info-box-number">{{ $sekolah }}</span>
                            </div>

                        </div>

                    </div>


                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- AREA CHART -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if ($konsultan)
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
                                        <div class="col-3">
                                            <img src="{{ asset('storage/uploads/' . Auth::user()->image) }}"
                                                class="img-thumbnail" alt="User Image">
                                        </div>
                                        <div class="col-9">
                                            <div class="form-group row">
                                                <label for="inputSekolah" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSekolah" class="col-sm-2 col-form-label">Pengalaman Kerja
                                                    Professional</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" readonly>{{ $konsultan->pengalaman_kerja }}</textarea>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputNPSN" class="col-sm-2">Karya Ilmiah</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="{{ $konsultan->karya_ilmiah }}">
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
                                    <h3 class="card-title text-danger">*Silahkan isi form dibawah ini untuk melengkapi data
                                        diri!</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <div class="input-group-append">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <form action="{{ route('dashboard-konsultan.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="pengalaman_kerja">Pengalaman Kerja Profesional</label>
                                            <div id="daftar_pengalaman">
                                                <div class="input-group mb-2">
                                                    <input type="text" name="pengalaman_kerja[]" class="form-control"
                                                        required>
                                                    <button type="button" class="btn btn-sm btn-info"
                                                        onclick="tambahInput()"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="karya_ilmiah">Karya Ilmiah</label>
                                            <div id="daftar_karya_ilmiah">
                                                <div class="input-group mb-2">
                                                    <input type="text" name="karya_ilmiah[]" class="form-control"
                                                        required>
                                                    <button type="button" class="btn btn-sm btn-info"
                                                        onclick="tambahInputKaryaIlmiah()"><i
                                                            class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-sm btn-success"><i
                                                    class="fas fa-save"></i> Simpan</button>
                                        </div>
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
        <!-- Main content -->
        <!-- /.content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    @include('admin.component.alert')
    @include('konsultan.component.script')
@endsection
