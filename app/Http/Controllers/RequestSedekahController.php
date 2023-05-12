<?php

namespace App\Http\Controllers;

use App\Models\RequestSedekah;
use Illuminate\Http\Request;

class RequestSedekahController extends Controller
{
    public function index(Request $request)
    {
        $requests = RequestSedekah::with('sedekah')->where('id_user', $request->user()->id)->get();

        return response()->json(['data' => $requests]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_sedekah' => 'required|exists:sedekahs,id',
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $data = $request->only(['id_sedekah', 'status']);
        $data['id_user'] = $request->user()->id;

        $requestSedekah = RequestSedekah::create($data);

        return response()->json(['data' => $requestSedekah], 201);
    }

    public function update(Request $request, RequestSedekah $requestSedekah)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $requestSedekah->update(['status' => $request->status]);

        return response()->json(['data' => $requestSedekah]);
    }

    public function destroy(RequestSedekah $requestSedekah)
    {
        $requestSedekah->delete();

        return response()->json([], 204);
    }
}
