<x-peserta.peserta-layout :web="$web">

    @if (session()->has('pesan'))
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="alert alert-default-success h4">
                    {{ session()->get('pesan') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-5 mx-auto">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-bold">INFORMASI KONTAK</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('peserta.update.formulir.rekening') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Ayah -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama_rekening">Nama Sesuai Rekening</label>
                                    <input type="text" name="nama_rekening" value="{{ old('nama_rekening') ? old('nama_rekening') : $user->nama_rekening }}" class="form-control" id="nama_rekening" aria-describedby="nama_rekeningKKHelp" placeholder="Nama Sesuai Rekening">
                                    @error('nama_rekening')
                                        <small id="nama_rekeningKKHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="norek">Nomor Rekening</label>
                                    <input type="text" name="norek" value="{{ old('norek') ? old('norek') : $user->norek }}" class="form-control" id="norek" aria-describedby="norekKKHelp" placeholder="Nomor Rekening">
                                    @error('norek')
                                        <small id="norekKKHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="bank_id">Nama Bank</label>
                                    <select name="bank_id" class="form-control select2bs4" id="bank_id" aria-describedby="bank_idHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}" {{ $user->bank_id == $bank->id ? 'selected' : (old('bank_id') == $bank->id ? 'selected' : '') }}>{{ $bank->kode . ' - ' . str($bank->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('bank_id')
                                        <small id="bank_idHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="cabang">Alamat Bank Penerbit</label>
                                    <textarea type="text" name="cabang" class="form-control" id="cabang" aria-describedby="cabangKKHelp" placeholder="Alamat bank atau kantor cabang tempat rekening diterbitkan">{{ old('cabang') ? old('cabang') : $user->cabang }}</textarea>
                                    @error('cabang')
                                        <small id="cabangKKHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="foto_rekening">
                                        <label class="custom-file-label" for="foto_rekening">Upload rekening</label>
                                    </div>
                                </div>
                                @error('file')
                                    <small id="foto_rekeningKKHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            <hr>

                            <button type="submit" class="btn btn-primary btn-block">Klik untuk update informasi rekening</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>

    </div>

</x-peserta.peserta-layout>
