@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500">Total Pasien</h2>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalPasien }}</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500">Total Dokter</h2>
        <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalDokter }}</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500">Total Booking</h2>
        <p class="text-3xl font-bold text-purple-600 mt-2">{{ $totalBooking }}</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500">Antrian Aktif</h2>
        <p class="text-3xl font-bold text-yellow-600 mt-2">{{ $totalAntrian }}</p>
    </div>
</div>

<div class="mt-8 bg-white p-6 rounded-2xl shadow">
    <h2 class="text-lg font-bold mb-4">Booking Terbaru</h2>
    <table class="w-full">
        <thead>
            <tr class="border-b text-left">
                <th class="p-2">Pasien</th>
                <th class="p-2">Dokter</th>
                <th class="p-2">Tanggal</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentBookings as $booking)
            <tr class="border-b">
                <td class="p-2">{{ $booking->pasien->user->name }}</td>
                <td class="p-2">{{ $booking->dokter->nama }}</td>
                <td class="p-2">{{ $booking->tanggal_booking->format('d M Y H:i') }}</td>
                <td class="p-2">
                    <span class="px-2 py-1 rounded text-sm
                        @if($booking->status == 'pending') bg-yellow-100 text-yellow-800
                        @elseif($booking->status == 'confirmed') bg-blue-100 text-blue-800
                        @elseif($booking->status == 'completed') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ ucfirst($booking->status) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection