<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Peserta extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;
    // use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;

    protected $guard_name = ['peserta'];

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_lahir' => 'datetime',
        'tanggal_masuk' => 'datetime',
        'kirim' => 'boolean',
        'tim' => 'boolean',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * 
     * GET PHOTO PROFILE
     * 
     */
    public function thumbnail(): string
    {
        if (file_exists(public_path('data/' . $this->directory . '/foto_peserta/' . $this->foto_peserta))) {
            return asset('data/' . $this->directory . '/foto_peserta/' . $this->foto_peserta);
        } else {
            return  asset('/assets/img/side_bar_icon.svg');
        }
        // if (Storage::disk('data')->exists('/' . $this->directory . '/thumbnails/' . $this->image)) {
        //     return asset('data/' . $this->directory . '/thumbnails/' . $this->image);
        // } else {
        //     return  asset('/assets/img/side_bar_icon.svg');
        // }
    }

    public function photo(): string
    {
        if (file_exists(public_path('data/' . $this->directory . '/foto_peserta/' . $this->foto_peserta))) {
            return asset('data/' . $this->directory . '/foto_peserta/' . $this->foto_peserta);
        } else {
            return  asset('/assets/img/side_bar_icon.svg');
        }
        // if (Storage::disk('data')->exists($this->directory . '/foto_peserta/' . $this->foto_peserta)) {
        //     return asset('data/' . $this->directory . '/foto_peserta/' . $this->foto_peserta);
        // } else {
        //     return  asset('/assets/img/side_bar_icon.svg');
        // }
    }

    public function checkPersyaratan($dir, $subdir, $file)
    {
        if (file_exists(public_path('data/' . $dir . '/' . $subdir . '/' . $file))) {
            return true;
        } else {
            return false;
        }
    }

    public function validasiPersyaratan()
    {
        $return = false;
        if (
            file_exists(public_path('data/' . $this->directory . '/rekening/' . $this->foto_rekening))
            and
            file_exists(public_path('data/' . $this->directory . '/foto_peserta/' . $this->foto_peserta))
            and
            file_exists(public_path('data/' . $this->directory . '/file_ktp/' . $this->file_ktp))
            and
            file_exists(public_path('data/' . $this->directory . '/file_kk/' . $this->file_kk))
            and
            file_exists(public_path('data/' . $this->directory . '/file_kpm/' . $this->file_kpm))
            and
            file_exists(public_path('data/' . $this->directory . '/file_khs/' . $this->file_khs))
            and
            file_exists(public_path('data/' . $this->directory . '/file_krs/' . $this->file_krs))
            and
            file_exists(public_path('data/' . $this->directory . '/file_surat_aktif/' . $this->file_surat_aktif))
            and
            file_exists(public_path('data/' . $this->directory . '/foto_kwitansi/' . $this->foto_kwitansi))
            and
            file_exists(public_path('data/' . $this->directory . '/foto_dikti/' . $this->foto_dikti))
        ) {
            $return = true;
        }
        return $return;
    }

    /**
     * Get the user associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function user(): HasOneThrough
    {
        return $this->hasOneThrough(User::class, PesertaUser::class, 'foreign_key', 'local_key');
    }

    /**
     * Get the verified associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function verified(): HasManyThrough
    {
        return $this->hasManyThrough(Verified::class, PesertaUser::class, 'peserta_id', 'peserta_user_id');
    }

    public function getVerifikasiAttribute()
    {
        return $this->verified->last();
    }

    /**
     * Get the jenispt associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jenispt(): HasOne
    {
        return $this->hasOne(JenisPt::class, 'id', 'jenis_pt_id');
    }

    /**
     * Get the semester associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function semester(): HasOne
    {
        return $this->hasOne(Semester::class, 'id', 'semester_id');
    }

    /**
     * Get the jenjang associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jenjang(): HasOne
    {
        return $this->hasOne(Jenjang::class, 'id', 'jenjang_id');
    }

    /**
     * Get the jalur associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jalur(): HasOne
    {
        return $this->hasOne(JalurMasuk::class, 'id', 'jalur_masuk_id');
    }

    /**
     * Get the status_awal associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status_awal(): HasOne
    {
        return $this->hasOne(StatusAwalMahasiswa::class, 'id', 'status_awal_mahasiswa_id');
    }

    /**
     * Get the status associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status(): HasOne
    {
        return $this->hasOne(StatusMahasiswa::class, 'id', 'status_mahasiswa_id');
    }




    /**
     * 
     * AYAH
     * 
     */




    /**
     * Get the statusAyah associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function statusAyah(): HasOne
    {
        return $this->hasOne(StatusOrtu::class, 'id', 'status_ayah');
    }

    /**
     * Get the pddkanAyah associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pddkanAyah(): HasOne
    {
        return $this->hasOne(Pendidikan::class, 'id', 'pendidikan_ayah');
    }

    /**
     * Get the jobAyah associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jobAyah(): HasOne
    {
        return $this->hasOne(Pekerjaan::class, 'id', 'pekerjaan_ayah');
    }

    /**
     * Get the salAyah associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function salAyah(): HasOne
    {
        return $this->hasOne(Penghasilan::class, 'id', 'penghasilan_ayah');
    }

    /**
     * Get the ketAyah associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ketAyah(): HasOne
    {
        return $this->hasOne(KetOrtu::class, 'id', 'keterangan_ayah');
    }




    /**
     * 
     * IBU
     * 
     */




    /**
     * Get the statusIbu associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function statusIbu(): HasOne
    {
        return $this->hasOne(StatusOrtu::class, 'id', 'status_ibu');
    }

    /**
     * Get the pddkanIbu associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pddkanIbu(): HasOne
    {
        return $this->hasOne(Pendidikan::class, 'id', 'pendidikan_ibu');
    }

    /**
     * Get the jobIbu associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jobIbu(): HasOne
    {
        return $this->hasOne(Pekerjaan::class, 'id', 'pekerjaan_ibu');
    }

    /**
     * Get the salIbu associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function salIbu(): HasOne
    {
        return $this->hasOne(Penghasilan::class, 'id', 'penghasilan_ibu');
    }

    /**
     * Get the ketIbu associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ketIbu(): HasOne
    {
        return $this->hasOne(KetOrtu::class, 'id', 'keterangan_ibu');
    }




    /**
     * 
     * IBU
     * 
     */




    /**
     * Get the kabkota associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kabkota(): HasOne
    {
        return $this->hasOne(KabKota::class, 'id', 'kab_kota_id');
    }

    /**
     * Get the provinsi associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provinsi(): HasOne
    {
        return $this->hasOne(Provinsi::class, 'id', 'provinsi_id');
    }

    /**
     * Get the bank associated with the Peserta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bank(): HasOne
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
}
