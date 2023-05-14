<?php

namespace App\Http\Controllers;

use App\Models\koin;
use Illuminate\Http\Request;

class KoinController extends Controller
{
    public function index()
    {
        $koins = Koin::all();
        return response()->json([
            'status'=>'sukses',
            'data' => $koins]);
    }

    public function show($id)
    {
        $koin = Koin::where('id_user',$id)->get();
        if ($koin) {
            return response()->json(['data' => $koin]);
        } else {
            return response()->json(['message' => 'Koin not found.'], 404);
        }
    }

    public function store(Request $request)
    {
        $data_koin=koin::where('id_outlite',$request->id_outlite)->get();
        foreach($data_koin as $data){
            if($data->id_user==$request->id_user){
                $nilai_koin=koin::find($data->id);
                $nilai_koin->update([
                    'jumlah_koin'=>$data->jumlah_koin+$request->jumlah_koin
                ]);
        return response()->json([
            'status'=>'sukses',
            'data' => $nilai_koin], 201);
            }
        }
        $koin = Koin::create([
            'id_user' => $request->input('id_user'),
            'id_outlite' => $request->input('id_outlite'),
            'jumlah_koin' => $request->input('jumlah_koin'),
        ]);

        return response()->json([
            'status'=>'sukses',
            'data' => $koin], 201);
    }

    public function update(Request $request, $id)
    {
        $koin = Koin::find($id);
        if ($koin) {
            $koin->update([
                'id_user' => $request->input('id_user'),
                'jumlah_koin' => $request->input('jumlah_koin'),
            ]);
            return response()->json(['data' => $koin]);
        } else {
            return response()->json(['message' => 'Koin not found.'], 404);
        }
    }

    public function destroy($id)
    {
        $koin = Koin::find($id);
        if ($koin) {
            $koin->delete();
            return response()->json(['message' => 'Koin deleted.']);
        } else {
            return response()->json(['message' => 'Koin not found.'], 404);
        }
    }
}
