@extends('layouts.pasien')

@section('content')
<h1 class="text-3xl font-bold mb-6">🧾 Status Antrian</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500">Nomor Antrian Anda</h2>
        <p class="text-4xl font-bold text-green-600 mt-2">A-07</p>
        <p class="text-gray-400 mt-1">Mohon menunggu panggilan dokter</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500">Status Saat Ini</h2>
        <p class="text-2xl font-bold text-yellow-500 mt-2">Menunggu giliran</p>
        <p class="text-gray-400 mt-1">Estimasi 10-15 menit</p>
    </div>

</div>

<div class="mt-6 bg-white p-6 rounded-2xl shadow">
    <h2 class="font-bold mb-3">Antrian Hari Ini</h2>
    <ul class="space-y-2 text-gray-600">
        <li>A-05 - Sudah diperiksa</li>
        <li>A-06 - Sedang diperiksa</li>
        <li class="font-bold text-green-600">A-07 - Giliran Anda</li>
        <li>A-08 - Menunggu</li>
    </ul>
</div>
@endsection