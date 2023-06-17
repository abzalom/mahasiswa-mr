<?php

use App\Http\Controllers\Configs\AppController;
use App\Http\Controllers\Peserta\PesertaController;
use App\Http\Controllers\Peserta\UploadBerkasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth:web,peserta'])->group(function () {
    Route::post('/config/app/session/tahun', [AppController::class, 'sessiontahun']);
});

Route::controller(PesertaController::class)->middleware(['auth:peserta', 'verified', 'role:peserta'])->group(function () {
    // GET
    Route::get('/peserta/dashboard', 'dashboard')->name('peserta.dashboard');
    Route::get('/peserta/create/formulir/biodata', 'createbiodata')->name('peserta.create.formulir.biodata');
    Route::get('/peserta/create/formulir/tambahan', 'createdatatambahan')->name('peserta.create.formulir.tambahan');
    Route::get('/peserta/create/formulir/kontak', 'createdatakontak')->name('peserta.create.formulir.kontak');
    Route::get('/peserta/create/formulir/rekening', 'createdatarekening')->name('peserta.create.formulir.rekening');
    Route::post('/peserta/kirim/formulir', 'krimberkas')->name('peserta.kirim.formulir');

    // UPDATE
    Route::post('/peserta/update/formulir/biodata', 'updatebiodata')->name('peserta.update.formulir.biodata');
    Route::post('/peserta/update/formulir/tambahan', 'updatetambahan')->name('peserta.update.formulir.tambahan');
    Route::post('/peserta/update/formulir/kontak', 'updatekontak')->name('peserta.update.formulir.kontak');
    Route::post('/peserta/update/formulir/rekening', 'updaterekening')->name('peserta.update.formulir.rekening');
});

Route::controller(UploadBerkasController::class)->middleware(['auth:peserta', 'verified', 'role:peserta'])->group(function () {
    // UPLOAD PERSYARATAN
    Route::post('/peserta/upload/berkas/foto', 'uploadfoto')->name('peserta.upload.berkas.foto');
    Route::post('/peserta/upload/berkas/ktp', 'uploadktp')->name('peserta.upload.berkas.ktp');
    Route::post('/peserta/upload/berkas/kk', 'uploadkk')->name('peserta.upload.berkas.kk');
    Route::post('/peserta/upload/berkas/kpm', 'uploadkpm')->name('peserta.upload.berkas.kpm');
    Route::post('/peserta/upload/berkas/khs', 'uploadkhs')->name('peserta.upload.berkas.khs');
    Route::post('/peserta/upload/berkas/krs', 'uploadkrs')->name('peserta.upload.berkas.krs');
    Route::post('/peserta/upload/berkas/surat', 'uploadsurat')->name('peserta.upload.berkas.surat');
    Route::post('/peserta/upload/berkas/kwitansi', 'uploadkwitansi')->name('peserta.upload.berkas.kwitansi');
    Route::post('/peserta/upload/berkas/dikti', 'uploaddikti')->name('peserta.upload.berkas.dikti');
});


require __DIR__ . '/api.php';
require __DIR__ . '/redirect.php';
require __DIR__ . '/akses.php';
require __DIR__ . '/panitia.php';
