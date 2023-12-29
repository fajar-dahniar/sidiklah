@extends('auth.index')
@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('auth.register') }}" class="h1"><img class="img-fluid" src="{{ asset('assets/dist/img/logo0.png') }}"
                    alt="" width="20%"><b>SIDIKLAH</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Registrasi Akun!</p>

                <form action="{{ route('auth.registration') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Lengkap"  value="{{ old('name') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password_confirmation" placeholder="Ulangi password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row">
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-sm btn-primary btn-block">Register</button>
                        </div>
                        <div class="col-12 text-center">
                            <a href="{{ route('auth.login') }}" class="text-center text-sm">Sudah Punya Akun? Silahkan Login!</a>
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                </form>


            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection
