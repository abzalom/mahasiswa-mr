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
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h3 class="card-title">Data Pejabat</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped datatable">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Pejabat / Gol / NIP</th>
                                <th>Jabatan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($pejabats as $pejabat)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        {{ str($pejabat->nama)->upper() }}
                                        @if ($pejabat->nip)
                                            <br>
                                            NIP. {{ $pejabat->nip }}
                                        @endif
                                    </td>
                                    <td>{{ str($pejabat->jabatan)->upper() }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <form method="get">
                                                <input type="hidden" name="id" value="{{ $pejabat->id }}">
                                                <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></button>
                                            </form>
                                            <form action="{{ route('admin.destroy.pejabats') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $pejabat->id }}">
                                                <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data pejabat ini?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Default box -->
            <div class="card">
                <div class="card-header bg-gradient-secondary">
                    <h3 class="card-title">Olah Data Pejabat</h3>
                </div>
                <div class="card-body">
                    <form action="{{ $getOnePejabat ? route('admin.update.pejabats') : route('admin.config.pejabats') }}" method="post">
                        @csrf
                        <div class="row">
                            @if ($getOnePejabat)
                                <input type="hidden" name="id" value="{{ $getOnePejabat->id }}">
                            @endif
                            <div class="form-group col-sm-12">
                                <label for="namaPejabat">Nama</label>
                                <input type="text" name="nama" value="{{ old('nama') ? old('nama') : ($getOnePejabat ? $getOnePejabat->nama : '') }}" class="form-control" id="namaPejabat" aria-describedby="namaPejabatHelp" placeholder="Pejabat">
                                @error('nama')
                                    <small id="namaPejabatHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="namaJabatan">Jabatan</label>
                                <input type="text" name="jabatan" value="{{ old('jabatan') ? old('jabatan') : ($getOnePejabat ? $getOnePejabat->jabatan : '') }}" class="form-control" id="namaJabatan" aria-describedby="namaJabatanHelp" placeholder="Jabatan">
                                @error('jabatan')
                                    <small id="namaJabatanHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="nip">NIP (<small>Optional</small>)</label>
                                <input type="text" name="nip" value="{{ old('nip') ? old('nip') : ($getOnePejabat ? $getOnePejabat->nip : '') }}" class="form-control" id="nip" aria-describedby="nipHelp" placeholder="NIP">
                                @error('nip')
                                    <small id="nipHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block">Simpan</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


    {{-- @include('admin.config.modal.modal-config-roles') --}}

</x-admin.admin-layout>
