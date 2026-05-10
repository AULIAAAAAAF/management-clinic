<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Antrian;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['pasien.user', 'dokter', 'antrian'])->get();
        return response()->json($bookings);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:dokter,id',
            'tanggal_booking' => 'required|date',
            'keluhan' => 'nullable|string',
        ]);

        $booking = Booking::create($validated);

        $lastAntrian = Antrian::whereHas('booking', function ($q) use ($booking) {
            $q->where('tanggal_booking', $booking->tanggal_booking);
        })->max('nomor_antrian') ?? 0;

        Antrian::create([
            'booking_id' => $booking->id,
            'nomor_antrian' => $lastAntrian + 1,
            'status' => 'waiting',
        ]);

        return response()->json($booking->load('antrian'), 201);
    }

    public function show(Booking $booking)
    {
        return response()->json($booking->load(['pasien.user', 'dokter', 'antrian']));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'tanggal_booking' => 'sometimes|date',
            'status' => 'sometimes|in:pending,confirmed,completed,cancelled',
            'keluhan' => 'nullable|string',
        ]);

        $booking->update($validated);
        return response()->json($booking);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json(null, 204);
    }
}