<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        $antrians = Antrian::with(['booking.pasien.user', 'booking.dokter'])->get();
        return response()->json($antrians);
    }

    public function show(Antrian $antrian)
    {
        return response()->json($antrian->load(['booking.pasien.user', 'booking.dokter']));
    }

    public function update(Request $request, Antrian $antrian)
    {
        $validated = $request->validate([
            'status' => 'sometimes|in:waiting,called,completed,skipped',
            'waktu_panggil' => 'nullable',
        ]);

        if ($request->status === 'called' && !$antrian->waktu_panggil) {
            $validated['waktu_panggil'] = now();
        }

        $antrian->update($validated);
        return response()->json($antrian);
    }

    public function getNextAntrian($dokterId)
    {
        $antrian = Antrian::whereHas('booking', function ($q) use ($dokterId) {
            $q->where('dokter_id', $dokterId)->where('status', 'confirmed');
        })->where('status', 'waiting')
          ->orderBy('nomor_antrian')
          ->first();

        return response()->json($antrian);
    }
}