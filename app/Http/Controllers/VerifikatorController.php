<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class VerifikatorController extends Controller
{

    public function index(): RedirectResponse
    {
        $user = User::find(auth()->user()->id);
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->hasRole('koordinator')) {
            return redirect()->route('koordinator.dashboard');
        }
        if ($user->hasRole('verifikator')) {
            return redirect()->route('verifikator.dashboard');
        }
    }

    public function dashboard()
    {
        return view('verifikator.verifikator-dashboard', [
            'user' => User::find(auth()->user()->id),
            'web' => [
                'title' => 'Verifikator Panel',
                'desc' => 'Dashboard',
            ],
        ]);
    }

    public function profile()
    {
        return view('verifikator.verifikator-profile', [
            'user' => User::find(auth()->user()->id),
            'web' => [
                'title' => 'Verifikator Panel',
                'desc' => 'Profile ' . str(auth()->user()->username)->title(),
            ],
        ]);
    }

    public function profileupdate(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:20',
                'username' => 'required|max:10',
                'email' => 'required',
                'phone' => 'required|numeric',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong!',
                'name.max' => 'Pajang nama maksimal 20 karakter!',
                'username.required' => 'Username tidak boleh kosong!',
                'username.max' => 'Panjang username maksimal 20 karakter!',
                'email.required' => 'Email tidak boleh kosong!',
                'phone.required' => 'Nomor Telepon tidak boleh kosong!',
            ]
        );
        $user = User::find(auth()->user()->id);
        if ($request->password) {
            $request->validate([
                'password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
            ]);
            $user->password = Hash::make($request->new_password);
        }
        $user->name = str($request->name)->lower();
        $user->username = str($request->username)->lower()->replace(' ', '.');
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back()->with('pesan', 'Profile anda berhasil di update!');
    }

    public function imageupdate(Request $request)
    {
        $request->validate(
            [
                'image' => 'required|mimes:png,jpg,jpeg|min:50|max:2048'
            ],
            [
                'image.required' => 'Gambar harus di pilih',
                'image.mimes' => 'Jenis gambar yang di ijinkan adalah *.png | *.jpg | *.jpeg',
                'image.min' => 'Ukuran gambar minimal 50kb',
                'image.max' => 'Ukuran gambar maksimal 2mb',
            ]
        );
        $user = User::find(auth()->user()->id);
        File::delete('images/' . $user->image);
        File::delete('images/thumbnails/' . $user->image);
        $file = $request->file('image');
        $fileName = auth()->user()->id . '_' . auth()->user()->username . '.' . $file->getClientOriginalExtension();
        if ($file->storeAs('images', $fileName)) {
            $thumb = Image::make($file);
            $thumb->resize(40, 40, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumb->save('images/thumbnails/' . $fileName);
        }
        $user->image = $fileName;
        $user->save();
        return redirect()->back()->with('pesan', 'Gambar Profile anda berhasil di update!');
    }

    public function image(Request $request)
    {
        return to_route('koordinator.profile');
    }

    public function manajementpeserta()
    {
        $user = User::with([
            // 'pesertas' => fn ($q) => $q->where('kirim', true)
        ])->find(auth()->user()->id);
        return view('verifikator.manajament.verifikator-man-peserta', [
            'user' => $user,
            'web' => [
                'title' => 'Verifikator Panel',
                'desc' => 'Manajament Peserta',
            ],
        ]);
    }

    public function manajementperbaikanpeserta()
    {
        $user = User::find(auth()->user()->id);
        return view('verifikator.manajament.verifikator-perbaikan-peserta', [
            'user' => $user,
            'web' => [
                'title' => 'Verifikator Panel',
                'desc' => 'Manajament Peserta',
            ],
        ]);
    }

    public function manajementlengkappeserta()
    {
        $user = User::with([
            'pesertas',
            // 'pesertas.verified' => fn ($q) => $q->where('verify_status_id', 1),
        ])->find(auth()->user()->id);
        // return $user->pesertas[0]->verified;
        return view('verifikator.manajament.verifikator-lengkap-peserta', [
            'user' => $user,
            'web' => [
                'title' => 'Verifikator Panel',
                'desc' => 'Manajament Peserta',
            ],
        ]);
    }

    public function verifikasipeserta($id)
    {
        $peserta = User::with([
            'pesertas' => fn ($q) => $q->where('peserta_id', $id),
            // 'peserta' => fn ($q) => $q->find($id),
        ])->find(auth()->user()->id);
        // dump($peserta->pesertas->toArray());
        // dump($peserta->verified);
        if (!$peserta->pesertas->count()) {
            return to_route('verifikator.man.peserta')->with('pesan', 'Data Peserta yang di minta tidak ditemukan atau belum di sinkron verifikatornya oleh koordinator');
        }
        return view('verifikator.manajament.verifikator-verified-peserta', [
            'peserta' => $peserta->pesertas[0],
            'web' => [
                'title' => 'Verifikator Panel',
                'desc' => 'Manajament Peserta',
            ],
        ]);
    }

    public function perbaikanpeserta($id)
    {
        $peserta = User::with([
            'pesertas' => fn ($q) => $q->where('peserta_id', $id),
            // 'peserta' => fn ($q) => $q->find($id),
        ])->find(auth()->user()->id);
        // dump($peserta->toArray());
        // dump($peserta->verified);
        if (!$peserta->pesertas->count()) {
            return to_route('verifikator.manperbaikan.peserta')->with('pesan', 'Data Peserta yang di minta tidak ditemukan atau belum di sinkron verifikatornya oleh koordinator');
        }
        return view('verifikator.manajament.verifikator-verified-perbaikan-peserta', [
            'peserta' => $peserta->pesertas[0],
            'web' => [
                'title' => 'Verifikator Panel',
                'desc' => 'Manajament Peserta',
            ],
        ]);
    }
}
