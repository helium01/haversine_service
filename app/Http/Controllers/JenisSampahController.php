<?php

namespace App\Http\Controllers;

use App\Models\jenisSampah;
use Illuminate\Http\Request;

class JenisSampahController extends Controller
{
    public function index()
    {
        $jenisSampahs = JenisSampah::all();
        return response()->json($jenisSampahs);
    }

    public function show($id)
    {
        $jenisSampah = JenisSampah::find($id);
        if (!$jenisSampah) {
            return response()->json(['message' => 'Jenis Sampah not found'], 404);
        }
        return response()->json($jenisSampah);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_sampah' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
        ]);

        $jenisSampah = JenisSampah::create($validatedData);
        return response()->json($jenisSampah, 201);
    }

    public function update(Request $request, $id)
    {
        $jenisSampah = JenisSampah::find($id);
        if (!$jenisSampah) {
            return response()->json(['message' => 'Jenis Sampah not found'], 404);
        }

        $validatedData = $request->validate([
            'jenis_sampah' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
        ]);

        $jenisSampah->update($validatedData);
        return response()->json($jenisSampah);
    }

    public function destroy($id)
    {
        $jenisSampah = JenisSampah::find($id);
        if (!$jenisSampah) {
            return response()->json(['message' => 'Jenis Sampah not found'], 404);
        }

        $jenisSampah->delete();
        return response()->json(['message' => 'Jenis Sampah deleted']);
    }
}
