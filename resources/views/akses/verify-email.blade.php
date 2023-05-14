<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Email</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendors/adminlte3/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/vendors/adminlte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/vendors/adminlte3/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <b class="h1">Verifikasi Email</b>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Link verifikasi telah dikirim ke alamat emal anda. Jika belum menerima email notifikasi silahkan klik tombol krim ulang di bawah.</p>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" readonly value="{{ auth()->user()->email }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <form action="{{ route('verification.send') }}" method="post">
                    <div class="row">
                        @csrf
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Kirim Ulang</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="/vendors/adminlte3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/vendors/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/vendors/adminlte3/dist/js/adminlte.min.js"></script>
</body>

</html>
