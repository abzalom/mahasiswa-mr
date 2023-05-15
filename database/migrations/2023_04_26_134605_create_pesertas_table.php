<?php

use App\Models\Bank;
use App\Models\JalurMasuk;
use App\Models\JenisPt;
use App\Models\Jenjang;
use App\Models\KabKota;
use App\Models\Provinsi;
use App\Models\Semester;
use App\Models\StatusAwalMahasiswa;
use App\Models\StatusMahasiswa;
use App\Models\UserPeserta;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();

            // Komponent Asset terhubung dengan Table Users
            // $table->foreignIdFor(UserPeserta::class);

            // Login Peserta
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->rememberToken();
            $table->boolean('terms');


            // Informasi Kontak
            $table->text('adress')->nullable();
            $table->foreignIdFor(Provinsi::class)->nullable();
            $table->foreignIdFor(KabKota::class)->nullable();
            $table->integer('kode_pos')->nullable();


            // File Directory
            $table->string('directory')->nullable();
            $table->string('file_name')->nullable();

            // Informasi Diri
            $table->text('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->timestamp('tanggal_lahir')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('nik')->nullable()->unique();

            // Informasi Pendidikan
            $table->string('nim')->nullable()->unique();
            $table->string('nama_pt')->nullable();
            $table->foreignIdFor(JenisPt::class)->nullable();
            $table->string('fakultas')->nullable();
            $table->string('prody')->nullable();
            $table->foreignIdFor(Semester::class)->nullable();
            $table->foreignIdFor(Jenjang::class)->nullable();
            $table->timestamp('tanggal_masuk')->nullable();
            $table->foreignIdFor(JalurMasuk::class)->nullable();
            $table->foreignIdFor(StatusAwalMahasiswa::class)->nullable();
            $table->foreignIdFor(StatusMahasiswa::class)->nullable();


            // Informasi Keluarga
            $table->string('nomor_kk')->nullable();
            // Data Ayah
            $table->string('nama_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->tinyInteger('status_ayah')->nullable();
            $table->tinyInteger('pekerjaan_ayah')->nullable();
            $table->tinyInteger('penghasilan_ayah')->nullable();
            $table->string('keterangan_ayah')->nullable();
            // Data Ibu
            $table->string('nama_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->tinyInteger('status_ibu')->nullable();
            $table->tinyInteger('pekerjaan_ibu')->nullable();
            $table->tinyInteger('penghasilan_ibu')->nullable();
            $table->string('keterangan_ibu')->nullable();

            // Informasi Pembayaran
            $table->string('nama_rekening')->nullable();
            $table->bigInteger('norek')->nullable();
            $table->foreignIdFor(Bank::class)->nullable();
            $table->text('cabang')->nullable();
            $table->string('foto_rekening')->nullable();

            // Persyaratan Peserta
            $table->string('foto_peserta')->nullable()->default('foto_peserta');
            $table->string('file_ktp')->nullable()->default('file_ktp');
            $table->string('file_kk')->nullable()->default('file_kk');
            $table->string('file_kpm')->nullable()->default('file_kpm');
            $table->string('file_khs')->nullable()->default('file_khs');
            $table->string('file_krs')->nullable()->default('file_krs');
            $table->string('file_surat_aktif')->nullable()->default('file_surat_aktif');
            $table->string('foto_kwitansi')->nullable()->default('foto_kwitansi');
            $table->string('foto_dikti')->nullable()->default('foto_dikti');

            $table->boolean('kirim')->default(false);
            $table->boolean('tim')->default(false);
            $table->text('keterangan')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
