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
                    <h3 class="card-title">Data Bank</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped datatable">
                        <thead class="table-dark">
                            <tr>
                                <th>Kode Bankk</th>
                                <th>Nama Bank</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banks as $bank)
                                <tr>
                                    <td>{{ $bank->id }}</td>
                                    <td>{{ str($bank->nama)->title() }}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <form method="get">
                                                <input type="hidden" name="id" value="{{ $bank->id }}">
                                                <button type="submit" class="btn btn-secondary"><i class="fas fa-edit"></i></button>
                                            </form>
                                            @if (!$bank->peserta->count())
                                                <form action="{{ route('admin.destroy.banks') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $bank->id }}">
                                                    <button type="submit" onclick="return confirm('apakah anda yakin ingin hapus data ini?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <!-- Default box -->
            <div class="card">
                <div class="card-header bg-gradient-secondary">
                    <h3 class="card-title">Olah Data Bank</h3>
                </div>
                <div class="card-body">
                    <form {{ $getOneBank ? 'action=' . route('admin.update.banks') . '' : '' }} method="post">
                        <div class="mb-4">
                            @csrf
                            <div class="form-group">
                                <label for="namaBank">Nama Bank</label>
                                @if ($getOneBank)
                                    <input type="hidden" name="id" value="{{ $getOneBank->id }}">
                                    <input type="text" name="nama" value="{{ old('nama') ? old('nama') : $getOneBank->nama }}" class="form-control @error('nama') is-invalid @enderror" id="namaBank" aria-describedby="namaBankHelp" placeholder="Nama Bank">
                                @else
                                    <input type="text" name="nama" value="{{ old('nama') ? old('nama') : '' }}" class="form-control @error('nama') is-invalid @enderror" id="namaBank" aria-describedby="namaBankHelp" placeholder="Nama Bank">
                                @endif
                                @error('nama')
                                    <small id="namaBankHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kodeBank">Kode Bank</label>
                                @if ($getOneBank)
                                    <input type="number" name="kode" value="{{ old('kode') ? old('kode') : $getOneBank->kode }}" class="form-control @error('kode') is-invalid @enderror" id="kodeBank" aria-describedby="kodeBankHelp" placeholder="Kode Bank">
                                @else
                                    <input type="number" name="kode" value="{{ old('kode') ? old('kode') : '' }}" class="form-control @error('kode') is-invalid @enderror" id="kodeBank" aria-describedby="kodeBankHelp" placeholder="Kode Bank">
                                @endif
                                @error('kode')
                                    <small id="kodeBankHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row">
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


    {{-- @include('admin.config.modal.modal-config-roles') --}}

</x-admin.admin-layout>
