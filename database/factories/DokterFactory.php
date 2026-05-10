<?php

namespace Database\Factories;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Factories\Factory;

class DokterFactory extends Factory
{
    protected $model = Dokter::class;

    public function definition(): array
    {
        return [
            'nama' => 'Dr. ' . $this->faker->name(),
            'spesialis' => $this->faker->randomElement(['Umum', 'Gigi', 'Anak', 'Kandungan', 'Penyakit Dalam']),
            'no_telp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
        ];
    }
}