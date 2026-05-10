<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'tanggal_booking',
        'status',
        'keluhan',
    ];

    protected $casts = [
        'tanggal_booking' => 'datetime',
    ];

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class);
    }

    public function antrian(): HasOne
    {
        return $this->hasOne(Antrian::class);
    }
}