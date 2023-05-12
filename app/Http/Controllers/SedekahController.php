<?php

namespace App\Http\Controllers;

use App\Models\sedekah;
use Illuminate\Http\Request;

class SedekahController extends Controller
{
    public function index()
    {
        $sedekahs = Sedekah::all();
        return response()->json(['data' => $sedekahs]);
    }

    public function show($id)
    {
        $sedekah = Sedekah::find($id);
        if ($sedekah) {
            return response()->json(['data' => $sedekah]);
        } else {
            return response()->json(['message' => 'Sedekah not found.'], 404);
        }
    }

    public function store(Request $request)
    {
        $sedekah = Sedekah::create([
            'id_outlite' => $request->input('id_outlite'),
            'harga_koin' => $request->input('harga_koin'),
            'nama_barang' => $request->input('nama_barang'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return response()->json(['data' => $sedekah], 201);
    }

    public function update(Request $request, $id)
    {
        $sedekah = Sedekah::find($id);
        if ($sedekah) {
            $sedekah->update([
                'id_outlite' => $request->input('id_outlite'),
                'harga_koin' => $request->input('harga_koin'),
                'nama_barang' => $request->input('nama_barang'),
                'deskripsi' => $request->input('deskripsi'),
            ]);
            return response()->json(['data' => $sedekah]);
        } else {
            return response()->json(['message' => 'Sedekah not found.'], 404);
        }
    }

    public function destroy($id)
    {
        $sedekah = Sedekah::find($id);
        if ($sedekah) {
            $sedekah->delete();
            return response()->json(['message' => 'Sedekah deleted.']);
        } else {
            return response()->json(['message' => 'Sedekah not found.'], 404);
        }
    }
}
