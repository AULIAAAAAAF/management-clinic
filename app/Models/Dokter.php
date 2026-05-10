<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';

    protected $fillable = [
        'nama',
        'spesialis',
        'no_telp',
        'alamat',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}