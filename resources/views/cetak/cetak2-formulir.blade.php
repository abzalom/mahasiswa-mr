<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Peserta {{ $peserta->nim }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style type="text/css">
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

        /* .titlename {
            width: 20%;
            background: #000;
        } */

        table tbody tr th {
            margin: 0 !important;
            padding: 2px !important;
        }

        table tbody tr td {
            margin: 0 !important;
            padding: 2px !important;
            width: 60%;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <h4>Peserta Pemohon Bantuan Beasiswa Pemerintah Kabupaten Mamberamo Raya</h4>
        <p>Yang sebagaimana termuat dibawah ini :</p>

        <div class="card border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <img src="..." class="img-fluid" alt="{{ $peserta->username }}">
                    </div>
                    <div class="col-10">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th class="titlename">Nama</th>
                                    <th>:</th>
                                    <td>{{ str($peserta->nama)->title() }}</td>
                                </tr>
                                <tr>
                                    <th class="titlename">Tempat Tanggal Lahir</th>
                                    <th>:</th>
                                    <td>{{ str($peserta->tempat_lahir)->title() . ', ' . $peserta->tanggal_lahir->format('d M Y') }}</td>
                                </tr>
                                <tr>
                                    <th class="titlename">Jenis Kelamin</th>
                                    <th>:</th>
                                    <td>{{ $peserta->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</td>
                                </tr>
                                <tr>
                                    <th class="titlename">Nomor KTP</th>
                                    <th>:</th>
                                    <td>{{ $peserta->nik }}</td>
                                </tr>
                                <tr>
                                    <th class="titlename">Telepon</th>
                                    <th>:</th>
                                    <td>{{ $peserta->phone }}</td>
                                </tr>
                                <tr>
                                    <th class="titlename">Email</th>
                                    <th>:</th>
                                    <td>{{ $peserta->email }}</td>
                                </tr>
                                <tr>
                                    <th class="titlename">Alamat</th>
                                    <th>:</th>
                                    <td>{{ $peserta->adress . ' - ' . str($peserta->kabkota->kab_kota . ' ' . $peserta->kabkota->nama)->title() . ', ' . str($peserta->provinsi->provinsi)->title() }}, Kode Pos {{ $peserta->kode_pos }}</td>
                                </tr>
                                <tr>
                                    <th class="titlename">Nomor Induk Mahasiswa</th>
                                    <th>:</th>
                                    <td>{{ $peserta->nim }}</td>
                                </tr>
                                <tr>
                                    <th class="titlename">Nama Perguruan</th>
                                    <th>:</th>
                                    <td>{{ $peserta->nama_pt }}</td>
                                </tr>
                                <tr>
                                    <th class="titlename">Jenis Perguruan</th>
                                    <th>:</th>
                                    <td>{{ $peserta->jenispt->nama }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    {{-- <script>
        print();
    </script> --}}
</body>

</html>
