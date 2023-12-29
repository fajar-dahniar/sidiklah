@extends('user.layout.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Perencanaan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"
                                    class="text-success">SIDIKLAH</a></li>
                            <li class="breadcrumb-item active">Perencanaan</li>
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
                                <h3 class="card-title">Instrumen Perencanaan Sekolah</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <form action="{{ route('perencanaan.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <table id="example2" class="table table-hover table-striped border">
                                        <thead>
                                            <tr align="center">
                                                <th width="10px">NO</th>
                                                <th>ITEM PERTANYAAN</th>
                                                <th>TIDAK PERNAH </th>
                                                <th>TIDAK TAHU </th>
                                                <th>TIDAK </th>
                                                <th>YA,SEBAGIANNYA </th>
                                                <th>YA,SELURUHNYA </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($p as $d)
                                                <tr>
                                                    <td align='center'>{{ $loop->iteration }}</td>
                                                    <td align='justify'>{{ $d->item_pertanyaan }}</td>
                                                    <td align='center'><input type="checkbox" class="checkbox"
                                                            name="tidak_pernah[]" value="1"></td>
                                                    <td align='center'><input type="checkbox" class="checkbox"
                                                            name="tidak_tahu[]" value="2"></td>
                                                    <td align='center'><input type="checkbox" class="checkbox"
                                                            name="tidak[]" value="3"></td>
                                                    <td align='center'><input type="checkbox" class="checkbox"
                                                            name="ya_sebagiannya[]" value="4"></td>
                                                    <td align='center'><input type="checkbox" class="checkbox"
                                                            name="ya_seluruhnya[]" value="5"></td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <input type="hidden" id="total_checkbox_value" name="total_checkbox_value"
                                        value="0">
                                        <input type="hidden" id="id_instrumen" name="id_instrumen"
                                        value="1">
                                    <button type="submit" class="btn btn-sm btn-success mt-3 float-right"><i
                                            class='fas fa-paper-plane'></i> Submit</button>
                                </form>
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
    @include('admin.component.alert')
    @include('user.component.script')
@endsection
