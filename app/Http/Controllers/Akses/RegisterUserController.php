<?php

namespace App\Http\Controllers\Akses;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{

    public function home()
    {
        return view('akses.register');
    }

    public function storeuser(Request $request)
    {
        // return $request->all();
        if ($request->validate(
            [
                'name' => 'required|max:225',
                'username' => 'required|min:6|unique:pesertas,username',
                'email' => 'required|email|unique:pesertas,email',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password',
                'terms' => 'required',
            ],
            [
                'name.required' => 'Nama Lengkap tidak boleh kosong!',
                'name.max' => 'Panjang karakter maksimal untuk Nama Lengkap adalah 225 karakter!',
                'username.required' => 'Username tidak boleh kosong!',
                'username.max' => 'Panjang karakter minimal untuk Username adalah 6 karakter!',
                'username.unique' => 'Maaf username ini sudah digunakan, silahkan coba yang lain!',
                'email.required' => 'Email tidak boleh kosong!',
                'email.email' => 'Format email ' .  $request->email . ' yang anda masukan salah. Contoh format email yang benar seperti ' . $request->username . '@gmail.com',
                'email.unique' => 'Maaf email ini sudah digunakan, silahkan coba yang lain!',
                'password.required' => 'Password tidak boleh kosong',
                'password_confirmation.same' => 'Password harus sama',
                'password.min' => 'Panjang karakter minimal untuk password adalah 6 karakter!',
                'terms.required' => 'Anda belum mencentang saya setuju dan tunduk pada aturan. silahkan dibaca dulu sebelum mendaftar!'
            ]
        )) {
            $peserta = Peserta::create([
                'nama' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'terms' => true,
            ]);
            $peserta->directory = 'peserta/peserta_dengan_id_' . $peserta->id;
            $peserta->file_name = '_peserta_dengan_id_' . $peserta->id;
            $peserta->save();
            $peserta->assignRole('peserta');
            event(new Registered($peserta));
            Auth::guard('peserta')->login($peserta);
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
