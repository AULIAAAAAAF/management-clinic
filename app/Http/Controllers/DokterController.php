<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return response()->json($dokters);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'spesialis' => 'required|string',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        $dokter = Dokter::create($validated);
        return response()->json($dokter, 201);
    }

    public function show(Dokter $dokter)
    {
        return response()->json($dokter->load('bookings'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $validated = $request->validate([
            'nama' => 'sometimes|string',
            'spesialis' => 'sometimes|string',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        $dokter->update($validated);
        return response()->json($dokter);
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return response()->json(null, 204);
    }
}