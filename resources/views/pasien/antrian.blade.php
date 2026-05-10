@extends('layouts.pasien')

@section('content')
<h1 class="text-3xl font-bold mb-6">🧾 Status Antrian</h1>

@if($antrians->count() > 0)
    <div class="space-y-4">
        @foreach($antrians as $antrian)
            <div class="bg-white p-6 rounded-2xl shadow">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-2xl font-bold text-blue-600">Nomor: {{ $antrian->nomor_antrian }}</p>
                        <p class="text-gray-600">{{ $antrian->booking->dokter->nama }}</p>
                        <p class="text-sm text-gray-400">{{ $antrian->booking->tanggal_booking->format('d M Y H:i') }}</p>
                    </div>
                    <div class="text-right">
                        <span class="px-4 py-2 rounded-full text-sm font-bold
                            @if($antrian->status == 'waiting') bg-yellow-100 text-yellow-800
                            @elseif($antrian->status == 'called') bg-blue-100 text-blue-800
                            @elseif($antrian->status == 'completed') bg-green-100 text-green-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($antrian->status) }}
                        </span>
                        @if($antrian->waktu_panggil)
                            <p class="text-sm text-gray-500 mt-1">Dipanggil: {{ $antrian->waktu_panggil->format('H:i') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="bg-white p-6 rounded-2xl shadow">
        <p class="text-gray-500">Belum ada antrian</p>
    </div>
@endif
@endsection