<x-admin.admin-layout :web="$web">

    @if (session()->has('pesan'))
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="alert alert-default-info">
                    {{ session()->get('pesan') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">



        <!--
        |_________________________________
        |COMPONENT TAHUN
        |_________________________________
        -->
        <div class="col-md-4 mb-4" id="tahuncard">
            <div class="card">
                <div class="card-header bg-gradient-light">
                    <h3 class="card-title">Jalur Masuk</h3>
                </div>
                <div class="card-body">
                    @include('admin.config.component-includes.component-tahun')
                </div>
            </div>
        </div>


        <!--
        |_________________________________
        |COMPONENT JALUR MASUK
        |_________________________________
        -->
        <div class="col-md-4 mb-4" id="jalurmasukcard">
            <div class="card">
                <div class="card-header bg-gradient-light">
                    <h3 class="card-title">Jalur Masuk</h3>
                </div>
                <div class="card-body">
                    @include('admin.config.component-includes.component-jalurmasuk')
                </div>
            </div>
        </div>


        <!--
        |_________________________________
        |COMPONENT JENIS PERGURUAN TINGGI
        |_________________________________
        -->
        <div class="col-md-4 mb-4" id="jenisptcard">
            <div class="card">
                <div class="card-header bg-gradient-light">
                    <h3 class="card-title">Jenis Perguruan Tinggi</h3>
                </div>
                <div class="card-body">
                    @include('admin.config.component-includes.component-jenispt')
                </div>
            </div>
        </div>


        <!--
        |_________________________________
        |COMPONENT JENJANG
        |_________________________________
        -->
        <div class="col-md-4 mb-4" id="jenjangcard">
            <div class="card">
                <div class="card-header bg-gradient-light">
                    <h3 class="card-title">Jenjang Pendidikan</h3>
                </div>
                <div class="card-body">
                    @include('admin.config.component-includes.component-jenjang')
                </div>
            </div>
        </div>


        <!--
        |_________________________________
        |COMPONENT KETERANGAN ORANG TUA
        |_________________________________
        -->
        <div class="col-md-4 mb-4" id="ketortucard">
            <div class="card">
                <div class="card-header bg-gradient-light">
                    <h3 class="card-title">Keterangan Status Hidup</h3>
                </div>
                <div class="card-body">
                    @include('admin.config.component-includes.component-ketortu')
                </div>
            </div>
        </div>


        <!--
        |_________________________________
        |COMPONENT PEKERJAAN
        |_________________________________
        -->
        <div class="col-md-4 mb-4" id="pekerjaancard">
            <div class="card">
                <div class="card-header bg-gradient-light">
                    <h3 class="card-title">Pekerjaan</h3>
                </div>
                <div class="card-body">
                    @include('admin.config.component-includes.component-pekerjaan')
                </div>
            </div>
        </div>


        <!--
        |_________________________________
        |COMPONENT PENDIDIKAN
        |_________________________________
        -->
        <div class="col-md-4 mb-4" id="pendidikancard">
            <div class="card">
                <div class="card-header bg-gradient-light">
                    <h3 class="card-title">Pendidikan</h3>
                </div>
                <div class="card-body">
                    @include('admin.config.component-includes.component-pendidikan')
                </div>
            </div>
        </div>


        <!--
        |_________________________________
        |COMPONENT PENGHASILAN
        |_________________________________
        -->
        <div class="col-md-4 mb-4" id="penghasilancard">
            <div class="card">
                <div class="card-header bg-gradient-light">
                    <h3 class="card-title">Penghasilan</h3>
                </div>
                <div class="card-body">
                    @include('admin.config.component-includes.component-penghasilan')
                </div>
            </div>
        </div>


        <!--
        |_________________________________
        |COMPONENT SEMESTER
        |_________________________________
        -->
        <div class="col-md-4 mb-4" id="semestercard">
            <div class="card">
                <div class="card-header bg-gradient-light">
                    <h3 class="card-title">Semester</h3>
                </div>
                <div class="card-body">
                    @include('admin.config.component-includes.component-semester')
                </div>
            </div>
        </div>


        <!--
        |_________________________________
        |COMPONENT STATUS MAHASISWA
        |_________________________________
        -->
        <div class="col-md-4 mb-4" id="statusawalmhscard">
            <div class="card">
                <div class="card-header bg-gradient-light">
                    <h3 class="card-title">Status Awal Mahasiswa</h3>
                </div>
                <div class="card-body">
                    @include('admin.config.component-includes.component-statusawal')
                </div>
            </div>
        </div>


        <!--
        |_________________________________
        |COMPONENT STATUS MAHASISWA
        |_________________________________
        -->
        <div class="col-md-4 mb-4" id="statusmhscard">
            <div class="card">
                <div class="card-header bg-gradient-light">
                    <h3 class="card-title">Status Terakhir Mahasiswa</h3>
                </div>
                <div class="card-body">
                    @include('admin.config.component-includes.component-statusmhs')
                </div>
            </div>
        </div>


        <!--
        |_________________________________
        |COMPONENT STATUS ORANG TUA
        |_________________________________
        -->
        <div class="col-md-4 mb-4" id="statusortucard">
            <div class="card">
                <div class="card-header bg-gradient-light">
                    <h3 class="card-title">Hubungan Keluarga</h3>
                </div>
                <div class="card-body">
                    @include('admin.config.component-includes.component-statusortu')
                </div>
            </div>
        </div>



    </div>


    {{-- @include('admin.config.modal.modal-config-roles') --}}

</x-admin.admin-layout>
