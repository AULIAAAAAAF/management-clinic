<?php

namespace Database\Factories;

use App\Models\Antrian;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class AntrianFactory extends Factory
{
    protected $model = Antrian::class;

    public function definition(): array
    {
        return [
            'booking_id' => Booking::factory(),
            'nomor_antrian' => $this->faker->numberBetween(1, 20),
            'status' => $this->faker->randomElement(['waiting', 'called', 'completed', 'skipped']),
            'waktu_panggil' => $this->faker->time(),
        ];
    }
}