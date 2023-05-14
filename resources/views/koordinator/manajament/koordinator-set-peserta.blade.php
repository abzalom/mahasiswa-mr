<x-koordinator.koordinator-layout :web="$web">

    @if (session()->has('pesan'))
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="alert alert-default-success">{{ session()->get('pesan') }}</div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h3 class="card-title">Manajemen Peserta</h3>
                </div>
                <div class="card-body">
                    <h4>Peserta yang belum memiliki verifikator</h4>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped datatable">
                            <thead class="table-info">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Telepon</th>
                                    <th>Semester</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesertas as $peserta)
                                    <tr>
                                        <td></td>
                                        <td>{{ $peserta->nama }}</td>
                                        <td>{{ $peserta->nim }}</td>
                                        <td>{{ $peserta->phone }}</td>
                                        <td>{{ $peserta->semester ? $peserta->semester->nama : '' }}</td>
                                        <td></td>
                                        <td><button class="btn btn-sm btn-secondary" id="edit-peserta-button" value="{{ $peserta->id }}" data-toggle="modal" data-target="#editTimModal"><i class="fas fa-users"></i></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Table User Panitia
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
    </div>


    @include('koordinator.manajament.modal.modal-edit-tim')

</x-koordinator.koordinator-layout>
