@extends('layouts.pasien')

@section('content')
<h1 class="text-3xl font-bold mb-6">📅 Booking Jadwal</h1>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

<div class="bg-white p-6 rounded-2xl shadow">

    <form action="/pasien/booking" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @csrf

        <div>
            <label class="text-sm text-gray-600">Tanggal Konsultasi</label>
            <input type="datetime-local" name="tanggal_booking" class="w-full border p-2 rounded-lg" required>
        </div>

        <div>
            <label class="text-sm text-gray-600">Pilih Dokter</label>
            <select name="dokter_id" class="w-full border p-2 rounded-lg" required>
                <option value="">-- Pilih Dokter --</option>
                @foreach($dokters as $dokter)
                    <option value="{{ $dokter->id }}">{{ $dokter->nama }} - {{ $dokter->spesialis }}</option>
                @endforeach
            </select>
        </div>

        <div class="md:col-span-2">
            <label class="text-sm text-gray-600">Keluhan</label>
            <textarea name="keluhan" class="w-full border p-2 rounded-lg" rows="3" placeholder="Contoh: demam, sakit kepala"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white py-2 rounded-lg md:col-span-2 mt-2 hover:bg-blue-700">
            Booking Sekarang
        </button>
    </form>

</div>
@endsection