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
                <div class="card-header bg-primary">
                    <h5 class="card-title">INFORMASIH PESERTA</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('peserta.update.formulir.biodata') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nama">Nama Langkap</label>
                                    <input type="text" name="nama" value="{{ old('nama') ? old('nama') : $user->nama }}" class="form-control" id="nama" aria-describedby="NamaLengkapHelp" placeholder="Nema Lengkap">
                                    @error('nama')
                                        <small id="NamaLengkapHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') ? old('tempat_lahir') : $user->tempat_lahir }}" class="form-control" id="tempat_lahir" aria-describedby="tempatLahirHelp" placeholder="Tempat Kelahiran">
                                    @error('tempat_lahir')
                                        <small id="tempatLahirHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : ($user->tanggal_lahir ? $user->tanggal_lahir->format('Y-m-d') : '') }}" class="form-control" id="tanggal_lahir" aria-describedby="tanggalLahirHelp">
                                    @error('tanggal_lahir')
                                        <small id="tanggalLahirHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" class="form-control select2bs4" id="gender" aria-describedby="genderHelp">
                                        <option value="">Pilih...</option>
                                        <option value="1" {{ $user->gender == 1 ? 'selected' : (old('gender') == 1 ? 'selected' : '') }}>Laki-Laki</option>
                                        <option value="2" {{ $user->gender == 2 ? 'selected' : (old('gender') == 2 ? 'selected' : '') }}>Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <small id="genderHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nik">Nomor Induk KTP</label>
                                    <input type="text" name="nik" value="{{ old('nik') ? old('nik') : $user->nik }}" class="form-control" id="nik" aria-describedby="nikHelp" placeholder="Nomor KTP">
                                    @error('nik')
                                        <small id="nikHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nim">Nomor Induk Mahasiswa</label>
                                    <input type="text" name="nim" value="{{ old('nim') ? old('nim') : $user->nim }}" class="form-control" id="nim" aria-describedby="nimHelp" placeholder="Nomor Induk Mahasiswa (NIM)">
                                    @error('nim')
                                        <small id="nimHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nama_pt">Nama Perguruan</label>
                                    <input type="text" name="nama_pt" value="{{ old('nama_pt') ? old('nama_pt') : $user->nama_pt }}" class="form-control" id="nama_pt" aria-describedby="nama_ptHelp" placeholder="Nama Perguruan Tinggi">
                                    @error('nama_pt')
                                        <small id="nama_ptHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jenis_pt_id">Jenis Perguruan</label>
                                    <select name="jenis_pt_id" value="{{ old('jenis_pt_id') ? old('jenis_pt_id') : $user->jenis_pt_id }}" class="form-control select2bs4" id="jenis_pt_id" aria-describedby="jenis_pt_idHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($jenispts as $jenispt)
                                            <option value="{{ $jenispt->id }}" {{ $user->jenis_pt_id == $jenispt->id ? 'selected' : (old('jenis_pt_id') == $jenispt->id ? 'selected' : '') }}>{{ str($jenispt->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis_pt_id')
                                        <small id="jenis_pt_idHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fakultas">Nama Fakultas</label>
                                    <input type="text" name="fakultas" value="{{ old('fakultas') ? old('fakultas') : $user->fakultas }}" class="form-control" id="fakultas" aria-describedby="fakultasHelp" placeholder="Nama Fakultas / Kampus">
                                    @error('fakultas')
                                        <small id="fakultasHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="prody">Nama Program Studi</label>
                                    <input type="text" name="prody" value="{{ old('prody') ? old('prody') : $user->prody }}" class="form-control" id="prody" aria-describedby="prodyHelp" placeholder="Nama Program Studi">
                                    @error('prody')
                                        <small id="prodyHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jenjang_id">Janjang</label>
                                    <select name="jenjang_id" value="{{ old('jenjang_id') ? old('jenjang_id') : $user->jenjang_id }}" class="form-control select2bs4" id="jenjang_id" aria-describedby="jenjang_idHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($janjang as $jjng)
                                            <option value="{{ $jjng->id }}" {{ $user->jenjang_id == $jjng->id ? 'selected' : (old('jenjang_id') == $jjng->id ? 'selected' : '') }}>{{ str($jjng->nama)->title() . ' (' . str($jjng->singkat)->title() . ')' }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenjang_id')
                                        <small id="jenjang_idHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="semester_id">Semester</label>
                                    <select name="semester_id" value="{{ old('semester_id') ? old('semester_id') : $user->semester_id }}" class="form-control select2bs4" id="semester_id" aria-describedby="semester_idHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($semesters as $semester)
                                            <option value="{{ $semester->id }}" {{ $user->semester_id == $semester->id ? 'selected' : (old('semester_id') == $semester->id ? 'selected' : '') }}>{{ str($semester->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('semester_id')
                                        <small id="semester_idHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tanggal_masuk">Mulai Kuliah Sejak Kapan?</label>
                                    <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk') ? old('tanggal_masuk') : ($user->tanggal_masuk ? $user->tanggal_masuk->format('Y-m-d') : '') }}" class="form-control" id="tanggal_masuk" aria-describedby="tanggal_masukHelp">
                                    @error('tanggal_masuk')
                                        <small id="tanggal_masukHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jalur_masuk_id">Jalur Masuk</label>
                                    <select name="jalur_masuk_id" value="{{ old('jalur_masuk_id') ? old('jalur_masuk_id') : $user->jalur_masuk_id }}" class="form-control select2bs4" id="jalur_masuk_id" aria-describedby="jalur_masuk_idHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($jalurs as $jalur)
                                            <option value="{{ $jalur->id }}" {{ $user->jalur_masuk_id == $jalur->id ? 'selected' : (old('jalur_masuk_id') == $jalur->id ? 'selected' : '') }}>{{ str($jalur->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('jalur_masuk_id')
                                        <small id="jalur_masuk_idHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status_awal_mahasiswa_id">Status Awal</label>
                                    <select name="status_awal_mahasiswa_id" value="{{ old('status_awal_mahasiswa_id') ? old('status_awal_mahasiswa_id') : $user->status_awal_mahasiswa_id }}" class="form-control select2bs4" id="status_awal_mahasiswa_id" aria-describedby="status_awal_mahasiswa_idHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($sttsAwals as $stsAwal)
                                            <option value="{{ $stsAwal->id }}" {{ $user->status_awal_mahasiswa_id == $stsAwal->id ? 'selected' : (old('status_awal_mahasiswa_id') == $stsAwal->id ? 'selected' : '') }}>{{ str($stsAwal->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('status_awal_mahasiswa_id')
                                        <small id="status_awal_mahasiswa_idHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status_mahasiswa_id">Status Sekarang</label>
                                    <select name="status_mahasiswa_id" value="{{ old('status_mahasiswa_id') ? old('status_mahasiswa_id') : $user->status_mahasiswa_id }}" class="form-control select2bs4" id="status_mahasiswa_id" aria-describedby="status_mahasiswa_idHelp">
                                        <option value="">Pilih...</option>
                                        @foreach ($sttsSekarangs as $sttsMhs)
                                            <option value="{{ $sttsMhs->id }}" {{ $user->status_mahasiswa_id == $sttsMhs->id ? 'selected' : (old('status_mahasiswa_id') == $sttsMhs->id ? 'selected' : '') }}>{{ str($sttsMhs->nama)->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('status_mahasiswa_id')
                                        <small id="status_mahasiswa_idHelp" class="form-text text-danger text-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Klik Disini Untuk Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>

    </div>

</x-peserta.peserta-layout>
