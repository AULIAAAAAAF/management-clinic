@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Daftar Dokter</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($dokters as $dokter)
    <div class="bg-white p-6 rounded-2xl shadow">
        <h3 class="text-lg font-bold text-blue-600">{{ $dokter->nama }}</h3>
        <p class="text-gray-600">{{ $dokter->spesialis }}</p>
        <p class="text-sm text-gray-500 mt-2">{{ $dokter->no_telp }}</p>
        <p class="text-sm text-gray-500">{{ $dokter->alamat }}</p>
        <div class="mt-4 pt-4 border-t">
            <span class="text-sm text-gray-500">Total Booking: </span>
            <span class="font-bold text-blue-600">{{ $dokter->bookings_count }}</span>
        </div>
    </div>
    @endforeach
</div>
@endsection