<?php

namespace Database\Factories;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasienFactory extends Factory
{
    protected $model = Pasien::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'nik' => $this->faker->unique()->numerify('################'),
            'tanggal_lahir' => $this->faker->date('Y-m-d', '-18 years'),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'alamat' => $this->faker->address(),
            'no_telp' => $this->faker->phoneNumber(),
        ];
    }
}