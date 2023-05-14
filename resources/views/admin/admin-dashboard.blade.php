<x-admin.admin-layout :web="$web">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Koordinator</span>
                            <span class="info-box-number">{{ $users::role('koordinator')->count() }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Verifikator</span>
                            <span class="info-box-number">{{ $users::role('verifikator')->count() }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Peserta</span>
                            <span class="info-box-number">{{ $pesertas->count() }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Likes</span>
                            <span class="info-box-number">93,139</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>


        </div>
    </div>

</x-admin.admin-layout>
