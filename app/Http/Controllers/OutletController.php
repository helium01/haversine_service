<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        $outlets = outlet::all();

        return response()->json([
            'status' => 'success',
            'data' => $outlets,
        ]);
    }

    public function show($id)
    {
        $outlet = outlet::find($id);

        if (!$outlet) {
            return response()->json([
                'status' => 'error',
                'message' => 'Outlet not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $outlet,
        ]);
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'id_user' => 'required|integer',
        //     'nama_outlite' => 'required|string',
        //     'kodepos' => 'required|string',
        //     'alamat' => 'required|string',
        //     'long' => 'required|numeric',
        //     'lat' => 'required|numeric',
        // ]);

        $outlet = outlet::create($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $outlet,
        ]);
    }

    public function update(Request $request, $id)
    {
        $outlet = outlet::find($id);

        if (!$outlet) {
            return response()->json([
                'status' => 'error',
                'message' => 'Outlet not found',
            ], 404);
        }

        // $validatedData = $request->validate([
        //     'id_user' => 'required|integer',
        //     'nama_outlite' => 'required|string',
        //     'kodepos' => 'required|string',
        //     'alamat' => 'required|string',
        //     'long' => 'required|numeric',
        //     'lat' => 'required|numeric',
        // ]);

        $outlet->update($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $outlet,
        ]);
    }

    public function destroy($id)
    {
        $outlet = outlet::find($id);

        if (!$outlet) {
            return response()->json([
                'status' => 'error',
                'message' => 'Outlet not found',
            ], 404);
        }

        $outlet->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Outlet deleted successfully',
        ]);
    }
    public function getNearest(Request $request)
    {
        $lat = $request->input('lat');
        $long = $request->input('long');
        $outlets = outlet::all();
        $nearestOutlet = null;
        $nearestDistance = null;
        foreach ($outlets as $outlet) {
            $distance = $outlet->distance($lat, $long);
            if ($nearestDistance == null || $distance < $nearestDistance) {
                $nearestDistance = $distance;
                $nearestOutlet = $outlet;
            }
        }
        return response()->json([
            'outlet' => $nearestOutlet,
            'distance' => $nearestDistance
        ]);
    }
}
