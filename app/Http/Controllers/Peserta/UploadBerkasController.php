<?php

namespace App\Http\Controllers\Peserta;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadBerkasController extends Controller
{

    public function uploadfoto(Request $request)
    {
        $validate = $request->validate(
            [
                'foto_peserta' => 'required|max:2040|image|mimes:png,jpg,jpeg',
                // 'foto_peserta' => 'dimensions:min_width=379,min_height=557',
                // 'foto_peserta' => 'dimensions:max_width=381,max_height=559',
            ],
            [
                'foto_peserta.required' => 'gagal upload, foto belum di pilih!',
                'foto_peserta.max' => 'gagal upload, ukuran foto melebihi batas 2MB!',
                'foto_peserta.image' => 'gagal upload, file yang diupload bukan gambar!',
                'foto_peserta.mimes' => 'gagal upload, file yang di ijinkan hanya format *.png | *.jpg | *.jpeg!',
                // 'foto_peserta.dimensions' => 'gagal upload, file foto harus minimal 4cm x 6cm!',
            ]
        );
        $user = Peserta::find(auth()->user()->id);
        $directory = $user->directory;
        $subdir = '/foto_peserta/';
        $fileName = '';

        if ($request->has('foto_peserta')) {
            // Storage::disk('public')->makeDirectory('assets/img/thumbnails');
            Storage::disk('data')->makeDirectory($directory . $subdir);
            Storage::disk('data')->makeDirectory($directory . '/thumbnails/');
            if (!Storage::disk('data')->exists($directory . $subdir . $user->foto_peserta)) {
                Storage::disk('data')->delete($directory . $subdir . $user->foto_peserta);
            }
            $imgResize = Image::make($request->file('foto_peserta'));
            $file = $request->file('foto_peserta');
            $fileName = 'foto_peserta' . $user->file_name . '.' . $file->getClientOriginalExtension();

            $imgResize->resize(128, 128, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imgProfile = 'user_' . $user->id . '_profile.' . $file->getClientOriginalExtension();
            $imgResize->save('data/' . $directory . '/thumbnails/' . $imgProfile);

            $path = 'data/' . $directory . $subdir;
            $file->move($path, $fileName);
        }
        $user->foto_peserta = $fileName;
        $user->save();
        $user->image = $imgProfile;
        $user->save();
        return redirect()->back()->with('pesan', 'Berkas Foto Peserta berhasil di upload!');
    }

    public function uploadktp(Request $request)
    {
        $validate = $request->validate(
            [
                'file_ktp' => 'required|max:2040|mimes:png,jpg,jpeg,pdf'
            ],
            [
                'file_ktp.required' => 'gagal upload, file belum di pilih!',
                'file_ktp.max' => 'gagal upload, ukuran file melebihi batas 2MB!',
                'file_ktp.mimes' => 'gagal upload, file yang di ijinkan hanya format *.pdf | *.png | *.jpg | *.jpeg!',
            ]
        );
        $user = Peserta::find(auth()->user()->id);
        $directory = $user->directory;
        $subdir = '/file_ktp/';
        $fileName = '';

        if ($request->has('file_ktp')) {
            Storage::disk('data')->makeDirectory($directory . $subdir);
            if (!Storage::disk('data')->exists($directory . $subdir . $user->file_ktp)) {
                Storage::disk('data')->delete($directory . $subdir . $user->file_ktp);
            }
            $file = $request->file('file_ktp');
            $fileName = 'file_ktp' . $user->file_name . '.' . $file->getClientOriginalExtension();
            $path = 'data/' . $directory . $subdir;
            $file->move($path, $fileName);
        }
        $user->file_ktp = $fileName;
        $user->save();
        return redirect()->back()->with('pesan', 'Berkas Foto Peserta berhasil di upload!');
    }

    public function uploadkk(Request $request)
    {
        $validate = $request->validate(
            [
                'file_kk' => 'required|max:2040|mimes:png,jpg,jpeg,pdf'
            ],
            [
                'file_kk.required' => 'gagal upload, file belum di pilih!',
                'file_kk.max' => 'gagal upload, ukuran file melebihi batas 2MB!',
                'file_kk.mimes' => 'gagal upload, file yang di ijinkan hanya format *.pdf | *.png | *.jpg | *.jpeg!',
            ]
        );
        $user = Peserta::find(auth()->user()->id);
        $directory = $user->directory;
        $subdir = '/file_kk/';
        $fileName = '';

        if ($request->has('file_kk')) {
            Storage::disk('data')->makeDirectory($directory . $subdir);
            if (!Storage::disk('data')->exists($directory . $subdir . $user->file_kk)) {
                Storage::disk('data')->delete($directory . $subdir . $user->file_kk);
            }
            $file = $request->file('file_kk');
            $fileName = 'file_kk' . $user->file_name . '.' . $file->getClientOriginalExtension();
            $path = 'data/' . $directory . $subdir;
            $file->move($path, $fileName);
        }
        $user->file_kk = $fileName;
        $user->save();
        return redirect()->back()->with('pesan', 'Berkas Foto Peserta berhasil di upload!');
    }

    public function uploadkpm(Request $request)
    {
        $validate = $request->validate(
            [
                'file_kpm' => 'required|max:2040|mimes:png,jpg,jpeg,pdf'
            ],
            [
                'file_kpm.required' => 'gagal upload, foto belum di pilih!',
                'file_kpm.max' => 'gagal upload, ukuran foto melebihi batas 2MB!',
                'file_kpm.mimes' => 'gagal upload, file yang di ijinkan hanya format *.pdf | *.png | *.jpg | *.jpeg!',
            ]
        );
        $user = Peserta::find(auth()->user()->id);
        $directory = $user->directory;
        $subdir = '/file_kpm/';
        $fileName = '';

        if ($request->has('file_kpm')) {
            Storage::disk('data')->makeDirectory($directory . $subdir);
            if (!Storage::disk('data')->exists($directory . $subdir . $user->file_kpm)) {
                Storage::disk('data')->delete($directory . $subdir . $user->file_kpm);
            }
            $file = $request->file('file_kpm');
            $fileName = 'file_kpm' . $user->file_name . '.' . $file->getClientOriginalExtension();
            $path = 'data/' . $directory . $subdir;
            $file->move($path, $fileName);
        }
        $user->file_kpm = $fileName;
        $user->save();
        return redirect()->back()->with('pesan', 'Berkas Foto Peserta berhasil di upload!');
    }


    public function uploadkhs(Request $request)
    {
        $validate = $request->validate(
            [
                'file_khs' => 'required|max:2040|mimes:png,jpg,jpeg,pdf'
            ],
            [
                'file_khs.required' => 'gagal upload, foto belum di pilih!',
                'file_khs.max' => 'gagal upload, ukuran foto melebihi batas 2MB!',
                'file_khs.mimes' => 'gagal upload, file yang di ijinkan hanya format *.pdf | *.png | *.jpg | *.jpeg!',
            ]
        );
        $user = Peserta::find(auth()->user()->id);
        $directory = $user->directory;
        $subdir = '/file_khs/';
        $fileName = '';

        if ($request->has('file_khs')) {
            Storage::disk('data')->makeDirectory($directory . $subdir);
            if (!Storage::disk('data')->exists($directory . $subdir . $user->file_khs)) {
                Storage::disk('data')->delete($directory . $subdir . $user->file_khs);
            }
            $file = $request->file('file_khs');
            $fileName = 'file_khs' . $user->file_name . '.' . $file->getClientOriginalExtension();
            $path = 'data/' . $directory . $subdir;
            $file->move($path, $fileName);
        }
        $user->file_khs = $fileName;
        $user->save();
        return redirect()->back()->with('pesan', 'Berkas Foto Peserta berhasil di upload!');
    }


    public function uploadkrs(Request $request)
    {
        $validate = $request->validate(
            [
                'file_krs' => 'required|max:2040|mimes:png,jpg,jpeg,pdf'
            ],
            [
                'file_krs.required' => 'gagal upload, foto belum di pilih!',
                'file_krs.max' => 'gagal upload, ukuran foto melebihi batas 2MB!',
                'file_krs.mimes' => 'gagal upload, file yang di ijinkan hanya format *.pdf | *.png | *.jpg | *.jpeg!',
            ]
        );
        $user = Peserta::find(auth()->user()->id);
        $directory = $user->directory;
        $subdir = '/file_krs/';
        $fileName = '';

        if ($request->has('file_krs')) {
            Storage::disk('data')->makeDirectory($directory . $subdir);
            if (!Storage::disk('data')->exists($directory . $subdir . $user->file_krs)) {
                Storage::disk('data')->delete($directory . $subdir . $user->file_krs);
            }
            $file = $request->file('file_krs');
            $fileName = 'file_krs' . $user->file_name . '.' . $file->getClientOriginalExtension();
            $path = 'data/' . $directory . $subdir;
            $file->move($path, $fileName);
        }
        $user->file_krs = $fileName;
        $user->save();
        return redirect()->back()->with('pesan', 'Berkas Foto Peserta berhasil di upload!');
    }

    public function uploadsurat(Request $request)
    {
        $validate = $request->validate(
            [
                'file_surat_aktif' => 'required|max:2040|mimes:png,jpg,jpeg,pdf'
            ],
            [
                'file_surat_aktif.required' => 'gagal upload, foto belum di pilih!',
                'file_surat_aktif.max' => 'gagal upload, ukuran foto melebihi batas 2MB!',
                'file_surat_aktif.mimes' => 'gagal upload, file yang di ijinkan hanya format *.pdf | *.png | *.jpg | *.jpeg!',
            ]
        );
        $user = Peserta::find(auth()->user()->id);
        $directory = $user->directory;
        $subdir = '/file_surat_aktif/';
        $fileName = '';

        if ($request->has('file_surat_aktif')) {
            Storage::disk('data')->makeDirectory($directory . $subdir);
            if (!Storage::disk('data')->exists($directory . $subdir . $user->file_surat_aktif)) {
                Storage::disk('data')->delete($directory . $subdir . $user->file_surat_aktif);
            }
            $file = $request->file('file_surat_aktif');
            $fileName = 'file_surat_aktif' . $user->file_name . '.' . $file->getClientOriginalExtension();
            $path = 'data/' . $directory . $subdir;
            $file->move($path, $fileName);
        }
        $user->file_surat_aktif = $fileName;
        $user->save();
        return redirect()->back()->with('pesan', 'Berkas Foto Peserta berhasil di upload!');
    }

    public function uploadkwitansi(Request $request)
    {
        $validate = $request->validate(
            [
                'foto_kwitansi' => 'required|max:2040|mimes:png,jpg,jpeg,pdf'
            ],
            [
                'foto_kwitansi.required' => 'gagal upload, foto belum di pilih!',
                'foto_kwitansi.max' => 'gagal upload, ukuran foto melebihi batas 2MB!',
                'foto_kwitansi.mimes' => 'gagal upload, file yang di ijinkan hanya format *.pdf | *.png | *.jpg | *.jpeg!',
            ]
        );
        $user = Peserta::find(auth()->user()->id);
        $directory = $user->directory;
        $subdir = '/foto_kwitansi/';
        $fileName = '';

        if ($request->has('foto_kwitansi')) {
            Storage::disk('data')->makeDirectory($directory . $subdir);
            if (!Storage::disk('data')->exists($directory . $subdir . $user->foto_kwitansi)) {
                Storage::disk('data')->delete($directory . $subdir . $user->foto_kwitansi);
            }
            $file = $request->file('foto_kwitansi');
            $fileName = 'foto_kwitansi' . $user->file_name . '.' . $file->getClientOriginalExtension();
            $path = 'data/' . $directory . $subdir;
            $file->move($path, $fileName);
        }
        $user->foto_kwitansi = $fileName;
        $user->save();
        return redirect()->back()->with('pesan', 'Berkas Foto Peserta berhasil di upload!');
    }

    public function uploaddikti(Request $request)
    {
        $validate = $request->validate(
            [
                'foto_dikti' => 'required|max:2040|mimes:png,jpg,jpeg,pdf'
            ],
            [
                'foto_dikti.required' => 'gagal upload, foto belum di pilih!',
                'foto_dikti.max' => 'gagal upload, ukuran foto melebihi batas 2MB!',
                'foto_dikti.mimes' => 'gagal upload, file yang di ijinkan hanya format *.pdf | *.png | *.jpg | *.jpeg!',
            ]
        );
        $user = Peserta::find(auth()->user()->id);
        $directory = $user->directory;
        $subdir = '/foto_dikti/';
        $fileName = '';

        if ($request->has('foto_dikti')) {
            Storage::disk('data')->makeDirectory($directory . $subdir);
            if (!Storage::disk('data')->exists($directory . $subdir . $user->foto_dikti)) {
                Storage::disk('data')->delete($directory . $subdir . $user->foto_dikti);
            }
            $file = $request->file('foto_dikti');
            $fileName = 'foto_dikti' . $user->file_name . '.' . $file->getClientOriginalExtension();
            $path = 'data/' . $directory . $subdir;
            $file->move($path, $fileName);
        }
        $user->foto_dikti = $fileName;
        $user->save();
        return redirect()->back()->with('pesan', 'Berkas Foto Peserta berhasil di upload!');
    }
}
