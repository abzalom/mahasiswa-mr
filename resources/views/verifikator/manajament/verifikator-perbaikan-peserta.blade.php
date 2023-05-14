<x-verifikator.verifikator-layout :web="$web">

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
                    <h4>Peserta Yang Perbaikan Berkas</h4>

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
                                    <th>Ket</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($user->pesertas as $peserta)
                                    @if ($peserta->verified->count())
                                        @if ($peserta->verified->last()->verify_status_id == 2)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <a href="{{ route('verifikator.perbaikan.peserta', $peserta->id) }}">
                                                        {{ $peserta->nama }}
                                                    </a>
                                                </td>
                                                <td>{{ $peserta->nim }}</td>
                                                <td>{{ $peserta->phone }}</td>
                                                <td>{{ $peserta->semester ? $peserta->semester->nama : '' }}</td>
                                                <td>
                                                    @if ($peserta->verified->count())
                                                        <ul>
                                                            @foreach ($peserta->verified as $verified)
                                                                <li>{{ str($verified->status->name)->upper() }} <small>( {{ $verified->created_at->format('d-M-Y H:i:s') }})</small></li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <ul>
                                                            <li>
                                                                Belum diverfikasi
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </td>
                                                <td></td>
                                                {{-- <td><button class="btn btn-sm btn-secondary" id="edit-peserta-button" value="{{ $peserta->id }}">Verifikasi</td> --}}
                                            </tr>
                                        @endif
                                    @endif
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

</x-verifikator.verifikator-layout>
