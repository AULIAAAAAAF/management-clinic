@extends('layouts.pasien')

@section('content')
<h1 class="text-4xl font-bold text-blue-600">Dashboard Pasien</h1>
<p class="text-gray-600 mt-2">Ringkasan aktivitas klinik Anda hari ini</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500">Total Booking</h2>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $bookings->count() }}</p>
        <p class="text-sm text-gray-400">Booking aktif</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500">Nomor Antrian</h2>
        <p class="text-3xl font-bold text-green-600 mt-2">{{ $antrian ? $antrian->nomor_antrian : '-' }}</p>
        <p class="text-sm text-gray-400">{{ $antrian ? $antrian->status : 'Tidak ada antrian' }}</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500">Status Konsultasi</h2>
        <p class="text-2xl font-bold text-purple-600 mt-2">
            {{ $activeBooking ? ucfirst($activeBooking->status) : 'Belum ada booking' }}
        </p>
        <p class="text-sm text-gray-400">
            {{ $activeBooking && $activeBooking->dokter ? $activeBooking->dokter->nama : '-' }}
        </p>
    </div>

</div>

<div class="mt-8 bg-white p-6 rounded-2xl shadow">
    <h2 class="text-lg font-bold mb-3">Aktivitas Terbaru</h2>
    @if($bookings->count() > 0)
        <ul class="space-y-2 text-gray-600">
            @foreach($bookings->take(5) as $booking)
                <li>
                    @if($booking->status == 'completed')
                        ✔
                    @elseif($booking->status == 'confirmed')
                        📅
                    @else
                        ⏳
                    @endif
                    Booking ke {{ $booking->dokter->nama }} - {{ ucfirst($booking->status) }}
                    ({{ $booking->tanggal_booking->format('d M Y') }})
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500">Belum ada aktivitas</p>
    @endif
</div>
@endsection