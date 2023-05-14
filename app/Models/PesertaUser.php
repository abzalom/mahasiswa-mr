<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PesertaUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get the peserta associated with the PesertaUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function peserta(): HasOne
    {
        return $this->hasOne(Peserta::class, 'id', 'peserta_id');
    }

    /**
     * Get all of the verified for the PesertaUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function verified(): HasMany
    {
        return $this->hasMany(Verified::class, 'peserta_user_id', 'id');
    }
}
