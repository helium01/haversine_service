<?php

namespace App\Http\Controllers;

use App\Models\RequestSampah;
use Illuminate\Http\Request;

class RequestSampahController extends Controller
{
    public function index()
    {
        $requests = RequestSampah::all();

        return response()->json([
            'success' => true,
            'data' => $requests,
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $request = RequestSampah::create($input);

        return response()->json([
            'success' => true,
            'data' => $request,
        ]);
    }

    public function show($id)
    {
        $request = RequestSampah::find($id);

        if (!$request) {
            return response()->json([
                'success' => false,
                'message' => 'Request not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $request,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request = RequestSampah::find($id);

        if (!$request) {
            return response()->json([
                'success' => false,
                'message' => 'Request not found',
            ], 404);
        }

        $input = $request->all();
        $request->fill($input)->save();

        return response()->json([
            'success' => true,
            'data' => $request,
        ]);
    }

    public function destroy($id)
    {
        $request = RequestSampah::find($id);

        if (!$request) {
            return response()->json([
                'success' => false,
                'message' => 'Request not found',
            ], 404);
        }

        $request->delete();

        return response()->json([
            'success' => true,
            'message' => 'Request deleted successfully',
        ]);
    }
}
