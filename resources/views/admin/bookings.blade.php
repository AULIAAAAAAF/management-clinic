@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Semua Booking</h1>

<div class="bg-white rounded-2xl shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr class="text-left">
                <th class="p-4">Pasien</th>
                <th class="p-4">Dokter</th>
                <th class="p-4">Tanggal</th>
                <th class="p-4">Keluhan</th>
                <th class="p-4">Status</th>
                <th class="p-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr class="border-b">
                <td class="p-4">{{ $booking->pasien->user->name }}</td>
                <td class="p-4">{{ $booking->dokter->nama }}</td>
                <td class="p-4">{{ $booking->tanggal_booking->format('d M Y H:i') }}</td>
                <td class="p-4">{{ $booking->keluhan ?? '-' }}</td>
                <td class="p-4">
                    <span class="px-2 py-1 rounded text-sm
                        @if($booking->status == 'pending') bg-yellow-100 text-yellow-800
                        @elseif($booking->status == 'confirmed') bg-blue-100 text-blue-800
                        @elseif($booking->status == 'completed') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ ucfirst($booking->status) }}
                    </span>
                </td>
                <td class="p-4">
                    @if($booking->status == 'pending')
                    <a href="/admin/bookings/{{ $booking->id }}/confirmed" class="text-blue-600 hover:underline">Konfirmasi</a>
                    @endif
                    @if($booking->status == 'confirmed')
                    <a href="/admin/bookings/{{ $booking->id }}/completed" class="text-green-600 hover:underline">Selesai</a>
                    @endif
                    @if(in_array($booking->status, ['pending', 'confirmed']))
                    | <a href="/admin/bookings/{{ $booking->id }}/cancelled" class="text-red-600 hover:underline">Batal</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection