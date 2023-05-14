<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\PesertaVerifikator;
use App\Models\User;
use App\Models\Verified;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        if ($user) {
            if ($user->hasRole(['admin'])) {
                return redirect('/admin/dashboard');
            }
            if ($user->hasRole(['koordinator'])) {
                return redirect('/koordinator/dashboard');
            }
            if ($user->hasRole(['verifikator'])) {
                return redirect('/verifikator/dashboard');
            }
        }
        $peserta = Peserta::find(auth()->user()->id);
        if ($peserta) {
            if ($peserta->hasRole(['peserta'])) {
                return redirect('/peserta/dashboard');
            }
        }
    }

    public function admin()
    {
        $user = User::find(auth()->user()->id);
        if ($user->hasRole(['admin'])) {
            return redirect('/admin/dashboard');
        }
        if ($user->hasRole(['koordinator'])) {
            return redirect('/koordinator/dashboard');
        }
        if ($user->hasRole(['verifikator'])) {
            return redirect('/verifikator/dashboard');
        }
        if ($user->hasRole(['peserta'])) {
            return redirect('/peserta/dashboard');
        }
    }

    public function koordinator()
    {
        $user = User::find(auth()->user()->id);
        if ($user->hasRole(['admin'])) {
            return redirect('/admin/dashboard');
        }
        if ($user->hasRole(['koordinator'])) {
            return redirect('/koordinator/dashboard');
        }
        if ($user->hasRole(['verifikator'])) {
            return redirect('/verifikator/dashboard');
        }
        if ($user->hasRole(['peserta'])) {
            return redirect('/peserta/dashboard');
        }
    }

    public function verifikator()
    {
        $user = User::find(auth()->user()->id);
        if ($user->hasRole(['admin'])) {
            return redirect('/admin/dashboard');
        }
        if ($user->hasRole(['koordinator'])) {
            return redirect('/koordinator/dashboard');
        }
        if ($user->hasRole(['verifikator'])) {
            return redirect('/verifikator/dashboard');
        }
        if ($user->hasRole(['peserta'])) {
            return redirect('/peserta/dashboard');
        }
    }

    public function cobafactory()
    {
        $user = User::whereHas('roles', fn ($q) => $q->where('name', 'verifikator'))->get();
        $peserta = Peserta::where('tim', false);
        $verifikator = User::find(5);

        $peserta = $peserta->limit((int) floor($peserta->get()->count() / $user->count()))->get('id');

        foreach ($peserta as $value) {
            Verified::create([
                'user_id' => $verifikator->id,
                'peserta_id' => $value->id,
            ]);
            $value->tim = true;
            $value->save();
        }

        dump(Verified::get()->toArray());
    }

    public function chatgpt()
    {
        return view('test.chatgpt');
    }
}
