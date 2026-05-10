<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Booking;
use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalPasien = Pasien::count();
        $totalDokter = Dokter::count();
        $totalBooking = Booking::count();
        $totalAntrian = Antrian::where('status', 'waiting')->count();
        $recentBookings = Booking::with(['pasien.user', 'dokter'])->latest()->take(10)->get();

        return view('admin.dashboard', compact('totalPasien', 'totalDokter', 'totalBooking', 'totalAntrian', 'recentBookings'));
    }

    public function antrian()
    {
        $antrians = Antrian::with(['booking.pasien.user', 'booking.dokter'])
            ->whereHas('booking', function ($q) {
                $q->whereDate('tanggal_booking', today());
            })
            ->orderBy('nomor_antrian')
            ->get();

        return view('admin.antrian', compact('antrians'));
    }

    public function panggilAntrian(Antrian $antrian)
    {
        $antrian->update([
            'status' => 'called',
            'waktu_panggil' => now(),
        ]);

        return back()->with('success', 'Antrian dipanggil');
    }

    public function selesaiAntrian(Antrian $antrian)
    {
        $antrian->update(['status' => 'completed']);
        $antrian->booking->update(['status' => 'completed']);

        return back()->with('success', 'Antrian selesai');
    }

    public function skipAntrian(Antrian $antrian)
    {
        $antrian->update(['status' => 'skipped']);

        return back()->with('success', 'Antrian dilewati');
    }

    public function bookings()
    {
        $bookings = Booking::with(['pasien.user', 'dokter', 'antrian'])
            ->latest()
            ->get();

        return view('admin.bookings', compact('bookings'));
    }

    public function updateBookingStatus(Booking $booking, string $status)
    {
        $validStatuses = ['pending', 'confirmed', 'completed', 'cancelled'];
        
        if (!in_array($status, $validStatuses)) {
            return back()->with('error', 'Status tidak valid');
        }

        $booking->update(['status' => $status]);

        return back()->with('success', 'Status booking diperbarui');
    }

    public function dokters()
    {
        $dokters = Dokter::withCount('bookings')->get();
        return view('admin.dokters', compact('dokters'));
    }

    public function pasien()
    {
        $pasiens = Pasien::with('user')->get();
        return view('admin.pasien', compact('pasiens'));
    }
}