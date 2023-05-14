<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $web['title'] }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendors/adminlte3/plugins/fontawesome-free/css/all.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/vendors/adminlte3/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/vendors/adminlte3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/vendors/adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendors/adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendors/adminlte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


    <!-- Theme style -->
    <link rel="stylesheet" href="/vendors/adminlte3/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper">

        <x-koordinator.koordinator-sidebar></x-koordinator.koordinator-sidebar>
        <x-koordinator.koordinator-navbar></x-koordinator.koordinator-navbar>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{ $web['desc'] }}</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    {{ $slot }}

                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/vendors/adminlte3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/vendors/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/vendors/adminlte3/dist/js/adminlte.min.js"></script>
    <!-- Select2 -->
    <script src="/vendors/adminlte3/plugins/select2/js/select2.full.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/vendors/adminlte3/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendors/adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/vendors/adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendors/adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/vendors/adminlte3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/vendors/adminlte3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/vendors/adminlte3/plugins/jszip/jszip.min.js"></script>
    <script src="/vendors/adminlte3/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/vendors/adminlte3/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/vendors/adminlte3/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/vendors/adminlte3/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/vendors/adminlte3/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>



    <!-- My Script -->
    <script src="/assets/script/koordinatorScript.js"></script>
</body>

</html>
