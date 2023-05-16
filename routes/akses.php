<?php

use App\Http\Controllers\Akses\AuthenticationSessionController;
use App\Http\Controllers\Akses\EmailVerificationPromptController;
use App\Http\Controllers\Akses\EmailVerificationResendController;
use App\Http\Controllers\Akses\ForgetPasswordController;
use App\Http\Controllers\Akses\RegisterUserController;
use App\Http\Controllers\Akses\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:peserta')->group(function () {
    Route::get('/auth/login', [AuthenticationSessionController::class, 'create'])
        ->name('auth.login');

    Route::post('/auth/login', [AuthenticationSessionController::class, 'store'])->name('auth.dologin');

    Route::get('/auth/forget-password', [ForgetPasswordController::class, 'create'])
        ->name('auth.forget.password');

    Route::post('/auth/forget-password', [ForgetPasswordController::class, 'sendtoken']);
});

Route::middleware('auth:peserta')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['auth', 'signed'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationResendController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::post('/auth/logout', [AuthenticationSessionController::class, 'destroy'])->name('auth.logout');
});


Route::controller(RegisterUserController::class)->middleware(['guest:peserta'])->group(function () {
    Route::get('/auth/register', 'home')->name('auth.register.home');
    Route::post('/auth/store/user', 'storeuser')->name('auth.user.storeuser');
});
