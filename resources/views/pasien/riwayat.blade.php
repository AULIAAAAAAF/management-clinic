@extends('layouts.pasien')

@section('content')
<h1 class="text-3xl font-bold mb-6">📖 Riwayat Konsultasi</h1>

@if($bookings->count() > 0)
    <div class="space-y-4">
        @foreach($bookings as $booking)
            <div class="bg-white p-6 rounded-2xl shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-lg font-bold text-blue-600">{{ $booking->dokter->nama }}</p>
                        <p class="text-gray-600">{{ $booking->dokter->spesialis }}</p>
                        <p class="text-sm text-gray-400 mt-1">
                            📅 {{ $booking->tanggal_booking->format('d M Y H:i') }}
                        </p>
                        @if($booking->keluhan)
                            <p class="text-sm text-gray-500 mt-2">Keluhan: {{ $booking->keluhan }}</p>
                        @endif
                    </div>
                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-bold">
                        Selesai
                    </span>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="bg-white p-6 rounded-2xl shadow">
        <p class="text-gray-500">Belum ada riwayat konsultasi</p>
    </div>
@endif
@endsection