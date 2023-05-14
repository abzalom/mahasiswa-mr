<x-peserta.peserta-layout :web="$web">

    @if ($lengkap)
        <div class="row">
            <div class="alert alert-default-info col-lg-8 mx-auto">
                @if (!$user->kirim)
                    @if ($user->verified->count() == null)
                        <h3>Data anda sudah lengkap, apakah anda ingin mengirimkan formulir anda untuk diverifikasi?</h3>
                        <p class="text-muted font-italic"><span class="text-danger text-bold">Peringatan</span> : jika ada yang ingin di perbaiki silahkan lakukan perbaikan. karena data yang sudah dikirim tidak dapat di ubah lagi tanpa persetujuan tim verifikator!</p>
                        <form action="{{ route('peserta.kirim.formulir') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-success font-weight-bold col-12">Klik disini untuk kirim formulir sekarang</button>
                        </form>
                    @else
                        @if ($user->verified->last()->verify_status_id == 2)
                            <h3>Maaf! formulir anda telah divalidasi tidak lengkap</h3>
                            <p>Berikut Catatan Verifikator{!! $user->verified->last()->keterangan !!}</p>
                            <p class="text-muted font-italic">Segera lakukan perbaikan dan kirim ulang Formulir anda!</p>
                            <form action="{{ route('peserta.kirim.formulir') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-success font-weight-bold col-12">Klik disini untuk kirim formulir sekarang</button>
                            </form>
                        @endif
                    @endif
                @else
                    @if ($user->verified->count())
                        @if ($user->verified->last()->verify_status_id == 1)
                            <h3>Selamat! formulir anda telah divalidasi lengkap</h3>
                        @endif
                    @else
                        <h3>Berkas anda telah dikirim, selanjutnya akan di informasihkan jika sdh diverifikasi.</h3>
                    @endif
                @endif
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img style="width: 128px; height: 128px;" class="profile-user-img img-circle" src="{{ auth()->user()->thumbnail() }}" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $user->nama }}</h3>

                    @if ($user->nim)
                        <p class="text-muted text-center">
                            NIM. {{ $user->nim }}
                        </p>
                    @else
                        <p class="text-danger text-center">
                            NIM. Masih kosong!<i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i>
                        </p>
                    @endif

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b> <a href="mailto:{{ $user->email }}" class="float-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>No. HP</b>
                            @if ($user->phone)
                                <a href="tel:{{ $user->phone }}" class="float-right">{{ $user->phone }}</a>
                            @else
                                <span class="float-right text-danger"><i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Alamat</b>
                            @if ($user->adress)
                                <a class="float-right">{{ str($user->adress)->title() }}</a>
                            @else
                                <span class="float-right text-danger"><i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Kab/Kota</b>
                            @if ($user->kab_kota_id)
                                <a class="float-right">{{ str($user->kabkota->kab_kota . ' ' . $user->kabkota->nama)->title() }}</a>
                            @else
                                <span class="float-right text-danger"><i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Provinsi</b>
                            @if ($user->provinsi_id)
                                <a class="float-right">{{ str($user->provinsi->provinsi)->title() }}</a>
                            @else
                                <span class="float-right text-danger"><i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Kode Pos</b>
                            @if ($user->kode_pos)
                                <a class="float-right">{{ $user->kode_pos }}</a>
                            @else
                                <span class="float-right text-danger"><i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!</span>
                            @endif
                        </li>
                    </ul>
                    @if (!$user->kirim)
                        <a href="{{ route('peserta.create.formulir.kontak') }}" class="btn btn-outline-primary btn-block">Update informasi kontak</a>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- About Me Box -->
            <div class="card card-secondary">
                <div class="card-header text-bold">
                    <h3 class="card-title">INFORMASIH REKENING</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Rekening</b>
                            @if ($user->norek)
                                <span class="float-right">{{ $user->norek }}</span>
                            @else
                                <span class="float-right text-danger"><i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Atas Nama</b>
                            @if ($user->nama_rekening)
                                <span class="float-right">{{ str($user->nama_rekening)->title() }}</span>
                            @else
                                <span class="float-right text-danger"><i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Bank</b>
                            @if ($user->bank_id)
                                <span class="float-right">{{ $user->bank->kode . ' - ' . str($user->bank->nama)->title() }}</span>
                            @else
                                <span class="float-right text-danger"><i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Cabang</b>
                            @if ($user->cabang)
                                <span class="float-right">Kasonaweja</span>
                            @else
                                <span class="float-right text-danger"><i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Foto Rekening</b>
                            @if ($user->foto_rekening)
                                @if (Storage::disk('data')->exists($user->directory . '/rekening/' . $user->foto_rekening))
                                    <a href="{{ asset('data/' . $user->directory . '/rekening/' . $user->foto_rekening) }}" class="float-right" target="_blank"><i class="fas fa-check-circle" style="color: #005eff;"></i> Sudah upload</a>
                                @else
                                    <span class="float-right text-danger text-bold"><i class="fas fa-times-circle" style="color: #ff0000;"></i> Belum upload!</span>
                                @endif
                            @else
                                <span class="float-right text-danger text-bold"><i class="fas fa-times-circle" style="color: #ff0000;"></i> Belum upload!</span>
                            @endif
                        </li>
                    </ul>
                    @if (!$user->kirim)
                        <a href="{{ route('peserta.create.formulir.rekening') }}" class="btn btn-outline-success btn-block"><b>Update informasi rekening</b></a>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <div class="col-lg-9">

            <!-- INFORMASI PESERTA -->
            <div class="card card-primary">
                <div class="card-header text-bold">
                    <h3 class="card-title">INFORMASIH PESERTA</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Nama Langkap</strong>
                            @if ($user->nama)
                                <p class="text-muted">
                                    {{ str($user->nama)->title() }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Tempat Tanggal Lahir</strong>
                            @if ($user->tempat_lahir)
                                <p class="text-muted">
                                    {{ str($user->tempat_lahir)->title() . ', ' . $user->tanggal_lahir->format('d M Y') }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Jenis Kelamin</strong>
                            @if ($user->gender)
                                <p class="text-muted">
                                    {{ $user->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Nomor Induk KTP</strong>
                            @if ($user->nik)
                                <p class="text-muted">{{ $user->nik }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Nomor Induk Mahasiswa</strong>
                            @if ($user->nim)
                                <p class="text-muted">{{ $user->nim }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Jenis Perguruan Tinggi</strong>
                            @if ($user->jenisPt)
                                <p class="text-muted">{{ str($user->jenisPt->nama)->title() }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Perguruan Tinggi</strong>
                            @if ($user->nama_pt)
                                <p class="text-muted">{{ str($user->nama_pt)->title() }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Falkutas</strong>
                            @if ($user->fakultas)
                                <p class="text-muted">{{ str($user->fakultas)->title() }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Program Studi</strong>
                            @if ($user->prody)
                                <p class="text-muted">{{ str($user->prody)->title() }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Semester</strong>
                            @if ($user->semester_id)
                                <p class="text-muted">{{ str($user->semester->nama)->title() }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Jenjang</strong>
                            @if ($user->jenjang_id)
                                <p class="text-muted">{{ str($user->jenjang->nama . ' (' . $user->jenjang->singkat . ')')->title() }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Semester Awal <small>tanggal masuk</small></strong>
                            @if ($user->tanggal_masuk)
                                <p class="text-muted">{{ $user->tanggal_masuk->format('d M Y') }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Jalur Masuk</strong>
                            @if ($user->jalur_masuk_id)
                                <p class="text-muted">{{ str($user->jalur->nama)->title() }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Status Awal</strong>
                            @if ($user->status_awal_mahasiswa_id)
                                <p class="text-muted">{{ str($user->status_awal->nama)->title() }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Status Saat Ini</strong>
                            @if ($user->status_mahasiswa_id)
                                <p class="text-muted">{{ str($user->status->nama)->title() }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                    </div>


                    @if (!$user->kirim)
                        <div class="row">
                            <a href="{{ route('peserta.create.formulir.biodata') }}" class="btn btn-outline-success btn-lg w-100">Klik disini untuk update informasi diri</a>
                        </div>
                    @endif
                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- INFORMASI TAMBAHAN -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title text-bold">INFORMASIH TAMBAHAN</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <!-- INFORMASIH AYAH -->

                    <div class="row">
                        <div class="col-6 mx-auto text-center">
                            <strong>Nomor Kartu Keluarga</strong>
                            @if ($user->nomor_kk)
                                <p class="text-muted">
                                    {{ $user->nomor_kk }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <strong>Nama ayah</strong>
                            @if ($user->nama_ayah)
                                <p class="text-muted">
                                    {{ str($user->nama_ayah)->title() }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Status Ayah <small>dalam keluarga</small></strong>
                            @if ($user->status_ayah)
                                <p class="text-muted">
                                    {{ str($user->statusAyah->nama)->title() }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Pendidikan Ayah</strong>
                            @if ($user->pendidikan_ayah)
                                <p class="text-muted">
                                    {{ str($user->pddkanAyah->nama)->title() }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Pekerjaan ayah</strong>
                            @if ($user->pekerjaan_ayah)
                                <p class="text-muted">{{ str($user->jobAyah->nama)->title() }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Penghasilan Ayah</strong>
                            @if ($user->penghasilan_ayah)
                                <p class="text-muted">
                                    {{ str($user->salAyah->jumlah)->title() }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Keterangan Ayah</strong>
                            @if ($user->keterangan_ayah)
                                <p class="text-muted">{{ str($user->ketAyah->nama)->title() }}</p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                    </div>
                    <hr>


                    <!-- INFORMASIH IBU -->
                    <div class="row">

                        <div class="col-md-4">
                            <strong>Nama Ibu</strong>
                            @if ($user->nama_ibu)
                                <p class="text-muted">
                                    {{ str($user->nama_ibu)->title() }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Status Ibu <small>dalam keluarga</small></strong>
                            @if ($user->status_ibu)
                                <p class="text-muted">
                                    {{ str($user->statusIbu->nama)->title() }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Pendidikan Ibu</strong>
                            @if ($user->pendidikan_ibu)
                                <p class="text-muted">
                                    {{ str($user->pddkanIbu->nama)->title() }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Pekerjaan Ibu</strong>
                            @if ($user->pekerjaan_ibu)
                                <p class="text-muted">
                                    {{ str($user->jobIbu->nama)->title() }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Penghasilan Ibu</strong>
                            @if ($user->penghasilan_ibu)
                                <p class="text-muted">
                                    {{ str($user->salIbu->jumlah)->title() }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <strong>Keterangan Ibu</strong>
                            @if ($user->keterangan_ibu)
                                <p class="text-muted">
                                    {{ str($user->ketIbu->nama)->title() }}
                                </p>
                            @else
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Masih kosong!
                                </p>
                            @endif
                            <hr>
                        </div>
                    </div>


                    @if (!$user->kirim)
                        <div class="row">
                            <a href="{{ route('peserta.create.formulir.tambahan') }}" class="btn btn-outline-success btn-lg w-100">Klik disini untuk update informasi tambahan</a>
                        </div>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>

            <!-- Persyaratan -->
            <div class="card card-info" id="uploadtab">
                <div class="card-header">
                    <h3 class="card-title text-bold">BERKAS PERSYARATAN</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @if (session()->has('pesan'))
                        <div class="col-sm-6 mx-auto">
                            <div class="alert alert-default-primary alert-sm">{{ session()->get('pesan') }}</div>
                        </div>
                    @endif

                    <!-- INFORMASIH AYAH -->
                    <div class="table-responsive">
                        <table class="table table-hover table-sm">
                            <thead class="table-info">
                                {{-- <tr class="align-middle">
                                    <th class="text-center">#</th>
                                    <th>Nama Berkas</th>
                                    <th>Progres</th>
                                    <th></th>
                                </tr> --}}
                            </thead>
                            <tbody>
                                <tr class="align-middle @error('foto_peserta') alert-default-info @enderror">

                                    <td class="text-center">1.</td>
                                    <td>
                                        @if (Storage::disk('data')->exists($user->directory . '/foto_peserta/' . $user->foto_peserta))
                                            <a href="{{ asset('data/' . $user->directory . '/foto_peserta/' . $user->foto_peserta) }}" target="_blank">
                                                Foto Peserta 4 X 6 (foto/gambar | *.jpg *.jpeg *.png)
                                            </a>
                                        @else
                                            Foto Peserta 4 X 6 (foto/gambar | *.jpg *.jpeg *.png)
                                        @endif
                                        @error('foto_peserta')
                                            <p class="text-danger text-bold font-italic m-0 p-0"><i class="fas fa-exclamation-triangle"></i> Error : {{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        @if (Storage::disk('data')->exists($user->directory . '/foto_peserta/' . $user->foto_peserta))
                                            <i class="far fa-check-circle fa-2x" style="color: #005eff;"></i> <span class="text-primary">Sudah upload</span>
                                        @else
                                            <i class="far fa-times-circle fa-2x" style="color: #ff0000;"></i> <span class="text-danger">Belum upload</span>
                                        @endif
                                    </td>
                                    <td style="width: 15%">
                                        @if (!$user->kirim)
                                            <form action="{{ route('peserta.upload.berkas.foto') }}#uploadtab" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="foto_peserta" id="uploadFotoPeserta" onchange="this.form.submit()" hidden>
                                                <button type="button" class="btn btn-outline-primary" onclick="getElementById('uploadFotoPeserta').click()">Upload File</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="align-middle @error('file_ktp') alert-default-info @enderror">

                                    <td class="text-center">1.</td>
                                    <td>
                                        @if (Storage::disk('data')->exists($user->directory . '/file_ktp/' . $user->file_ktp))
                                            <a href="{{ asset('data/' . $user->directory . '/file_ktp/' . $user->file_ktp) }}" target="_blank">
                                                KTP Peserta (foto/pdf)
                                            </a>
                                        @else
                                            KTP Peserta (foto/pdf)
                                        @endif
                                        @error('file_ktp')
                                            <p class="text-danger text-bold font-italic m-0 p-0"><i class="fas fa-exclamation-triangle"></i> Error : {{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        @if (Storage::disk('data')->exists($user->directory . '/file_ktp/' . $user->file_ktp))
                                            <i class="far fa-check-circle fa-2x" style="color: #005eff;"></i> <span class="text-primary">Sudah upload</span>
                                        @else
                                            <i class="far fa-times-circle fa-2x" style="color: #ff0000;"></i> <span class="text-danger">Belum upload</span>
                                        @endif
                                    </td>
                                    <td style="width: 15%">
                                        @if (!$user->kirim)
                                            <form action="{{ route('peserta.upload.berkas.ktp') }}#uploadtab" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file_ktp" id="uploadKtpPeserta" onchange="this.form.submit()" hidden>
                                                <button type="button" class="btn btn-outline-primary" onclick="getElementById('uploadKtpPeserta').click()">Upload File</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="align-middle @error('file_kk') alert-default-info @enderror">
                                    <td class="text-center">2.</td>
                                    <td>
                                        @if (Storage::disk('data')->exists($user->directory . '/file_kk/' . $user->file_kk))
                                            <a href="{{ asset('data/' . $user->directory . '/file_kk/' . $user->file_kk) }}" target="_blank">
                                                Kartu Keluarga (foto/pdf)
                                            </a>
                                        @else
                                            Kartu Keluarga (foto/pdf)
                                        @endif
                                        @error('file_kk')
                                            <p class="text-danger text-bold font-italic m-0 p-0"><i class="fas fa-exclamation-triangle"></i> Error : {{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        @if (Storage::disk('data')->exists($user->directory . '/file_kk/' . $user->file_kk))
                                            <i class="far fa-check-circle fa-2x" style="color: #005eff;"></i> <span class="text-primary">Sudah upload</span>
                                        @else
                                            <i class="far fa-times-circle fa-2x" style="color: #ff0000;"></i> <span class="text-danger">Belum upload</span>
                                        @endif
                                    </td>
                                    <td style="width: 15%">
                                        @if (!$user->kirim)
                                            <form action="{{ route('peserta.upload.berkas.kk') }}#uploadtab" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file_kk" id="fileKKPeserta" onchange="this.form.submit()" hidden>
                                                <button type="button" class="btn btn-outline-primary" onclick="getElementById('fileKKPeserta').click()">Upload File</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="align-middle @error('file_kpm') alert-default-info @enderror">
                                    <td class="text-center">3.</td>
                                    <td>
                                        @if (Storage::disk('data')->exists($user->directory . '/file_kpm/' . $user->file_kpm))
                                            <a href="{{ asset('data/' . $user->directory . '/file_kpm/' . $user->file_kpm) }}" target="_blank">
                                                Kartu Pengenal Mahasiswa (foto/pdf)
                                            </a>
                                        @else
                                            Kartu Pengenal Mahasiswa (foto/pdf)
                                        @endif
                                        @error('file_kpm')
                                            <p class="text-danger text-bold font-italic m-0 p-0"><i class="fas fa-exclamation-triangle"></i> Error : {{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        @if (Storage::disk('data')->exists($user->directory . '/file_kpm/' . $user->file_kpm))
                                            <i class="far fa-check-circle fa-2x" style="color: #005eff;"></i> <span class="text-primary">Sudah upload</span>
                                        @else
                                            <i class="far fa-times-circle fa-2x" style="color: #ff0000;"></i> <span class="text-danger">Belum upload</span>
                                        @endif
                                    </td>
                                    <td style="width: 15%">
                                        @if (!$user->kirim)
                                            <form action="{{ route('peserta.upload.berkas.kpm') }}#uploadtab" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file_kpm" id="fileKpmPeserta" onchange="this.form.submit()" hidden>
                                                <button type="button" class="btn btn-outline-primary" onclick="getElementById('fileKpmPeserta').click()">Upload File</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="align-middle @error('file_khs') alert-default-info @enderror">
                                    <td class="text-center">4.</td>
                                    <td>
                                        @if (Storage::disk('data')->exists($user->directory . '/file_khs/' . $user->file_khs))
                                            <a href="{{ asset('data/' . $user->directory . '/file_khs/' . $user->file_khs) }}" target="_blank">
                                                Kartu Hasil Studi (foto/pdf)
                                            </a>
                                        @else
                                            Kartu Hasil Studi (foto/pdf)
                                        @endif
                                        @error('file_khs')
                                            <p class="text-danger text-bold font-italic m-0 p-0"><i class="fas fa-exclamation-triangle"></i> Error : {{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        @if (Storage::disk('data')->exists($user->directory . '/file_khs/' . $user->file_khs))
                                            <i class="far fa-check-circle fa-2x" style="color: #005eff;"></i> <span class="text-primary">Sudah upload</span>
                                        @else
                                            <i class="far fa-times-circle fa-2x" style="color: #ff0000;"></i> <span class="text-danger">Belum upload</span>
                                        @endif
                                    </td>
                                    <td style="width: 15%">
                                        @if (!$user->kirim)
                                            <form action="{{ route('peserta.upload.berkas.khs') }}#uploadtab" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file_khs" id="fileKhsPeserta" onchange="this.form.submit()" hidden>
                                                <button type="button" class="btn btn-outline-primary" onclick="getElementById('fileKhsPeserta').click()">Upload File</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="align-middle @error('file_krs') alert-default-info @enderror">
                                    <td class="text-center">5.</td>
                                    <td>
                                        @if (Storage::disk('data')->exists($user->directory . '/file_krs/' . $user->file_krs))
                                            <a href="{{ asset('data/' . $user->directory . '/file_krs/' . $user->file_krs) }}" target="_blank">
                                                Kartu Rencana Studi (foto/pdf)
                                            </a>
                                        @else
                                            Kartu Rencana Studi (foto/pdf)
                                        @endif
                                        @error('file_krs')
                                            <p class="text-danger text-bold font-italic m-0 p-0"><i class="fas fa-exclamation-triangle"></i> Error : {{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        @if (Storage::disk('data')->exists($user->directory . '/file_krs/' . $user->file_krs))
                                            <i class="far fa-check-circle fa-2x" style="color: #005eff;"></i> <span class="text-primary">Sudah upload</span>
                                        @else
                                            <i class="far fa-times-circle fa-2x" style="color: #ff0000;"></i> <span class="text-danger">Belum upload</span>
                                        @endif
                                    </td>
                                    <td style="width: 15%">
                                        @if (!$user->kirim)
                                            <form action="{{ route('peserta.upload.berkas.krs') }}#uploadtab" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file_krs" id="fileKrsPeserta" onchange="this.form.submit()" hidden>
                                                <button type="button" class="btn btn-outline-primary" onclick="getElementById('fileKrsPeserta').click()">Upload File</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="align-middle @error('file_surat_aktif') alert-default-info @enderror">
                                    <td class="text-center">6.</td>
                                    <td>
                                        @if (Storage::disk('data')->exists($user->directory . '/file_surat_aktif/' . $user->file_surat_aktif))
                                            <a href="{{ asset('data/' . $user->directory . '/file_surat_aktif/' . $user->file_surat_aktif) }}" target="_blank">
                                                Surat Keterangan Aktif Kuliah Dari Kampus (foto/pdf)
                                            </a>
                                        @else
                                            Surat Keterangan Aktif Kuliah Dari Kampus (foto/pdf)
                                        @endif
                                        @error('file_surat_aktif')
                                            <p class="text-danger text-bold font-italic m-0 p-0"><i class="fas fa-exclamation-triangle"></i> Error : {{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        @if (Storage::disk('data')->exists($user->directory . '/file_surat_aktif/' . $user->file_surat_aktif))
                                            <i class="far fa-check-circle fa-2x" style="color: #005eff;"></i> <span class="text-primary">Sudah upload</span>
                                        @else
                                            <i class="far fa-times-circle fa-2x" style="color: #ff0000;"></i> <span class="text-danger">Belum upload</span>
                                        @endif
                                    </td>
                                    <td style="width: 15%">
                                        @if (!$user->kirim)
                                            <form action="{{ route('peserta.upload.berkas.surat') }}#uploadtab" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file_surat_aktif" id="fileSuratAktifPeserta" onchange="this.form.submit()" hidden>
                                                <button type="button" class="btn btn-outline-primary" onclick="getElementById('fileSuratAktifPeserta').click()">Upload File</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="align-middle @error('foto_kwitansi') alert-default-info @enderror">
                                    <td class="text-center">7.</td>
                                    <td>
                                        @if (Storage::disk('data')->exists($user->directory . '/foto_kwitansi/' . $user->foto_kwitansi))
                                            <a href="{{ asset('data/' . $user->directory . '/foto_kwitansi/' . $user->foto_kwitansi) }}" target="_blank">
                                                Kwitansi Pembayaran SPP Terakhir (foto/pdf)
                                            </a>
                                        @else
                                            Kwitansi Pembayaran SPP Terakhir (foto/pdf)
                                        @endif
                                        @error('foto_kwitansi')
                                            <p class="text-danger text-bold font-italic m-0 p-0"><i class="fas fa-exclamation-triangle"></i> Error : {{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        @if (Storage::disk('data')->exists($user->directory . '/foto_kwitansi/' . $user->foto_kwitansi))
                                            <i class="far fa-check-circle fa-2x" style="color: #005eff;"></i> <span class="text-primary">Sudah upload</span>
                                        @else
                                            <i class="far fa-times-circle fa-2x" style="color: #ff0000;"></i> <span class="text-danger">Belum upload</span>
                                        @endif
                                    </td>
                                    <td style="width: 15%">
                                        @if (!$user->kirim)
                                            <form action="{{ route('peserta.upload.berkas.kwitansi') }}#uploadtab" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="foto_kwitansi" id="fileKwitansiPeserta" onchange="this.form.submit()" hidden>
                                                <button type="button" class="btn btn-outline-primary" onclick="getElementById('fileKwitansiPeserta').click()">Upload File</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="align-middle @error('foto_dikti') alert-default-info @enderror">
                                    <td class="text-center">8.</td>
                                    <td>
                                        @if (Storage::disk('data')->exists($user->directory . '/foto_dikti/' . $user->foto_dikti))
                                            <a href="{{ asset('data/' . $user->directory . '/foto_dikti/' . $user->foto_dikti) }}" target="_blank">
                                                Screenshot Data Mahasiswa Dari Forlap Dikti (foto/pdf)
                                            </a>
                                        @else
                                            Screenshot Data Mahasiswa Dari Forlap Dikti (foto/pdf)
                                        @endif
                                        @error('foto_dikti')
                                            <p class="text-danger text-bold font-italic m-0 p-0"><i class="fas fa-exclamation-triangle"></i> Error : {{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        @if (Storage::disk('data')->exists($user->directory . '/foto_dikti/' . $user->foto_dikti))
                                            <i class="far fa-check-circle fa-2x" style="color: #005eff;"></i> <span class="text-primary">Sudah upload</span>
                                        @else
                                            <i class="far fa-times-circle fa-2x" style="color: #ff0000;"></i> <span class="text-danger">Belum upload</span>
                                        @endif
                                    </td>
                                    <td style="width: 15%">
                                        @if (!$user->kirim)
                                            <form action="{{ route('peserta.upload.berkas.dikti') }}#uploadtab" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="foto_dikti" id="fileDiktiPeserta" onchange="this.form.submit()" hidden>
                                                <button type="button" class="btn btn-outline-primary" onclick="getElementById('fileDiktiPeserta').click()">Upload File</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.card -->

    </div>

    </div>

</x-peserta.peserta-layout>
