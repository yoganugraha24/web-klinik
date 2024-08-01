<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nicolaslopezj\Searchable\SearchableTrait;


class Daftar extends Model
{
    use SearchableTrait;
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = [
    //         'tanggal_daftar',
    //         'pasien_id',
    //         'poli_id',
    //         'keluhan'
    //     ];
    protected $searchable = [
        'columns' => [
            'pasiens.nama' => 1,
            'pasiens.no_pasien' => 1,
            'polis.nama' => 1,
        ],
        'joins' => [
            'pasiens' => ['pasiens.id', 'daftars.pasien_id'],
            'polis' => ['polis.id', 'daftars.poli_id'],
        ],
    ];

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
     * Get the pasien that owns the Daftar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class)->withDefault();
    }
    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class)->withDefault();
    }
}