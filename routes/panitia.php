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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\VerifiedPesertaController;
use App\Http\Controllers\Admin\ManajemenUserController;
use App\Http\Controllers\Koordinator\KoordinatorController;
use App\Http\Controllers\Admin\Config\AdminConfigController;
use App\Http\Controllers\Adminauth\AdminAuthSessionController;
use App\Http\Controllers\Admin\Config\AdminConfigProcessController;

Route::middleware(['guest'])->group(function () {
    Route::get('/admin/login', [AdminAuthSessionController::class, 'login'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthSessionController::class, 'store']);
});
Route::middleware(['auth:web'])->group(function () {
    Route::post('/admin/logout', [AdminAuthSessionController::class, 'destroy'])->name('admin.logout');
    // Route::get('/panitia', [AdminController::class, 'index']);
});


Route::controller(AdminController::class)->middleware(['auth:web', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::post('/admin/profile', 'updateprofile');
    Route::get('/admin/set/panitia', 'createpanitia')->name('admin.set.panitia');
});

Route::controller(AdminConfigController::class)->middleware(['auth:web', 'verified', 'role:admin'])->group(function () {
    // Configurations
    Route::get('/admin/config/roles', 'createroles')->name('admin.config.roles');
    Route::get('/admin/config/banks', 'createbanks')->name('admin.config.banks');
    Route::get('/admin/config/pejabats', 'createpejabats')->name('admin.config.pejabats');
    Route::get('/admin/config/components', 'createcomponents')->name('admin.config.components');
});

Route::controller(AdminConfigProcessController::class)->middleware(['auth:web', 'verified', 'role:admin'])->group(function () {
    Route::post('/admin/config/roles', 'saveroles');
    Route::post('/admin/update/roles', 'updateroles')->name('admin.update.roles');
    Route::post('/admin/destroy/roles', 'destroyroles')->name('admin.destroy.roles');
    Route::post('/admin/config/banks', 'savebanks');
    Route::post('/admin/update/banks', 'updatebanks')->name('admin.update.banks');
    Route::post('/admin/destroy/banks', 'destroybanks')->name('admin.destroy.banks');
    Route::post('/admin/config/pejabats', 'savepejabats');
    Route::post('/admin/update/pejabats', 'updatepejabats')->name('admin.update.pejabats');
    Route::post('/admin/destroy/pejabats', 'destroypejabats')->name('admin.destroy.pejabats');
    Route::post('/admin/config/components', 'savecomponents');
    Route::post('/admin/update/components', 'updatecomponents');
    Route::post('/admin/destroy/components', 'destroycomponents');
    Route::post('/admin/restore/components', 'restorecomponents');
});

Route::controller(ManajemenUserController::class)->middleware(['auth:web', 'verified', 'role:admin|koordinator'])->group(function () {
    Route::post('/admin/set/panitia', 'adminstorepanitia')->name('admin.store.panitia');
    Route::post('/admin/edit/panitia', 'editpanitia')->name('admin.edit.panitia');
    Route::post('/admin/lock/panitia', 'lockpanitia')->name('admin.lock.panitia');
    Route::post('/admin/unlock/panitia', 'unlockpanitia')->name('admin.unlock.panitia');
    // Koordinator
    Route::post('/koordinator/set/panitia', 'koordinatorstorepanitia')->name('koordinator.set.panitia');
    Route::any('/koordinator/edit/panitia', 'koordinatoreditpanitia')->name('koordinator.edit.panitia');
    // API
    Route::post('/koordinator/api/panitia', 'koordinatorapipanitia');
});


Route::controller(KoordinatorController::class)->middleware(['auth:web', 'verified', 'role:koordinator'])->group(function () {
    Route::get('/koordinator/dashboard', 'dashboard')->name('koordinator.dashboard');
    Route::get('/koordinator/profile', 'profile')->name('koordinator.profile');
    Route::post('/koordinator/profile', 'profileupdate');
    Route::get('/koordinator/image', 'image')->name('koordinator.image');
    Route::post('/koordinator/image', 'imageupdate');
    Route::get('/koordinator/set/panitia', 'createpanitia')->name('koordinator.set.panitia');
    Route::get('/koordinator/set/verifikator', 'createverifikator')->name('koordinator.set.verifikator');
    Route::get('/koordinator/atur/peserta', 'createpeserta')->name('koordinator.atur.peserta');
    Route::post('/koordinator/define/peserta', 'definepeserta')->name('koordinator.define.peserta');
    Route::post('/koordinator/atur/peserta', 'savepeserta');

    Route::post('/koordinator/edit/verifikator/peserta', 'editverifikatorpeserta')->name('koordinator.edit.verifikator.peserta');
    Route::post('/koordinator/destroy/verifikator/peserta', 'destroyverifikatorpeserta')->name('koordinator.destroy.verifikator.peserta');
});

Route::controller(VerifikatorController::class)->middleware(['auth:web', 'verified', 'role:verifikator'])->group(function () {
    Route::get('/verifikator', 'index')->name('verifikator.dashboard');
    Route::get('/verifikator/dashboard', 'dashboard')->name('verifikator.dashboard');
    Route::get('/verifikator/profile', 'profile')->name('verifikator.profile');
    Route::post('/verifikator/profile', 'profileupdate');
    Route::get('/verifikator/image', 'image')->name('verifikator.image');
    Route::post('/verifikator/image', 'imageupdate');
    Route::get('/verifikator/manajement/peserta', 'manajementpeserta')->name('verifikator.man.peserta');
    Route::get('/verifikator/manajement/peserta/verifikasi/{id}', 'verifikasipeserta')->name('verifikator.verifikasi.peserta');

    // Perbaikan
    Route::get('/verifikator/manajement/perbaikan', 'manajementperbaikanpeserta')->name('verifikator.manperbaikan.peserta');
    Route::get('/verifikator/manajement/perbaikan/{id}', 'perbaikanpeserta')->name('verifikator.perbaikan.peserta');

    // Perbaikan
    Route::get('/verifikator/manajement/lengkap', 'manajementlengkappeserta')->name('verifikator.manlengkap.peserta');
    Route::get('/verifikator/manajement/lengkap/cetak/{id}', 'cetakpeserta')->name('verifikator.cetak.peserta');
});

Route::controller(VerifiedPesertaController::class)->middleware(['auth:web', 'verified', 'role:verifikator'])->group(function () {
    Route::post('verification/peserta', 'verification')->name('verification.peserta');
    Route::post('verification/perbaikan', 'perbaikanverification')->name('verification.perbaikan');
});

Route::controller(PrintController::class)->middleware(['auth:web', 'verified', 'role:verifikator'])->group(function () {
    Route::get('formulir/cetak/peserta/{id}', 'formulircetak')->name('formulir.cetak.peserta');
});
