<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beasiswa MR | Pendaftaran</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendors/adminlte3/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/vendors/adminlte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/vendors/adminlte3/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/auth/register" class="h1"><b>Register</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Daftar Beasiswa Pemda</p>

                <form action="{{ route('auth.user.storeuser') }}" method="post">
                    @csrf
                    @error('name')
                        <small id="emailHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nama Lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('username')
                        <small id="emailHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <small id="emailHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="contoh: nama@email.com">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <small id="emailHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                    @enderror <div class="input-group mb-3">
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <small id="emailHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('terms')
                        <small id="emailHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                    @enderror
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="true" {{ $errors->has('terms') ? '' : 'checked' }}>
                                <label for="agreeTerms">
                                    Saya setuju dan tunduk pada <a href="#">Aturan</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Daftfar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href="/auth/login" class="text-center">Sudah punya akun? Login disini</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="/vendors/adminlte3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/vendors/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/vendors/adminlte3/dist/js/adminlte.min.js"></script>
</body>

</html>
