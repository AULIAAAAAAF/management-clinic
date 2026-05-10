@extends('layouts.pasien')

@section('content')
<h1 class="text-3xl font-bold mb-6">📅 Booking Jadwal</h1>

<div class="bg-white p-6 rounded-2xl shadow">

    <form class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div>
            <label class="text-sm text-gray-600">Nama Pasien</label>
            <input type="text" class="w-full border p-2 rounded-lg" placeholder="Masukkan nama">
        </div>

        <div>
            <label class="text-sm text-gray-600">Tanggal Konsultasi</label>
            <input type="date" class="w-full border p-2 rounded-lg">
        </div>

        <div>
            <label class="text-sm text-gray-600">Pilih Dokter</label>
            <select class="w-full border p-2 rounded-lg">
                <option>Dokter Umum</option>
                <option>Dokter Gigi</option>
                <option>Dokter Anak</option>
            </select>
        </div>

        <div>
            <label class="text-sm text-gray-600">Keluhan</label>
            <input type="text" class="w-full border p-2 rounded-lg" placeholder="Contoh: demam, sakit kepala">
        </div>

        <button class="bg-blue-600 text-white py-2 rounded-lg md:col-span-2 mt-2">
            Booking Sekarang
        </button>

    </form>

</div>
@endsection