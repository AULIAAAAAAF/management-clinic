<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        return [
            'pasien_id' => Pasien::factory(),
            'dokter_id' => Dokter::factory(),
            'tanggal_booking' => $this->faker->dateTimeBetween('now', '+1 month'),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'completed', 'cancelled']),
            'keluhan' => $this->faker->sentence(),
        ];
    }
}