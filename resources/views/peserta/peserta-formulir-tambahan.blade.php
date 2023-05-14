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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-bold">INFORMASIH TAMBAHAN</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('peserta.update.formulir.tambahan') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label for="nomor_kk">Nomor Kartu Keluarga</label>
                                    <input type="text" name="nomor_kk" value="{{ old('nomor_kk') ? old('nomor_kk') : $user->nomor_kk }}" class="form-control" id="nomor_kk" aria-describedby="nomorKKHelp" placeholder="Nomor Kartu Keluarga">
                                    @error('nomor_kk')
                                        <small id="nomorKKHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Ayah -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" name="nama_ayah" value="{{ old('nama_ayah') ? old('nama_ayah') : $user->nama_ayah }}" class="form-control" id="nama" aria-describedby="namaAyahHelp" placeholder="Nema Ayah">
                                    @error('nama_ayah')
                                        <small id="namaAyahHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status_ayah">Status Ayah</label>
                                    <select name="status_ayah" class="form-control select2bs4" id="status_ayah" aria-describedby="status_ayahHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($status as $sttsAyah)
                                            <option value="{{ $sttsAyah->id }}" {{ $user->status_ayah == $sttsAyah->id ? 'selected' : (old('status_ayah') == $sttsAyah->id ? 'selected' : '') }}>{{ str($sttsAyah->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('status_ayah')
                                        <small id="status_ayahHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="pendidikan_ayah">Pendidikan Ayah</label>
                                    <select name="pendidikan_ayah" class="form-control select2bs4" id="pendidikan_ayah" aria-describedby="pendidikan_ayahHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($pendidikan as $pddkAyah)
                                            <option value="{{ $pddkAyah->id }}"{{ $user->pendidikan_ayah == $pddkAyah->id ? 'selected' : (old('pendidikan_ayah') == $pddkAyah->id ? 'selected' : '') }}>{{ str($pddkAyah->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('pendidikan_ayah')
                                        <small id="pendidikan_ayahHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                    <select name="pekerjaan_ayah" class="form-control select2bs4" id="pekerjaan_ayah" aria-describedby="pekerjaan_ayahHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($pekerjaan as $jobAyah)
                                            <option value="{{ $jobAyah->id }}"{{ $user->pekerjaan_ayah == $jobAyah->id ? 'selected' : (old('pekerjaan_ayah') == $jobAyah->id ? 'selected' : '') }}>{{ str($jobAyah->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('pekerjaan_ayah')
                                        <small id="pekerjaan_ayahHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="penghasilan_ayah">Penghasilan Ayah</label>
                                    <select name="penghasilan_ayah" class="form-control select2bs4" id="penghasilan_ayah" aria-describedby="penghasilan_ayahHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($penghasilan as $salaryAyah)
                                            <option value="{{ $salaryAyah->id }}"{{ $user->penghasilan_ayah == $salaryAyah->id ? 'selected' : (old('penghasilan_ayah') == $salaryAyah->id ? 'selected' : '') }}>{{ str($salaryAyah->jumlah)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('penghasilan_ayah')
                                        <small id="penghasilan_ayahHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="keterangan_ayah">Keterangan Ayah</label>
                                    <select name="keterangan_ayah" class="form-control select2bs4" id="keterangan_ayah" aria-describedby="keterangan_ayahHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($ketortu as $ketAyah)
                                            <option value="{{ $ketAyah->id }}"{{ $user->keterangan_ayah == $ketAyah->id ? 'selected' : (old('keterangan_ayah') == $ketAyah->id ? 'selected' : '') }}>{{ str($ketAyah->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('keterangan_ayah')
                                        <small id="keterangan_ayahHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- IBU -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nama_ibu">Nama Ibu</label>
                                    <input type="text" name="nama_ibu" value="{{ old('nama_ibu') ? old('nama_ibu') : $user->nama_ibu }}" class="form-control" id="nama" aria-describedby="namaibuHelp" placeholder="Nema ibu">
                                    @error('nama_ibu')
                                        <small id="namaibuHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status_ibu">Status Ibu</label>
                                    <select name="status_ibu" class="form-control select2bs4" id="status_ibu" aria-describedby="status_ibuHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($status as $sttsibu)
                                            <option value="{{ $sttsibu->id }}"{{ $user->status_ibu == $sttsibu->id ? 'selected' : (old('status_ibu') == $sttsibu->id ? 'selected' : '') }}>{{ str($sttsibu->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('status_ibu')
                                        <small id="status_ibuHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="pendidikan_ibu">Pendidikan Ibu</label>
                                    <select name="pendidikan_ibu" class="form-control select2bs4" id="pendidikan_ibu" aria-describedby="pendidikan_ibuHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($pendidikan as $pddkibu)
                                            <option value="{{ $pddkibu->id }}"{{ $user->pendidikan_ibu == $pddkibu->id ? 'selected' : (old('pendidikan_ibu') == $pddkibu->id ? 'selected' : '') }}>{{ str($pddkibu->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('pendidikan_ibu')
                                        <small id="pendidikan_ibuHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                    <select name="pekerjaan_ibu" class="form-control select2bs4" id="pekerjaan_ibu" aria-describedby="pekerjaan_ibuHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($pekerjaan as $jobibu)
                                            <option value="{{ $jobibu->id }}"{{ $user->pekerjaan_ibu == $jobibu->id ? 'selected' : (old('pekerjaan_ibu') == $jobibu->id ? 'selected' : '') }}>{{ str($jobibu->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('pekerjaan_ibu')
                                        <small id="pekerjaan_ibuHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="penghasilan_ibu">Penghasilan Ibu</label>
                                    <select name="penghasilan_ibu" class="form-control select2bs4" id="penghasilan_ibu" aria-describedby="penghasilan_ibuHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($penghasilan as $salaryibu)
                                            <option value="{{ $salaryibu->id }}"{{ $user->penghasilan_ibu == $salaryibu->id ? 'selected' : (old('penghasilan_ibu') == $salaryibu->id ? 'selected' : '') }}>{{ str($salaryibu->jumlah)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('penghasilan_ibu')
                                        <small id="penghasilan_ibuHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="keterangan_ibu">Keterangan Ibu</label>
                                    <select name="keterangan_ibu" class="form-control select2bs4" id="keterangan_ibu" aria-describedby="keterangan_ibuHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($ketortu as $ketibu)
                                            <option value="{{ $ketibu->id }}"{{ $user->keterangan_ibu == $ketibu->id ? 'selected' : (old('keterangan_ibu') == $ketibu->id ? 'selected' : '') }}>{{ str($ketibu->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('keterangan_ibu')
                                        <small id="keterangan_ayahHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>

    </div>

</x-peserta.peserta-layout>
