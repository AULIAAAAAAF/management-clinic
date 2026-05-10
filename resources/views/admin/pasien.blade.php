@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Daftar Pasien</h1>

<div class="bg-white rounded-2xl shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr class="text-left">
                <th class="p-4">Nama</th>
                <th class="p-4">Email</th>
                <th class="p-4">NIK</th>
                <th class="p-4">Jenis Kelamin</th>
                <th class="p-4">No. Telp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasiens as $pasien)
            <tr class="border-b">
                <td class="p-4">{{ $pasien->user->name }}</td>
                <td class="p-4">{{ $pasien->user->email }}</td>
                <td class="p-4">{{ $pasien->nik }}</td>
                <td class="p-4">{{ $pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td class="p-4">{{ $pasien->no_telp ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection