@extends('layouts.pasien')

@section('content')
<h1 class="text-4xl font-bold text-blue-600">Dashboard Pasien</h1>
<p class="text-gray-600 mt-2">Ringkasan aktivitas klinik Anda hari ini</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500">Total Booking</h2>
        <p class="text-3xl font-bold text-blue-600 mt-2">3</p>
        <p class="text-sm text-gray-400">Booking aktif</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500">Nomor Antrian</h2>
        <p class="text-3xl font-bold text-green-600 mt-2">A-07</p>
        <p class="text-sm text-gray-400">Sedang berjalan</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500">Status Konsultasi</h2>
        <p class="text-2xl font-bold text-purple-600 mt-2">Menunggu dokter</p>
        <p class="text-sm text-gray-400">Antrian aktif</p>
    </div>

</div>

<div class="mt-8 bg-white p-6 rounded-2xl shadow">
    <h2 class="text-lg font-bold mb-3">Aktivitas Terbaru</h2>
    <ul class="space-y-2 text-gray-600">
        <li>✔ Booking ke dokter umum berhasil dibuat</li>
        <li>⏳ Anda berada di antrian A-07</li>
        <li>📅 Konsultasi dijadwalkan hari ini</li>
    </ul>
</div>
@endsection