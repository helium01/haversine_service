<?php

namespace App\Http\Controllers;

use App\Models\penjemputan;
use Illuminate\Http\Request;

class PenjemputanController extends Controller
{
    public function index()
    {
        $penjemputans = Penjemputan::all();
        return response()->json([
            'status'=>'sukses',
            'data' => $penjemputans]);
    }

    public function show($id)
    {
        $penjemputan = Penjemputan::find($id);
        if (!$penjemputan) {
            return response()->json(['message' => 'Penjemputan not found'], 404);
        }
        return response()->json([
            'status'=>'sukses',
            'data' => $penjemputan]);
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'id_user' => 'required|integer',
        //     'jumlah_sampah' => 'required|integer',
        //     'long' => 'required|numeric',
        //     'lat' => 'required|numeric',
        // ]);
        
        $penjemputan = Penjemputan::create($request->all());
        return response()->json(['data' => $penjemputan], 201);
    }

    public function update(Request $request, $id)
    {
        $penjemputan = Penjemputan::find($id);
        if (!$penjemputan) {
            return response()->json(['message' => 'Penjemputan not found'], 404);
        }
        $this->validate($request, [
            'id_user' => 'required|integer',
            'jumlah_sampah' => 'required|integer',
            'long' => 'required|numeric',
            'lat' => 'required|numeric',
        ]);
        $penjemputan->update($request->all());
        return response()->json(['data' => $penjemputan]);
    }

    public function destroy($id)
    {
        $penjemputan = Penjemputan::find($id);
        if (!$penjemputan) {
            return response()->json(['message' => 'Penjemputan not found'], 404);
        }
        $penjemputan->delete();
        return response()->json(['message' => 'Penjemputan deleted']);
    }
}
