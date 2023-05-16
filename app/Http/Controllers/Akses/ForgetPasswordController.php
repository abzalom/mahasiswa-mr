<?php

namespace App\Http\Controllers\Akses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgetPasswordController extends Controller
{
    public function create()
    {
        return view('akses.forget-password');
    }

    public function sendtoken(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:peserta,email'
            ],
            [
                'email.required' => 'Email tidak boleh kosong!',
                'email.email' => 'Format email salah!',
                'email.exists' => 'Email tidak ditemukan!',
            ]
        );

        $status = Password::sendResetLink(
            $request->only('email')
        );
    }
}
