<?php

/*
|--------------------------------------------------------------------------
| HANDLE AKSES UNTUK ROLE ADMIN, KOORDINATOR DAN VERIFIKATOR
|--------------------------------------------------------------------------
|
| Here is where you can register ADMIN ROUTES for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Adminauth\AdminAuthSessionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/admin/login', [AdminAuthSessionController::class, 'login'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthSessionController::class, 'store']);
});
Route::middleware(['auth:web'])->group(function () {
    Route::post('/admin/logout', [AdminAuthSessionController::class, 'destroy'])->name('admin.logout');
    // Route::get('/panitia', [AdminController::class, 'index']);
});
