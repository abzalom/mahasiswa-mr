<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->middleware(['auth:peserta,web', 'verified'])->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/admin', 'admin')->name('admin');
    Route::get('/koordinator', 'koordinator')->name('koordinator');
    Route::get('/verifikator', 'verifikator')->name('verifikator');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/coba/factory', 'cobafactory')->name('coba');
    Route::get('/coba/chatgpt', 'chatgpt')->name('coba.chatgpt');
});

Route::get('/home', function () {
    return redirect('/peserta/dashboard');
})->middleware(['auth:peserta', 'verified']);

Route::get('/peserta', function () {
    return redirect('/peserta/dashboard');
})->middleware(['auth:peserta', 'verified']);

Route::get('/register', function () {
    return redirect('/auth/register');
})->middleware(['guest:peserta']);
