<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\JalurMasuk;
use App\Models\JenisPt;
use App\Models\Jenjang;
use App\Models\KabKota;
use App\Models\KetOrtu;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Penghasilan;
use App\Models\Peserta;
use App\Models\Provinsi;
use App\Models\Semester;
use App\Models\StatusAwalMahasiswa;
use App\Models\StatusMahasiswa;
use App\Models\StatusOrtu;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PesertaController extends Controller
{

    public function redirectTo(): RedirectResponse
    {
        $user = Peserta::find(auth()->user()->id);
        if ($user->hasRole('admin')) {
            return redirect('/admin');
        }
    }

    public function dashboard()
    {
        $user = Peserta::with([
            'verified',
            'verified.user',
        ])->find(auth()->user()->id);
        // return $user;
        // return $user->verified->last()->user;
        $exceptKey = [
            'email_verified_at',
            'phone_verified_at',
            'terms',
            'image',
            'tim',
            'kirim',
            'keterangan',
            'deleted_at',
            'created_at',
            'updated_at',
            'remember_token',
        ];
        $check = [];
        $lengkap = false;
        foreach ($user->getAttributes() as $key => $value) {
            if (!in_array($key, $exceptKey)) {
                if ($value == null) {
                    array_push($check, $key);
                }
            }
        }
        if (count($check) == null) {
            $lengkap = true;
        }
        // return $user->verified->last();
        return view('peserta.peserta-dashboard', [
            'user' => $user,
            'lengkap' => $lengkap,
            'web' => [
                'title' => 'Beasiswa 2023',
                'desc' => 'DATA DIRI PESERTA',
            ],
        ]);
    }

    public function createbiodata()
    {
        $user = Peserta::find(auth()->user()->id);
        if ($user->kirim) {
            return to_route('peserta.dashboard');
        }
        return view('peserta.peserta-formulir-biodata', [
            'user' => $user,
            'jenispts' => JenisPt::get(),
            'janjang' => Jenjang::get(),
            'semesters' => Semester::get(),
            'jalurs' => JalurMasuk::get(),
            'sttsAwals' => StatusAwalMahasiswa::get(),
            'sttsSekarangs' => StatusMahasiswa::get(),
            'web' => [
                'title' => 'Beasiswa 2023',
                'desc' => 'FORMULIR INFORMASI PESERTA',
            ],
        ]);
    }

    public function createdatatambahan()
    {
        $user = Peserta::find(auth()->user()->id);
        if ($user->kirim) {
            return to_route('peserta.dashboard');
        }
        return view('peserta.peserta-formulir-tambahan', [
            'user' => $user,
            'status' => StatusOrtu::get(),
            'pendidikan' => Pendidikan::get(),
            'pekerjaan' => Pekerjaan::get(),
            'penghasilan' => Penghasilan::get(),
            'ketortu' => KetOrtu::get(),
            'web' => [
                'title' => 'Beasiswa 2023',
                'desc' => 'FORMULIR INFORMASI TAMBAHAN',
            ],
        ]);
    }

    public function createdatakontak()
    {
        $user = Peserta::find(auth()->user()->id);
        if ($user->kirim) {
            return to_route('peserta.dashboard');
        }
        return view('peserta.peserta-formulir-kontak', [
            'user' => $user,
            'kabkotas' => KabKota::get(),
            'provinsi' => Provinsi::get(),
            'web' => [
                'title' => 'Beasiswa 2023',
                'desc' => 'FORMULIR INFORMASI KONTAK',
            ],
        ]);
    }

    public function createdatarekening()
    {
        $user = Peserta::find(auth()->user()->id);
        if ($user->kirim) {
            return to_route('peserta.dashboard');
        }
        return view('peserta.peserta-formulir-rekening', [
            'user' => $user,
            'banks' => Bank::get(),
            'web' => [
                'title' => 'Beasiswa 2023',
                'desc' => 'FORMULIR INFORMASI KONTAK',
            ],
        ]);
    }


    /**
     * 
     * Handle Update Data Peserta
     * 
     */

    public function updatebiodata(Request $request)
    {
        $user = Peserta::find(auth()->user()->id);
        $validate = $request->validate(
            [
                'nama' => ['required', 'max:256'],
                'nik' => ['required', 'digits:16', 'unique:pesertas,nik,' . $user->id],
                'tempat_lahir' => ['required'],
                'tanggal_lahir' => ['required', 'date'],
                'gender' => ['required'],
                'nim' => ['required', 'unique:pesertas,nim,' . $user->id],
                'nama_pt' => ['required'],
                'jenis_pt_id' => ['required'],
                'fakultas' => ['required'],
                'prody' => ['required'],
                'jenjang_id' => ['required'],
                'semester_id' => ['required'],
                'tanggal_masuk' => ['required', 'date'],
                'jalur_masuk_id' => ['required'],
                'status_awal_mahasiswa_id' => ['required'],
                'status_mahasiswa_id' => ['required'],
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong!',
                'tempat_lahir.required' => 'Tempat Lahir tidak boleh kosong!',
                'tanggal_lahir.required' => 'Tanggal Lahir tidak boleh kosong!',
                'gender.required' => 'Jenis Kelamin tidak boleh kosong!',
                'nik.required' => 'NIK tidak boleh kosong!',
                'nik.unique' => 'Maaf NIK anda sudah digunakan!',
                'nik.digits' => 'NIK harus 16 digit!',
                'nim.required' => 'NIM tidak boleh kosong!',
                'nim.unique' => 'Maaf NIM anda sudah digunakan!',
                'nama_pt.required' => 'Nama Perguruan tidak boleh kosong!',
                'jenis_pt_id.required' => 'Jenis Perguruan tidak boleh kosong!',
                'fakultas.required' => 'Fakultas tidak boleh kosong!',
                'prody.required' => 'Program Studi tidak boleh kosong!',
                'jenjang_id.required' => 'Jangjang tidak boleh kosong!',
                'semester_id.required' => 'Semester tidak boleh kosong!',
                'tanggal_masuk.required' => 'Tanggal Mulai Kuliah tidak boleh kosong!',
                'jalur_masuk_id.required' => 'Jalur Masuk tidak boleh kosong!',
                'status_awal_mahasiswa_id.required' => 'Status Awal tidak boleh kosong!',
                'status_mahasiswa_id.required' => 'Status Sekarang tidak boleh kosong!',
            ]
        );

        $user->nama = $request->nama;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->gender = $request->gender;
        $user->nik = $request->nik;
        $user->nim = $request->nim;
        $user->nama_pt = $request->nama_pt;
        $user->jenis_pt_id = $request->jenis_pt_id;
        $user->fakultas = $request->fakultas;
        $user->prody = $request->prody;
        $user->jenjang_id = $request->jenjang_id;
        $user->semester_id = $request->semester_id;
        $user->tanggal_masuk = $request->tanggal_masuk;
        $user->jalur_masuk_id = $request->jalur_masuk_id;
        $user->status_awal_mahasiswa_id = $request->status_awal_mahasiswa_id;
        $user->status_mahasiswa_id = $request->status_mahasiswa_id;
        $user->save();
        return redirect()->back()->with('pesan', 'Data Informasi Diri Peserta Berhasil Diupdate');
    }

    public function updatetambahan(Request $request)
    {
        $user = Peserta::find(auth()->user()->id);
        $validate = $request->validate(
            [
                'nomor_kk' => ['required', 'integer'],
                'nama_ayah' => ['required'],
                'status_ayah' => ['required'],
                'pendidikan_ayah' => ['required'],
                'pekerjaan_ayah' => ['required'],
                'penghasilan_ayah' => ['required'],
                'keterangan_ayah' => ['required'],
                'nama_ibu' => ['required'],
                'status_ibu' => ['required'],
                'pendidikan_ibu' => ['required'],
                'pekerjaan_ibu' => ['required'],
                'penghasilan_ibu' => ['required'],
                'keterangan_ibu' => ['required'],
            ],
            [
                'nomor_kk.required' => 'Nomor KK tidak boleh kosong!',
                'nama_ayah.required' => 'Nama Ayah tidak boleh kosong!',
                'status_ayah.required' => 'Status Ayah tidak boleh kosong!',
                'pendidikan_ayah.required' => 'Pendidikan Ayah tidak boleh kosong!',
                'pekerjaan_ayah.required' => 'Pekerjaan Ayah tidak boleh kosong!',
                'penghasilan_ayah.required' => 'Penhasilan Ayah tidak boleh kosong!',
                'keterangan_ayah.required' => 'Keterangan Ayah tidak boleh kosong!',
                'nama_ibu.required' => 'Nama Ibu tidak boleh kosong!',
                'status_ibu.required' => 'Status Ibu tidak boleh kosong!',
                'pendidikan_ibu.required' => 'Pendidikan Ibu tidak boleh kosong!',
                'pekerjaan_ibu.required' => 'Pekerjaan Ibu tidak boleh kosong!',
                'penghasilan_ibu.required' => 'Penhasilan Ibu tidak boleh kosong!',
                'keterangan_ibu.required' => 'Keterangan Ibu tidak boleh kosong!',
            ]
        );

        $user->nomor_kk = $request->nomor_kk;
        $user->nama_ayah = $request->nama_ayah;
        $user->status_ayah = $request->status_ayah;
        $user->pendidikan_ayah = $request->pendidikan_ayah;
        $user->pekerjaan_ayah = $request->pekerjaan_ayah;
        $user->penghasilan_ayah = $request->penghasilan_ayah;
        $user->keterangan_ayah = $request->keterangan_ayah;
        $user->nama_ibu = $request->nama_ibu;
        $user->status_ibu = $request->status_ibu;
        $user->pendidikan_ibu = $request->pendidikan_ibu;
        $user->pekerjaan_ibu = $request->pekerjaan_ibu;
        $user->penghasilan_ibu = $request->penghasilan_ibu;
        $user->keterangan_ibu = $request->keterangan_ibu;
        $user->save();
        return redirect()->back()->with('pesan', 'Data Informasi Tambahan Peserta Berhasil Diupdate');
    }

    public function updatekontak(Request $request)
    {
        $user = Peserta::find(auth()->user()->id);
        $validate = $request->validate(
            [
                'adress' => 'required',
                'kab_kota_id' => 'required',
                'phone' => 'required|numeric|unique:pesertas,phone,' . $user->id,
                'kode_pos' => 'required',
            ],
            [
                'adress.required' => 'Alamat tidak boleh kosong!',
                'kab_kota_id.required' => 'Kab / Kota tidak boleh kosong!',
                'phone.required' => 'Nomor Telepon / WhatsApp tidak boleh kosong!',
                'kode_pos.required' => 'Kode Pos tidak boleh kosong!',
            ]
        );

        $kabkot = KabKota::find($request->kab_kota_id);

        $user->adress = $request->adress;
        $user->kab_kota_id = $request->kab_kota_id;
        $user->phone = $request->phone;
        $user->kode_pos = $request->kode_pos;
        $user->provinsi_id = $kabkot->provinsi_id;
        $user->save();
        return redirect()->back()->with('pesan', 'Data Informasi Kontak Peserta Berhasil Diupdate');
    }

    public function updaterekening(Request $request)
    {
        $user = Peserta::find(auth()->user()->id);
        $validate = $request->validate(
            [
                'nama_rekening' => ['required',],
                'norek' => ['required', 'numeric', 'unique:pesertas,norek,' . $user->id],
                'bank_id' => ['required'],
                'cabang' => ['required'],
            ],
            [
                'nama_rekening.required' => 'Nama Rekening tidak boleh kosong!',
                'norek.required' => 'Nomor Rekening tidak boleh kosong!',
                'norek.numeric' => 'Nomor Rekening harunya hanya berupa angka saja!',
                'bank_id.required' => 'Nama Bank tidak boleh kosong!',
                'cabang.required' => 'Alamat Kantor Penerbit Rekening tidak boleh kosong!',
            ]
        );

        $directory = $user->directory;
        $subdir = '/rekening/';



        if ($request->has('file')) {
            Storage::disk('data')->makeDirectory($directory . $subdir);
            if (!Storage::disk('data')->exists($directory . $subdir . $user->foto_rekening)) {
                Storage::disk('data')->delete($directory . $subdir . $user->foto_rekening);
            }
            $file = $request->file('file');
            $fileName = 'file_rekening' . $user->file_name . '.' . $file->getClientOriginalExtension();
            $path = 'data/' . $directory . $subdir;
            $file->move($path, $fileName);
            $user->foto_rekening = $fileName;
        }

        // return Storage::allDirectories('data/peserta');
        // return $fileName;

        $user->nama_rekening = $request->nama_rekening;
        $user->norek = $request->norek;
        $user->bank_id = $request->bank_id;
        $user->cabang = $request->cabang;

        // dump(Storage::allDirectories('data/peserta'));
        // dump($user);
        $user->save();
        return redirect()->back()->with('pesan', 'Data Informasi Rekening Peserta Berhasil Diupdate');
    }

    public function krimberkas()
    {
        $user = Peserta::find(auth()->user()->id);
        $user->kirim = true;
        $user->save();
        return redirect()->back();
    }
}
