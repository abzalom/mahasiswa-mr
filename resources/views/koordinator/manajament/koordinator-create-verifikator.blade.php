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
                                    @foreach ($panitia->verifikator as $peserta)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $peserta->nama }}</td>
                                            <td>{{ $peserta->nim }}</td>
                                            <td>{{ $peserta->phone }}</td>
                                            <td>{{ $peserta->semester ? $peserta->semester->nama : '' }}</td>
                                            <td>{{ $panitia->name }}</td>
                                            <td></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button class="btn btn-sm btn-secondary edit-verified-peserta" data-userid="{{ $peserta->id }}" data-verifikator="{{ $panitia->id }}" data-toggle="modal" data-target="#editVerifikator"><i class="fa fa-edit"></i></button>
                                                    <form action="{{ route('koordinator.destroy.verifikator.peserta') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="peserta" value="{{ $peserta->id }}">
                                                        <input type="hidden" name="panitia" value="{{ $panitia->id }}">
                                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
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

    @include('koordinator.manajament.modal.modal-create-verifikator')

</x-koordinator.koordinator-layout>
