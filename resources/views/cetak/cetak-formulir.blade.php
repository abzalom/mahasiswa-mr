<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $peserta->nim }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style type="text/css" media="print">
        /* @page {
            size: portrait;
        } */

        .foto-peserta {
            position: relative;
            overflow: hidden;
        }

        .foto-peserta img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <h4>Peserta Pemohon Bantuan Beasiswa Pemerintah Kabupaten Mamberamo Raya</h4>
        <p>Yang sebagaimana termuat dibawah ini :</p>
    </div>

    <div class="mt-3">
        <div class="card">
            <div class="card-header text-center">
                <h5>BIODATA</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ $peserta->photo() }}" class="img-thumbnail" alt="{{ $peserta->username }}">
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <strong class="card-title">Nama Lengkap</strong>
                                <p class="card-text border-1 border-bottom">{{ str($peserta->nama)->title() }}</p>
                            </div>
                            <div class="col-md-4 mb-4">
                                <strong class="card-title">Tempat Tanggal Lahir</strong>
                                <p class="card-text border-1 border-bottom">{{ str($peserta->tempat_lahir)->title() . ', ' . $peserta->tanggal_lahir->format('d M Y') }}</p>
                            </div>
                            <div class="col-md-4 mb-4">
                                <strong class="card-title">Jenis Kelamin</strong>
                                <p class="card-text border-1 border-bottom">{{ $peserta->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</p>
                            </div>
                            <div class="col-md-4 mb-4">
                                <strong class="card-title">Nomor KTP</strong>
                                <p class="card-text border-1 border-bottom">{{ $peserta->nik }}</p>
                            </div>
                            <div class="col-md-4 mb-4">
                                <strong class="card-title">Telepon</strong>
                                <p class="card-text border-1 border-bottom">{{ $peserta->phone }}</p>
                            </div>
                            <div class="col-md-4 mb-4">
                                <strong class="card-title">Email</strong>
                                <p class="card-text border-1 border-bottom">{{ $peserta->email }}</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <strong class="card-title">Alamat</strong>
                                <p class="card-text border-1 border-bottom">{{ $peserta->adress . ' - ' . str($peserta->kabkota->kab_kota . ' ' . $peserta->kabkota->nama)->title() . ', ' . str($peserta->provinsi->provinsi)->title() }}</p>
                            </div>
                            <div class="col-md-4 mb-4">
                                <strong class="card-title">Kode Pos</strong>
                                <p class="card-text border-1 border-bottom">{{ $peserta->kode_pos }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <div class="card">
            <div class="card-header text-center">
                <h4>PENDIDIKAN</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Nomor Mahasiswa</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->nim }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Nama Perguruan</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->nama_pt }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Jenis Perguruan</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->jenispt->nama }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Fakultas</strong>
                        <p class="card-text border-1 border-bottom">{{ str($peserta->fakultas)->title() }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Program Studi</strong>
                        <p class="card-text border-1 border-bottom">{{ str($peserta->prody)->title() }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Jenjang</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->jenjang->nama . ' (' . $peserta->jenjang->singkat . ')' }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Semester Awal Masuk</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->tanggal_masuk->format('d M Y') }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Status Awal</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->status_awal->nama }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <strong class="card-title">Semester Saat Ini</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->semester->nama }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong class="card-title">Status Saat Ini</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->status->nama }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <div class="card">
            <div class="card-header text-center">
                <h4>INFORMASI TAMBAHAN</h4>
            </div>
            <div class="card-body">
                <div class="col-md-4 mb-4 mx-auto">
                    <strong class="card-title">Nomor Kartu Keluarga</strong>
                    <p class="card-text border-1 border-bottom">{{ $peserta->nik }}</p>
                </div>
                <h4 class="border-bottom border-top border-1 text-primary text-center">DATA AYAH</h4>
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Nama Ayah</strong>
                        <p class="card-text border-1 border-bottom">{{ str($peserta->nama_ayah)->title() }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Status Ayah</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->statusAyah->nama }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Pendidikan Ayah</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->pddkanAyah->nama }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Pekerjaan Ayah</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->jobAyah->nama }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Penghasilan Ayah / Bulan</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->salAyah->jumlah }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Keterangan Ayah</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->ketAyah->nama }}</p>
                    </div>
                </div>
                <h4 class="border-bottom border-top border-1 text-primary text-center">DATA IBU</h4>
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Nama Ibu</strong>
                        <p class="card-text border-1 border-bottom">{{ str($peserta->nama_ibu)->title() }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Status Ibu</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->statusIbu->nama }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Pendidikan Ibu</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->pddkanIbu->nama }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Pekerjaan Ibu</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->jobIbu->nama }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Penghasilan Ibu / Bulan</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->salIbu->jumlah }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Keterangan Ibu</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->ketIbu->nama }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <div class="card">
            <div class="card-header text-center">
                <h4>INFORMASI REKENING</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Nama Rekening</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->nama_rekening }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Nomor Rekening</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->norek }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Nama Bank</strong>
                        <p class="card-text border-1 border-bottom">{{ '(' . $peserta->bank->kode . ') ' . $peserta->bank->nama }}</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <strong class="card-title">Alamat Bank</strong>
                        <p class="card-text border-1 border-bottom">{{ $peserta->cabang }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <p>Telah dilakukan verfikasi dan validasi kelengkapan berkas dan persyaratan dengan status <strong>{{ str($peserta->verified->last()->status->name)->upper() }}</strong> oleh :</p>
        <table class="table table-sm table-borderless" style="width: 40%">

            <head>
                <tr>
                    <th>Nama Verifikator</th>
                    <th>Tanggal</th>
                </tr>
            </head>
            <tbody>
                <tr>
                    <td>{{ str(auth()->user()->name)->upper() }}</td>
                    <td>{{ $peserta->verified->last()->created_at->format('d M Y') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    {{-- <script>
        print();
    </script> --}}
</body>

</html>
