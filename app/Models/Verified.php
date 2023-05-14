<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Verified extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        // add other column names here that you want as Carbon Date
    ];

    /**
     * Get the status associated with the Verified
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status(): HasOne
    {
        return $this->hasOne(VerifyStatus::class, 'id', 'verify_status_id');
    }

    /**
     * Get the user that owns the Verified
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the peserta_user that owns the Verified
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function peserta_user(): BelongsTo
    {
        return $this->belongsTo(PesertaUser::class, 'peserta_user_id');
    }
}
