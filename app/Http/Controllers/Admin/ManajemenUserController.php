<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ManajemenUserController extends Controller
{

    public function adminstorepanitia(Request $request)
    {
        $validate = $request->validate(
            [
                'name' => 'required|max:225',
                'username' => 'required|unique:users,username',
                // 'phone' => 'required|numeric|digits_between:10,13|unique:users,phone',
                // 'email' => 'required|email|unique:users,email',
                // 'password' => 'required',
                // 'role' => 'required',
            ],
            [
                'name.required' => 'Nama Lengkap tidak boleh kosong!',
                'name.max' => 'Panjang karakter maksimal untuk Nama Lengkap adalah 225 karakter!',
                'username.required' => 'Username tidak boleh kosong!',
                // 'phone.required' => 'Nomor Telepon tidak boleh kosong!',
                // 'phone.numeric' => 'Nomor Telepon hanya boleh angka!',
                // 'phone.digits' => 'Nomor Telepon harus 10 digit s.d 13 digit!',
                'username.unique' => 'Maaf username : ' . $request->username . ' sudah digunakan, silahkan coba yang lain!',
                // 'email.required' => 'Email tidak boleh kosong!',
                // 'email.email' => 'Format email ' .  $request->email . ' yang anda masukan salah. Contoh format email yang benar seperti ' . $request->username . '@gmail.com',
                // 'email.unique' => 'Maaf email : ' . $request->email . ' sudah digunakan, silahkan coba yang lain!',
                // 'password.required' => 'Password tidak boleh kosong',
                // 'role.required' => 'Role harus di pilih!',
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'username' => str($request->username)->replace(' ', '.'),
            'phone' => fake()->phoneNumber(),
            'phone_verified_at' => now(),
            'email' => fake()->unique()->email(),
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('koordinator');

        return redirect()->back()->with('pesan', 'User Koordinator berhasil di buat');
    }




    /**
     * 
     * 
     * KOORDINATOR
     * 
     * 
     */




    public function koordinatorstorepanitia(Request $request) // KOORDIATOR
    {
        $validate = $request->validate(
            [
                'name' => 'required|max:225',
                'username' => 'required|unique:users,username',
                'phone' => 'required|numeric|digits_between:10,13|unique:users,phone',


                'email' => 'required|email|unique:users,email',
                // 'password' => 'required',
            ],
            [
                'name.required' => 'Nama Lengkap tidak boleh kosong!',
                'name.max' => 'Panjang karakter maksimal untuk Nama Lengkap adalah 225 karakter!',
                'username.required' => 'Username tidak boleh kosong!',
                'phone.required' => 'Nomor Telepon tidak boleh kosong!',
                'phone.numeric' => 'Nomor Telepon hanya boleh angka!',
                'phone.digits' => 'Nomor Telepon harus 10 digit s.d 13 digit!',
                'username.unique' => 'Maaf username : ' . $request->username . ' sudah digunakan, silahkan coba yang lain!',
                'email.required' => 'Email tidak boleh kosong!',
                'email.email' => 'Format email ' .  $request->email . ' yang anda masukan salah. Contoh format email yang benar seperti ' . $request->username . '@gmail.com',
                'email.unique' => 'Maaf email : ' . $request->email . ' sudah digunakan, silahkan coba yang lain!',
                // 'password.required' => 'Password tidak boleh kosong',
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'username' => str($request->username)->replace(' ', '.'),
            'phone' => $request->phone,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('verifikator');

        return redirect()->back()->with('pesan', 'User panitia berhasil dibuat');
    }

    public function koordinatoreditpanitia(Request $request)
    {
        if (!$request->method('get')) {
            return $request->getMethod();
            // return redirect('/koordinator');
        }
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->username = str($request->username)->replace(' ', '.');
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->back()->with('pesan', 'User panitia ' . $user->username . ' berhasil update');
    }






    /**
     * 
     * 
     * GET API FOR USER MODEL
     * 
     */




    public function koordinatorapipanitia(Request $request)
    {
        return $user = User::find($request->id);
    }
}
