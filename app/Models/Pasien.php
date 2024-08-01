<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pasien extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get all of the daftar for the Pasien
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function daftar(): HasMany
    {
        return $this->hasMany(Daftar::class);
    }

    /**
     * Get all of the daftar for the Pasien
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class);
    }
    /**
     * Get all of the daftar for the Pasien
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class);
    }
}