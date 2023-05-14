<x-koordinator.koordinator-layout :web="$web">
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h3 class="card-title">Petugas Verifikator Per Peserta</h3>
                </div>
                <div class="card-body">

                    <div class="row mb-4">
                        <div class="col-sm">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped datatable">
                            <thead class="table-info">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Telepon</th>
                                    <th>Semester</th>
                                    <th>Verifikator</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($panitias as $panitia)
                                    @foreach ($panitia->pesertas as $peserta)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $peserta->nama }}</td>
                                            <td>{{ $peserta->nim }}</td>
                                            <td>{{ $peserta->phone }}</td>
                                            <td>{{ $peserta->semester->nama }}</td>
                                            <td>{{ $panitia->name }}</td>
                                            <td></td>
                                            <td><button class="btn btn-sm btn-secondary">Edit</button></td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
    </div>


</x-koordinator.koordinator-layout>
