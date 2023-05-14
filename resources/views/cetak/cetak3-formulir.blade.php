<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>berkas_peserta_{{ $peserta->nim }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" type="text/css" href="styles.css"> --}}
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style type="text/css">
        @page {
            size: LEGAL portrait;
            margin: 0;
        }

        /* @media print {
            @page {
                size: portrait
            }
        } */

        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            list-style: none;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background: #ffffff;
            font-size: 14px;
            line-height: 20px;
        }

        .resume_wrapper {
            display: flex;
            width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 10px;
        }

        .resume_wrapper .resume_left {
            width: 35%;
            /* background: #29292c; */
            border-right: solid 1px #d2d2d2;
            padding-right: 10px;
        }

        .resume_wrapper .resume_left .resume_image {
            width: 100%;
        }

        .resume_wrapper .resume_left .resume_image img {
            width: 100%;
            display: block;
        }

        .resume_wrapper .resume_title {
            /* color: #fff; */
            color: #036675;
            text-transform: uppercase;
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 10px;
            letter-spacing: 4px;
        }

        .resume_wrapper .resume_left .resume_info {
            color: #66636d;
        }

        .resume_wrapper .resume_left .resume_bottom {
            padding: 20px 30px;
        }

        .resume_wrapper .resume_item {
            padding: 20px 0;
            border-bottom: 1px solid #0175b2;
        }

        .resume_wrapper .resume_item:last-child {
            border-bottom: 0;
        }

        .resume_wrapper .resume_left .resume_namerole {
            display: none;
        }

        .resume_wrapper .resume_namerole .name {
            font-size: 20px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 5px;
            letter-spacing: 4px;
            line-height: 32px;
        }

        .resume_wrapper .resume_left .resume_namerole .role {
            color: #84838b;
        }

        .resume_wrapper .resume_left .resume_contact .resume_info {
            margin-top: 10px;
        }

        .resume_wrapper .resume_left .resume_contact .resume_subtitle {
            color: #000000;
            margin-bottom: 2px;
        }

        .resume_wrapper .resume_left .resume_skills .skills_list {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .resume_wrapper .resume_left .resume_skills .skills_list .skills_bar p {
            position: relative;
            width: 125px;
            height: 20px;
            background: #fff;
        }

        .resume_wrapper .resume_left .resume_skills .skills_list .skills_bar p span {
            position: absolute;
            top: 0;
            left: 0;
            background: #0175b2;
            width: 100%;
            height: 100%;
        }

        .resume_wrapper .resume_right {
            width: 65%;
            padding: 20px 40px;
            color: #26252d;
            /* text-transform: uppercase; */
        }

        .resume_wrapper .resume_right .resume_namerole .name {
            color: #555556;
            font-size: 20px;
            /* line-height: 20px; */
        }

        .resume_wrapper .resume_right .resume_namerole .role {
            font-size: 14px;
            text-transform: uppercase;

        }

        .resume_wrapper .resume_right .resume_item .resume_title {
            /* color: #26252d; */
            color: #036675;
        }

        .resume_wrapper .resume_right .resume_data {
            display: flex;
        }

        .resume_wrapper .resume_right .resume_data .year {
            padding-right: 35px;
            width: 150px;
            position: relative;
        }

        .resume_wrapper .resume_right .resume_data .content {
            padding-left: 35px;
            margin-bottom: 20px;
            width: calc(100% - 115px);
        }

        .resume_wrapper .resume_right .resume_data .field_name {
            /* color: #4b6636; */
            text-transform: uppercase;
            font-weight: 800;
            width: 180px;
            margin: 5px 0;
        }

        .resume_wrapper .resume_right .resume_data .field_info {
            color: #66636d;
            margin: 5px 0;
            /* width: 180px; */
        }

        .resume_wrapper .resume_right .resume_data .year:before {
            content: "";
            position: absolute;
            top: 5px;
            right: 0;
            width: 10px;
            height: 10px;
            background: #fff;
            border: 1px solid #26252d;
            border-radius: 50%;
        }

        .resume_wrapper .resume_right .resume_data .year:after {
            content: "";
            position: absolute;
            top: 17px;
            right: 4px;
            width: 3px;
            height: 90%;
            background: #0175b2;
        }

        .resume_wrapper .resume_right .resume_data:last-child .year:after {
            display: none;
        }

        .resume_wrapper .resume_right .resmue_interests .resume_info {
            display: flex;
            justify-content: space-between;
            text-align: center;
        }

        .resume_wrapper .resume_right .resmue_interests .interests .int_icon {
            font-size: 38px;
            color: #0175b2;
            margin-bottom: 10px;
        }

        .data_title {
            font-size: 13px;
        }

        .data_field {
            color: #565656;
            font-size: 13px;
        }

        /*
        @media screen and (max-width: 800px) {
            .resume_wrapper .resume_right .resume_namerole {
                display: none;
            }

            .resume_wrapper .resume_left .resume_namerole {
                display: block;
            }

            .resume_wrapper {
                width: 95%;
                margin: 10px auto;
                flex-direction: column;
            }

            .resume_wrapper .resume_left,
            .resume_wrapper .resume_right {
                width: 100%;
            }
        } */

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }

        /* @media print and (max-width: 424px) {
            .resume_wrapper .resume_right {
                padding: 20px 30px;
            }

            .resume_wrapper .resume_right .resume_data {
                flex-direction: column;
            }

            .resume_wrapper .resume_right .resume_data .year {
                padding: 0;
                margin-bottom: 5px;
                width: 100%;
                color: #0175b2;
            }

            .resume_wrapper .resume_right .resume_data .year:before,
            .resume_wrapper .resume_right .resume_data .year:after {
                display: none;
            }

            .resume_wrapper .resume_right .resume_data .content {
                width: 100%;
                padding: 0;
            }

            .resume_wrapper .resume_right .resmue_interests .interests .int_icon {
                font-size: 24px;
            }
        } */
    </style>
