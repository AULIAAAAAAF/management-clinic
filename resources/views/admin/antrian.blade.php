@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Kelola Antrian Hari Ini</h1>

<div class="space-y-4">
    @forelse($antrians as $antrian)
    <div class="bg-white p-6 rounded-2xl shadow flex justify-between items-center">
        <div>
            <p class="text-2xl font-bold text-blue-600">Nomor: {{ $antrian->nomor_antrian }}</p>
            <p class="text-gray-600">{{ $antrian->booking->pasien->user->name }}</p>
            <p class="text-gray-500">{{ $antrian->booking->dokter->nama }} - {{ $antrian->booking->dokter->spesialis }}</p>
            @if($antrian->booking->keluhan)
                <p class="text-sm text-gray-400 mt-1">Keluhan: {{ $antrian->booking->keluhan }}</p>
            @endif
        </div>
        <div class="text-right">
            <span class="px-4 py-2 rounded-full text-sm font-bold mb-2 block
                @if($antrian->status == 'waiting') bg-yellow-100 text-yellow-800
                @elseif($antrian->status == 'called') bg-blue-100 text-blue-800
                @elseif($antrian->status == 'completed') bg-green-100 text-green-800
                @else bg-gray-100 text-gray-800 @endif">
                {{ ucfirst($antrian->status) }}
            </span>
            @if($antrian->waktu_panggil)
                <p class="text-sm text-gray-500">Dipanggil: {{ $antrian->waktu_panggil->format('H:i') }}</p>
            @endif
            <div class="mt-2 space-x-2">
                @if($antrian->status == 'waiting')
                <a href="/admin/antrian/{{ $antrian->id }}/panggil" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Panggil</a>
                @endif
                @if($antrian->status == 'called')
                <a href="/admin/antrian/{{ $antrian->id }}/selesai" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Selesai</a>
                @endif
                @if($antrian->status != 'completed')
                <a href="/admin/antrian/{{ $antrian->id }}/skip" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Lewati</a>
                @endif
            </div>
        </div>
    </div>
    @empty
    <div class="bg-white p-6 rounded-2xl shadow">
        <p class="text-gray-500">Belum ada antrian hari ini</p>
    </div>
    @endforelse
</div>
@endsection