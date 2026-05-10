<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienBookingController extends Controller
{
    public function store(Request $request)
    {
        $pasien = Auth::user()->pasien;
        
        if (!$pasien) {
            return back()->with('error', 'Data pasien tidak ditemukan');
        }

        $validated = $request->validate([
            'dokter_id' => 'required|exists:dokter,id',
            'tanggal_booking' => 'required|date|after:now',
            'keluhan' => 'nullable|string',
        ]);

        $booking = Booking::create([
            'pasien_id' => $pasien->id,
            'dokter_id' => $validated['dokter_id'],
            'tanggal_booking' => $validated['tanggal_booking'],
            'keluhan' => $validated['keluhan'] ?? null,
            'status' => 'pending',
        ]);

        $lastAntrian = Antrian::whereHas('booking', function ($q) use ($booking) {
            $q->whereDate('tanggal_booking', date('Y-m-d', strtotime($booking->tanggal_booking)));
        })->max('nomor_antrian') ?? 0;

        Antrian::create([
            'booking_id' => $booking->id,
            'nomor_antrian' => $lastAntrian + 1,
            'status' => 'waiting',
        ]);

        return redirect('/pasien/dashboard')->with('success', 'Booking berhasil dibuat!');
    }
}