<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Booking;
use App\Models\Dokter;
use Illuminate\Support\Facades\Auth;

class PasienViewController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $pasien = $user->pasien;
        
        $bookings = $pasien ? Booking::where('pasien_id', $pasien->id)->with('dokter')->get() : collect([]);
        $activeBooking = $bookings->whereIn('status', ['pending', 'confirmed'])->first();
        $antrian = $activeBooking ? Antrian::where('booking_id', $activeBooking->id)->first() : null;
        
        return view('pasien.dashboard', compact('bookings', 'activeBooking', 'antrian'));
    }

    public function booking()
    {
        $dokters = Dokter::all();
        return view('pasien.booking', compact('dokters'));
    }

    public function antrian()
    {
        $user = Auth::user();
        $pasien = $user->pasien;
        
        $antrians = $pasien 
            ? Antrian::whereHas('booking', function ($q) use ($pasien) {
                $q->where('pasien_id', $pasien->id);
            })->with(['booking.dokter'])->get()
            : collect([]);
        
        return view('pasien.antrian', compact('antrians'));
    }

    public function riwayat()
    {
        $user = Auth::user();
        $pasien = $user->pasien;
        
        $bookings = $pasien 
            ? Booking::where('pasien_id', $pasien->id)
                ->where('status', 'completed')
                ->with('dokter')
                ->get()
            : collect([]);
        
        return view('pasien.riwayat', compact('bookings'));
    }
}