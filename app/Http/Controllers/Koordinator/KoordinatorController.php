<?php

namespace App\Http\Controllers\Koordinator;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Models\PesertaUser;
use App\Models\PesertaVerifikator;
use App\Models\Verified;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class KoordinatorController extends Controller
{

    public function dashboard()
    {
        return view('koordinator.koordinator-dashboard', [
            'user' => User::find(auth()->user()->id),
            'web' => [
                'title' => 'Koordinator Panel',
                'desc' => 'Dashboard',
            ],
        ]);
    }

    public function profile()
    {
        return view('koordinator.koordinator-profile', [
            'user' => User::find(auth()->user()->id),
            'web' => [
                'title' => 'Koordinator Panel',
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
            $thumb->resize(128, 128, function ($constraint) {
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

    public function createpanitia()
    {
        $panitias = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['verifikator']);
        })
            // ->with('pesertas')
            ->get();
        // return $panitias;
        return view('koordinator.manajament.koordinator-create-panitia', [
            'user' => User::find(auth()->user()->id),
            'panitias' => $panitias,
            'web' => [
                'title' => 'Koordinator Panel',
                'desc' => 'Panitia',
            ],
        ]);
    }

    public function createverifikator()
    {
        $panitias = User::with('verifikator')->whereHas('roles', function ($q) {
            $q->whereIn('name', ['verifikator']);
        })->get();
        // return $panitias;
        return view('koordinator.manajament.koordinator-create-verifikator', [
            'user' => User::find(auth()->user()->id),
            'panitias' => $panitias,
            'web' => [
                'title' => 'Koordinator Panel',
                'desc' => 'Panitia',
            ],
        ]);
    }

    public function createpeserta()
    {
        $pesertas = Peserta::where('tim', false)->get();
        $panitias = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['verifikator']);
        })->get();
        // return $pesertas;
        return view('koordinator.manajament.koordinator-set-peserta', [
            'user' => User::find(auth()->user()->id),
            'pesertas' => $pesertas,
            'panitias' => $panitias,
            'web' => [
                'title' => 'Koordinator Panel',
                'desc' => 'Panitia',
            ],
        ]);
    }

    public function definepeserta(Request $request)
    {
        // return $request->all();
        $users = User::whereHas('roles', fn ($q) => $q->where('name', 'verifikator'))->get('id');
        $user = User::find($request->id);
        $countPeserta = Peserta::count();
        $pesertas = Peserta::where('tim', false)->limit((int) floor($countPeserta / $users->count()))->get('id');
        $no = 1;
        $count = '';
        foreach ($pesertas as $peserta) {
            $verified = Verified::find($peserta->id);
            if ($verified) {
                $verified->delete();
            }
            PesertaUser::create([
                'user_id' => $request->id,
                'peserta_id' => $peserta->id,
            ]);
            $peserta->tim = true;
            $peserta->save();
            $count = $no++;
        }
        return redirect()->back()->with('pesan', 'Peserta sejumlah ' . $count . ' telah ditambahkan ke User ' . $user->username);
    }

    public function savepeserta(Request $request): RedirectResponse
    {
        $peserta = Peserta::find($request->pesertaid);
        PesertaUser::where('peserta_id',  $request->pesertaid)->whereIn('user_id', $request->userid)->delete();
        foreach ($request->userid as $user) {
            PesertaUser::create([
                'user_id' => $user,
                'peserta_id' => $request->pesertaid,
            ]);
        }
        $peserta->tim = true;
        $peserta->save();
        return redirect()->back()->with('pesan', 'User dan Verifikator berhasil di update');
    }
}
