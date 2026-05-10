@extends('layouts.pasien')

@section('content')
<h1 class="text-3xl font-bold mb-6">📖 Riwayat Konsultasi</h1>

<div class="bg-white p-6 rounded-2xl shadow">

    <table class="w-full text-left">
        <thead>
            <tr class="border-b text-gray-500">
                <th class="p-2">Tanggal</th>
                <th class="p-2">Dokter</th>
                <th class="p-2">Keluhan</th>
                <th class="p-2">Hasil</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b">
                <td class="p-2">10-05-2026</td>
                <td class="p-2">Dr. Andi</td>
                <td class="p-2">Demam</td>
                <td class="p-2 text-green-600">Selesai</td>
            </tr>
            <tr class="border-b">
                <td class="p-2">02-05-2026</td>
                <td class="p-2">Dr. Sari</td>
                <td class="p-2">Sakit gigi</td>
                <td class="p-2 text-green-600">Selesai</td>
            </tr>
        </tbody>
    </table>

</div>
@endsection