</head>

<body>

    <div class="resume_wrapper">
        <div class="resume_left">
            <div class="resume_image">
                <img src="{{ $peserta->photo() }}" alt="Resume_image">
            </div>
            <div class="resume_bottom">
                {{-- <div class="resume_item resume_namerole">
                    <div class="name">{{ $peserta->nama }}</div>
                    <div class="role">TEST</div>
                </div> --}}
                {{-- <div class="resume_item resume_profile">
                    <div class="resume_title">Profile</div>
                    <div class="resume_info"></div>
                </div> --}}
                <div class="resume_item resume_contact">
                    <div class="resume_title">Biodata</div>
                    {{-- <div class="resume_info">
                        <div class="resume_subtitle">Nama Lengkap</div>
                        <div class="resume_subinfo"><i class="fa fa-user"></i> {{ str($peserta->nama)->upper() }}</div>
                    </div> --}}
                    <div class="resume_info">
                        <div class="resume_subtitle">Tempat Tanggal Lahir</div>
                        <div class="resume_subinfo"><i class="fa fa-birthday-cake"></i> {{ $peserta->tempat_lahir . ', ' . $peserta->tanggal_lahir->translatedFormat('d F Y') }}</div>
                    </div>
                    <div class="resume_info">
                        <div class="resume_subtitle">Jenis Kelamin</div>
                        <div class="resume_subinfo">
                            @if ($peserta->gender == 1)
                                <i class="fa fa-mars"></i> Laki-Laki
                            @else
                                <i class="fa fa-venus"></i> Perempuan
                            @endif
                        </div>
                    </div>
                </div>
                <div class="resume_item resume_address">
                    <div class="resume_title">Alamat</div>
                    <div class="resume_info">
                        <i class="fa fa-map-marker-alt"></i> {{ $peserta->adress }},<br />
                        {{ str($peserta->kabkota->kab_kota . ' ' . $peserta->kabkota->nama)->title() }},<br />
                        {{ str($peserta->provinsi->provinsi)->title() }},<br />
                        Kode Pos : {{ $peserta->kode_pos }}
                    </div>
                </div>
                <div class="resume_item resume_contact">
                    <div class="resume_title">Kontak</div>
                    <div class="resume_info">
                        <div class="resume_subtitle">Telepon</div>
                        <div class="resume_subinfo"><i class="fa fa-phone"></i> {{ $peserta->phone }}</div>
                    </div>
                    <div class="resume_info">
                        <div class="resume_subtitle">Email</div>
                        <div class="resume_subinfo"><i class="fa fa-at"></i> {{ $peserta->email }}</div>
                    </div>
                </div>
                <div class="resume_item resume_contact">
                    <div class="resume_title">Rekening</div>
                    <div class="resume_info">
                        <div class="resume_subtitle">Nama Rekening</div>
                        <div class="resume_subinfo"><i class="fa fa-user-circle"></i> {{ $peserta->nama_rekening }}</div>
                    </div>
                    <div class="resume_info">
                        <div class="resume_subtitle">Nomor Rekening</div>
                        <div class="resume_subinfo"><i class="fa fa-money-check-alt"></i> {{ $peserta->norek }}</div>
                    </div>
                    <div class="resume_info">
                        <div class="resume_subtitle">Nama Bank</div>
                        <div class="resume_subinfo"><i class="fa fa-university"></i> {{ '(' . $peserta->bank->kode . ') ' . $peserta->bank->nama }}</div>
                    </div>
                    <div class="resume_info">
                        <div class="resume_subtitle">Alamat Bank</div>
                        <div class="resume_subinfo"><i class="fa fa-map-marker-alt"></i> {{ str($peserta->cabang)->title() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="resume_right">
            <div class="resume_item resume_namerole">
                <div class="name">{{ $peserta->nama }}</div>
                <div class="role">Nomor Induk Mahasiswa : {{ $peserta->nim }}</div>
                <div class="role">Nomor KTP : {{ $peserta->nik }}</div>
            </div>
            <div class="resume_item resume_education">
                <div class="resume_title">INFORMASI PENDIDIKAN</div>
                <div class="row">
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Nomor Induk Mahasiswa</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->nim }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Nama Perguruan</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->nama_pt }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Jenis Perguruan</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->jenispt->nama }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Fakultas</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->fakultas }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Program Studi</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->prody }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Jenjang</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->jenjang->nama . '(' . $peserta->jenjang->singkat . ')' }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Semester Awal Masuk</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->tanggal_masuk->translatedFormat('d F Y') }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Status Awal Masuk</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->status_awal->nama }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Semester Saat Ini</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->semester->nama }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Status Saat Ini</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->status->nama }}</div>
                        </div>
                    </div>
                </div>
                {{-- <div class="resume_info">
                    <div class="resume_data">
                        <div class="field_name">Jenis Kelamin</div>
                        <div class="field_info">{{ $peserta->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</div>
                        <div class="year">Jenis Kelamin</div>
                        <div class="content">
                            Title
                            {{ $peserta->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}
                        </div>
                    </div>
                    <div class="resume_data">
                        <div class="field_name">Jenis Kelamin</div>
                        <div class="field_info">{{ $peserta->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</div>
                        <div class="year">2010 - 2013</div>
                        <div class="content">
                            Title
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                    <div class="resume_data">
                        <div class="field_name">Jenis Kelamin</div>
                        <div class="field_info">{{ $peserta->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</div>
                        <div class="year">2013 - 2015</div>
                        <div class="content">
                            Title
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="resume_item resume_education">
                <div class="resume_title">INFORMASI TAMBAHAN</div>
                <div class="row">
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Nama Ayah</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->nama_ayah }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Status Ayah</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->statusAyah->nama }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Pendidkan Ayah</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->pddkanAyah->nama }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Pekerjaan Ayah / Bulan</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->jobAyah->nama }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Penghasilan Ayah</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->salAyah->jumlah }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Keterangan Ayah</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->ketAyah->nama }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Nama Ibu</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->nama_ibu }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Status Ibu</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->statusIbu->nama }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Pendidkan Ibu</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->pddkanIbu->nama }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Pekerjaan Ibu / Bulan</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->jobIbu->nama }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Penghasilan Ibu</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->salIbu->jumlah }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <strong class="form-label mb-0 text-uppercase data_title">Keterangan Ibu</strong>
                            <div class="form-control border-0 data_field">{{ $peserta->ketIbu->nama }}</div>
                        </div>
                    </div>
                </div>
                {{-- <div class="resume_info">
                    <div class="resume_data">
                        <div class="field_name">Jenis Kelamin</div>
                        <div class="field_info">{{ $peserta->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</div>
                        <div class="year">Jenis Kelamin</div>
                        <div class="content">
                            Title
                            {{ $peserta->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}
                        </div>
                    </div>
                    <div class="resume_data">
                        <div class="field_name">Jenis Kelamin</div>
                        <div class="field_info">{{ $peserta->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</div>
                        <div class="year">2010 - 2013</div>
                        <div class="content">
                            Title
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                    <div class="resume_data">
                        <div class="field_name">Jenis Kelamin</div>
                        <div class="field_info">{{ $peserta->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</div>
                        <div class="year">2013 - 2015</div>
                        <div class="content">
                            Title
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="resume_item resume_experience">
                <div class="resume_title">Experience</div>
                <div class="resume_info">
                    <div class="resume_data">
                        <div class="year">2000 - 2010</div>
                        <div class="content">
                            Title
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                    <div class="resume_data">
                        <div class="year">2010 - 2013</div>
                        <div class="content">
                            Title
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                    <div class="resume_data">
                        <div class="year">2013 - 2015</div>
                        <div class="content">
                            Title
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                    <div class="resume_data">
                        <div class="year">2013 - 2015</div>
                        <div class="content">
                            Title
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                    <div class="resume_data">
                        <div class="year">2013 - 2015</div>
                        <div class="content">
                            Title
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="resume_item resmue_interests" style="font-size: 14px">
                {{-- <div class="resume_title">Interests</div>
                <div class="resume_info">
                    <div class="interests">
                        <div class="int_icon">
                            <i class="fas fa-volleyball-ball"></i>
                        </div>
                        <div class="int_data">Volleyball</div>
                    </div>
                    <div class="interests">
                        <div class="int_icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="int_data">Reading</div>
                    </div>
                    <div class="interests">
                        <div class="int_icon">
                            <i class="fas fa-film"></i>
                        </div>
                        <div class="int_data">Movies</div>
                    </div>
                    <div class="interests">
                        <div class="int_icon">
                            <i class="fas fa-biking"></i>
                        </div>
                        <div class="int_data">Riding</div>
                    </div>
                </div> --}}
                <span class="text-uppercase">Telah diverifikasi dan dinyatakan {{ $peserta->verified->last()->status->name }} Di burmeso, pada hari {{ $carbon::parse($peserta->verified->last()->created_at)->translatedFormat('l') }} tanggal {{ $carbon::parse($peserta->verified->last()->created_at)->translatedFormat('d F Y') }}</span>
                <div class="row mt-2">
                    <div class="col-6 text-center  mx-auto">
                        Mengetahui :
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-center mx-auto text-uppercase">
                        <strong>SEKRETARIS DAERAH</strong>
                        <br />
                        <br />
                        <br />
                        <br />
                        <span>{{ $jabatan->nama }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        print();
    </script>
</body>

</html>
