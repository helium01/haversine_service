<?php

namespace App\Http\Controllers;

use App\Models\requestPenjemputan;
use App\Models\outlet;
use Illuminate\Http\Request;

class RequestPenjemputanController extends Controller
{
    public function index_user($id)
    {
        $requests = RequestPenjemputan::where('id_user',$id);
        return response()->json([
            'status'=>'sukses',
            'data' =>$requests]);
    }
    public function index_admin_outlite($id)
    {
        $requests = RequestPenjemputan::where('id_outlite',$id);
        return response()->json([
            'status'=>'sukses',
            'data' =>$requests]);
    }

    public function show($id)
    {
        $request = RequestPenjemputan::find($id);
        if (!$request) {
            return response()->json(['message' => 'Request Penjemputan not found'], 404);
        }
        return response()->json($request);
    }

    public function request_outlet(Request $request)
    {
        $latitude = $request->input('lat');
        $longitude = $request->input('long');
        $outlet = Outlet::selectRaw("
            id,
            nama_outlite,
            lat,
            lng,
            (
                6371 * acos(
                    cos(radians($latitude)) *
                    cos(radians(lat)) *
                    cos(radians(lng) - radians($longitude)) +
                    sin(radians($latitude)) * sin(radians(lat))
                )
            ) AS distance
        ")
            ->orderBy('distance', 'asc')
            ->first();
        if($outlet->count()==0){
            return response()->json([
                'status'=>'outlite terlalu jauh di luar jangkauan',
            ]);
        }else{
                $data =requestPenjemputan::create([
                    'id_jenis_sampah'=>$request->id_jenis_sampah,
                    'id_user'=>$request->id_user,
                    'tanggal_penjemputan'=>$request->tanggal_penjemputan,
                    'id_outlite'=>$outlet->id,
                    'alamat'=>$request->alamat,
                    'catatan'=>$request->catatan,
                    'status'=>'belum di proses'
                ]);
            return response()->json([
                'data'=>$data
            ]);

        }
    }

    public function update(Request $request, $id)
    {
        $request = RequestPenjemputan::find($id);
        if (!$request) {
            return response()->json(['message' => 'Request Penjemputan not found'], 404);
        }

        $validatedData = $request->validate([
            'id_jenis_sampah' => 'required|integer',
            'id_user' => 'required|integer',
            'tanggal_penjemputan' => 'required|date',
            'alamat' => 'required',
            'catatan' => 'nullable',
            'status' => 'required',
        ]);

        $request->update($validatedData);
        return response()->json($request);
    }

    public function destroy($id)
    {
        $request = RequestPenjemputan::find($id);
        if (!$request) {
            return response()->json(['message' => 'Request Penjemputan not found'], 404);
        }

        $request->delete();
        return response()->json(['message' => 'Request Penjemputan deleted']);
    }
}
