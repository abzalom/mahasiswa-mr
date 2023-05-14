<x-verifikator.verifikator-layout :web="$web">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Verifikasi Data Peserta Atas Nama {{ $peserta->nama }}</h3>
                    <div class="text-right">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Verifikasi
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if ($peserta->verified->count())
                        <div class="col-12 mb-4">
                            @if ($peserta->verified->last()->verify_status_id == 1)
                                <h2 class="text-info">
                                    Terverifikasi Lengkap <i class="fas fa-user-check" style="color: #4d52ff;"></i>
                                </h2>
                            @endif
                            @if ($peserta->verified->last()->verify_status_id == 2)
                                <h2 class="text-danger">
                                    Terverifikasi Tidak Lengkap <i class="fas fa-user-times" style="color: #ff2424;"></i>
                                </h2>
                            @endif
                        </div>
                    @else
                        <div class="col-12 mb-4">
                            <h2 class="text-danger">
                                Berlum diverifikasi <i class="fas fa-user-times" style="color: #ff2424;"></i>
                            </h2>
                        </div>
                    @endif
                    <h3 class="col-12 text-blue" style="border-bottom-style: solid; border-width: 1,2px; border-color: #677f67 !important">
                        INFORMASI PESERTA
                    </h3>
                    <h5 class="text-muted text-center border-1 border-bottom border-top col-12 mx-auto bg-info text-black-50">
                        BIODATA PESERTA
                    </h5>
                    <div class="row">
                        <div class="col-md-2">
                            @if (Storage::disk('data')->exists($peserta->directory . '/foto_peserta/' . $peserta->foto_peserta))
                                <a href="{{ asset('data/' . $peserta->directory . '/foto_peserta/' . $peserta->foto_peserta) }}" target="_blank">
                                    <img src="{{ asset('data/' . $peserta->directory . '/foto_peserta/' . $peserta->foto_peserta) }}" alt="{{ $peserta->foto_peserta }}" class="img-thumbnail">
                                </a>
                            @else
                                <img src="{{ asset('assets/img/no-pictures.png') }}" alt="{{ $peserta->foto_peserta }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="col-sm">Nama Lengkap</label>
                                    <div class="col-sm mt-0">
                                        <div class="border-0">{{ str($peserta->nama)->title() }}</div>
                                    </div>
                                    <hr class="mt-0">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-sm">Tempat / Tanggal Lahir</label>
                                    <div class="col-sm mt-0">
                                        @if ($peserta->tanggal_lahir)
                                            <div class="border-0">
                                                {{ str($peserta->tempat_lahir)->title() . ', ' . $peserta->tanggal_lahir->format('d M Y') }}
                                            </div>
                                        @else
                                            <div class="border-0 text-danger text-bold">
                                                <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                            </div>
                                        @endif
                                    </div>
                                    <hr class="mt-0">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-sm">Jenis Kelamin</label>
                                    @if ($peserta->gender)
                                        <div class="border-0">
                                            {{ $peserta->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}
                                        </div>
                                    @else
                                        <div class="border-0 text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                        </div>
                                    @endif
                                    <hr class="mt-0">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-sm">NIK</label>
                                    @if ($peserta->nik)
                                        <div class="border-0">
                                            {{ $peserta->nik }}
                                        </div>
                                    @else
                                        <div class="border-0 text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                        </div>
                                    @endif
                                    <hr class="mt-0">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-sm">Nomor Telepon</label>
                                    @if ($peserta->phone)
                                        <div class="border-0">
                                            {{ $peserta->phone }}
                                        </div>
                                    @else
                                        <div class="border-0 text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                        </div>
                                    @endif
                                    <hr class="mt-0">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-sm">Email</label>
                                    @if ($peserta->email)
                                        <div class="border-0">
                                            {{ $peserta->email }}
                                        </div>
                                    @else
                                        <div class="border-0 text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                        </div>
                                    @endif
                                    <hr class="mt-0">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-sm">Kab / Kota</label>
                                    @if ($peserta->kabkota)
                                        <div class="border-0">
                                            {{ str($peserta->kabkota->kab_kota . ' ' . $peserta->kabkota->nama)->title() }}
                                        </div>
                                    @else
                                        <div class="border-0 text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                        </div>
                                    @endif
                                    <hr class="mt-0">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-sm">Provinsi</label>
                                    @if ($peserta->provinsi)
                                        <div class="border-0">
                                            {{ str($peserta->provinsi->provinsi)->title() }}
                                        </div>
                                    @else
                                        <div class="border-0 text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                        </div>
                                    @endif
                                    <hr class="mt-0">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-sm">Kode Pos</label>
                                    @if ($peserta->kode_pos)
                                        <div class="border-0">
                                            {{ str($peserta->kode_pos)->title() }}
                                        </div>
                                    @else
                                        <div class="border-0 text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                        </div>
                                    @endif
                                    <hr class="mt-0">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm">Alamat Lengkap</label>
                                    @if ($peserta->adress)
                                        <div class="border-0">
                                            {{ $peserta->adress }}
                                        </div>
                                    @else
                                        <div class="border-0 text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                        </div>
                                    @endif
                                    <hr class="mt-0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-muted text-center border-1 border-bottom border-top col-12 mx-auto bg-info text-black-50">
                        PENDIDIKAN PESERTA
                    </h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="col-sm">NIM</label>
                            @if ($peserta->nim)
                                <div class="border-0">
                                    {{ $peserta->nim }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Perguruan Tinggi</label>
                            @if ($peserta->nama_pt)
                                <div class="border-0">
                                    {{ str($peserta->nama_pt)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Jenis Perguruan Tinggi</label>
                            @if ($peserta->jenispt)
                                <div class="border-0">
                                    {{ str($peserta->jenispt->nama)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Fakultas</label>
                            @if ($peserta->fakultas)
                                <div class="border-0">
                                    {{ str($peserta->fakultas)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Program Studi</label>
                            @if ($peserta->prody)
                                <div class="border-0">
                                    {{ str($peserta->prody)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Semester</label>
                            @if ($peserta->semester)
                                <div class="border-0">
                                    {{ str($peserta->semester->nama)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Jenjang</label>
                            @if ($peserta->jenjang)
                                <div class="border-0">
                                    {{ str($peserta->jenjang->nama)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Tanggal Awal Masuk</label>
                            @if ($peserta->tanggal_masuk)
                                <div class="border-0">
                                    {{ $peserta->tanggal_masuk->format('d M Y') }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Status Awal Mahasiswa</label>
                            @if ($peserta->status_awal)
                                <div class="border-0">
                                    {{ str($peserta->status_awal->nama)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Status Mahasiswa Saat ini</label>
                            @if ($peserta->status)
                                <div class="border-0">
                                    {{ str($peserta->status->nama)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                    </div>
                    <h3 class="col-12 mt-4 text-blue" style="border-bottom-style: solid; border-width: 1,2px; border-color: #677f67 !important">
                        INFORMASI TAMBAHAN
                    </h3>
                    <div class="row">
                        <div class="col-md-3 mx-auto">
                            <label class="col-sm">Nomor Kartu Keluarga</label>
                            @if ($peserta->nomor_kk)
                                <div class="border-0">
                                    {{ str($peserta->nomor_kk)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                    </div>
                    <h5 class="text-muted text-center border-1 border-bottom border-top col-12 mx-auto bg-info text-black-50">
                        AYAH
                    </h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="col-sm">Nama Ayah</label>
                            @if ($peserta->nama_ayah)
                                <div class="border-0">
                                    {{ str($peserta->nama_ayah)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Status Ayah</label>
                            @if ($peserta->statusAyah)
                                <div class="border-0">
                                    {{ str($peserta->statusAyah->nama)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Pendidikan Ayah</label>
                            @if ($peserta->pddkanAyah)
                                <div class="border-0">
                                    {{ str($peserta->pddkanAyah->nama)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Pekerjaan Ayah</label>
                            @if ($peserta->jobAyah)
                                <div class="border-0">
                                    {{ str($peserta->jobAyah->nama)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Penghasilan Ayah</label>
                            @if ($peserta->salAyah)
                                <div class="border-0">
                                    {{ str($peserta->salAyah->jumlah)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Keterangan Ayah</label>
                            @if ($peserta->ketAyah)
                                <div class="border-0">
                                    {{ str($peserta->ketAyah->nama)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                    </div>
                    <h5 class="text-muted text-center border-1 border-bottom border-top col-12 mx-auto bg-info text-black-50">
                        IBU
                    </h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="col-sm">Nama Ibu</label>
                            @if ($peserta->nama_ibu)
                                <div class="border-0">
                                    {{ str($peserta->nama_ibu)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Status Ibu</label>
                            @if ($peserta->statusIbu)
                                <div class="border-0">
                                    {{ str($peserta->statusIbu->nama)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Pendidikan Ibu</label>
                            @if ($peserta->pddkanIbu)
                                <div class="border-0">
                                    {{ str($peserta->pddkanIbu->nama)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Pekerjaan Ibu</label>
                            @if ($peserta->jobIbu)
                                <div class="border-0">
                                    {{ str($peserta->jobIbu->nama)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Penghasilan Ibu</label>
                            @if ($peserta->salIbu)
                                <div class="border-0">
                                    {{ str($peserta->salIbu->jumlah)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm">Keterangan Ibu</label>
                            @if ($peserta->ketIbu)
                                <div class="border-0">
                                    {{ str($peserta->ketIbu->nama)->title() }}
                                </div>
                            @else
                                <div class="border-0 text-danger text-bold">
                                    <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum input
                                </div>
                            @endif
                            <hr class="mt-0">
                        </div>
                    </div>
                    <h3 class="col-12 mt-4 text-blue" style="border-bottom-style: solid; border-width: 1,2px; border-color: #677f67 !important">
                        PERSYARATAN PESERTA
                    </h3>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="col-sm">Foto Peserta</label>
                            <div class="col-sm mt-0">
                                <div class="border-0">
                                    @if (Storage::disk('data')->exists($peserta->directory . '/foto_peserta/' . $peserta->foto_peserta))
                                        <a href="{{ asset('data/' . $peserta->directory . '/foto_peserta/' . $peserta->foto_peserta) }}" target="_blank">

                                            <h5><i class="far fa-check-circle" style="color: #005eff;"></i> Lihat File</h5>
                                        </a>
                                    @else
                                        <div class="text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum Upload
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-4">
                            <label class="col-sm">KTP</label>
                            <div class="col-sm mt-0">
                                <div class="border-0">
                                    @if (Storage::disk('data')->exists($peserta->directory . '/file_ktp/' . $peserta->file_ktp))
                                        <a href="{{ asset('data/' . $peserta->directory . '/file_ktp/' . $peserta->file_ktp) }}" target="_blank">
                                            <h5><i class="far fa-check-circle" style="color: #005eff;"></i> Lihat File</h5>
                                        </a>
                                    @else
                                        <div class="text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum Upload
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-4">
                            <label class="col-sm">Kartu Pengenal Mahasiswa</label>
                            <div class="col-sm mt-0">
                                <div class="border-0">
                                    @if (Storage::disk('data')->exists($peserta->directory . '/file_kpm/' . $peserta->file_kpm))
                                        <a href="{{ asset('data/' . $peserta->directory . '/file_kpm/' . $peserta->file_kpm) }}" target="_blank">
                                            <h5><i class="far fa-check-circle" style="color: #005eff;"></i> Lihat File</h5>
                                        </a>
                                    @else
                                        <div class="text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum Upload
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-4">
                            <label class="col-sm">Kartu Hasil Studi</label>
                            <div class="col-sm mt-0">
                                <div class="border-0">
                                    @if (Storage::disk('data')->exists($peserta->directory . '/file_khs/' . $peserta->file_khs))
                                        <a href="{{ asset('data/' . $peserta->directory . '/file_khs/' . $peserta->file_khs) }}" target="_blank">
                                            <h5><i class="far fa-check-circle" style="color: #005eff;"></i> Lihat File</h5>
                                        </a>
                                    @else
                                        <div class="text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum Upload
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-4">
                            <label class="col-sm">Kartu Rencana Studi</label>
                            <div class="col-sm mt-0">
                                <div class="border-0">
                                    @if (Storage::disk('data')->exists($peserta->directory . '/file_krs/' . $peserta->file_krs))
                                        <a href="{{ asset('data/' . $peserta->directory . '/file_krs/' . $peserta->file_krs) }}" target="_blank">
                                            <h5><i class="far fa-check-circle" style="color: #005eff;"></i> Lihat File</h5>
                                        </a>
                                    @else
                                        <div class="text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum Upload
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-4">
                            <label class="col-sm">Surat Keterangan Aktif Kuliah</label>
                            <div class="col-sm mt-0">
                                <div class="border-0">
                                    @if (Storage::disk('data')->exists($peserta->directory . '/file_surat_aktif/' . $peserta->file_surat_aktif))
                                        <a href="{{ asset('data/' . $peserta->directory . '/file_surat_aktif/' . $peserta->file_surat_aktif) }}" target="_blank">
                                            <h5><i class="far fa-check-circle" style="color: #005eff;"></i> Lihat File</h5>
                                        </a>
                                    @else
                                        <div class="text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum Upload
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-4">
                            <label class="col-sm">Kwitansi SPP Terakhir</label>
                            <div class="col-sm mt-0">
                                <div class="border-0">
                                    @if (Storage::disk('data')->exists($peserta->directory . '/foto_kwitansi/' . $peserta->foto_kwitansi))
                                        <a href="{{ asset('data/' . $peserta->directory . '/foto_kwitansi/' . $peserta->foto_kwitansi) }}" target="_blank">
                                            <h5><i class="far fa-check-circle" style="color: #005eff;"></i> Lihat File</h5>
                                        </a>
                                    @else
                                        <div class="text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum Upload
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-4">
                            <label class="col-sm">Screenshot Bukti Forlap Dikti</label>
                            <div class="col-sm mt-0">
                                <div class="border-0">
                                    @if (Storage::disk('data')->exists($peserta->directory . '/foto_dikti/' . $peserta->foto_dikti))
                                        <a href="{{ asset('data/' . $peserta->directory . '/foto_dikti/' . $peserta->foto_dikti) }}" target="_blank">
                                            <h5><i class="far fa-check-circle" style="color: #005eff;"></i> Lihat File</h5>
                                        </a>
                                    @else
                                        <div class="text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum Upload
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-0">
                        </div>
                        <div class="col-md-4">
                            <label class="col-sm">Kartu Keluarga</label>
                            <div class="col-sm mt-0">
                                <div class="border-0">
                                    @if (Storage::disk('data')->exists($peserta->directory . '/file_kk/' . $peserta->file_kk))
                                        <a href="{{ asset('data/' . $peserta->directory . '/file_kk/' . $peserta->file_kk) }}" target="_blank">
                                            <h5><i class="far fa-check-circle" style="color: #005eff;"></i> Lihat File</h5>
                                        </a>
                                    @else
                                        <div class="text-danger text-bold">
                                            <i class="fas fa-exclamation-triangle" style="color: #ff0000;"></i> Belum Upload
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-0">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('verifikator.manajament.modal.modal-perbaikan-peserta')

</x-verifikator.verifikator-layout>
