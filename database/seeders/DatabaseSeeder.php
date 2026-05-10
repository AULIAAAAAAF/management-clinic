<?php

namespace Database\Seeders;

use App\Models\Antrian;
use App\Models\Booking;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@clinic.com',
        ]);

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $pasien = Pasien::factory()->create([
            'user_id' => $user->id,
            'nik' => '1234567890123456',
            'tanggal_lahir' => '1995-05-15',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Merdeka No. 10',
            'no_telp' => '081234567890',
        ]);

        $dokters = [
            ['nama' => 'Dr. Ahmad Wijaya', 'spesialis' => 'Umum', 'no_telp' => '081111111111', 'alamat' => 'Klinik Utama'],
            ['nama' => 'Dr. Budi Santoso', 'spesialis' => 'Gigi', 'no_telp' => '081222222222', 'alamat' => 'Klinik Utama'],
            ['nama' => 'Dr. Siti Rahayu', 'spesialis' => 'Anak', 'no_telp' => '081333333333', 'alamat' => 'Klinik Utama'],
            ['nama' => 'Dr. Maria Theresa', 'spesialis' => 'Kandungan', 'no_telp' => '081444444444', 'alamat' => 'Klinik Utama'],
            ['nama' => 'Dr. Hendra Pratama', 'spesialis' => 'Penyakit Dalam', 'no_telp' => '081555555555', 'alamat' => 'Klinik Utama'],
        ];

        foreach ($dokters as $d) {
            Dokter::create($d);
        }

        $booking1 = Booking::create([
            'pasien_id' => $pasien->id,
            'dokter_id' => 1,
            'tanggal_booking' => now()->addDays(1),
            'status' => 'confirmed',
            'keluhan' => 'Demam dan sakit kepala',
        ]);

        Antrian::create([
            'booking_id' => $booking1->id,
            'nomor_antrian' => 1,
            'status' => 'waiting',
        ]);
    }
}