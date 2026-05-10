<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="Klinik API",
 *     version="1.0",
 *     description="API Documentation untuk Aplikasi Klinik"
 * )
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */
class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::with('user')->get();
        return response()->json($pasiens);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nik' => 'required|unique:pasien|size:16',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string|max:20',
        ]);

        $pasien = Pasien::create($validated);
        return response()->json($pasien, 201);
    }

    public function show(Pasien $pasien)
    {
        return response()->json($pasien->load('user', 'bookings'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $validated = $request->validate([
            'nik' => 'sometimes|unique:pasien|size:16',
            'tanggal_lahir' => 'sometimes|date',
            'jenis_kelamin' => 'sometimes|in:L,P',
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string|max:20',
        ]);

        $pasien->update($validated);
        return response()->json($pasien);
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return response()->json(null, 204);
    }
}