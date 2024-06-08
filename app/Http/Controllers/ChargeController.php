<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChargeRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Charge;

class ChargeController extends Controller
{
    public function index(): JsonResponse
    {
        $charges = Charge::all();
        return response()->json([
            'charges' => $charges
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(ChargeRequest $request): JsonResponse
    {
        $charge = Charge::create($request->all());
        return response()->json($charge, 201);
    }

    public function show(string $id): JsonResponse
    {
        $charge = Charge::findOrFail($id);
        return response()->json($charge);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(ChargeRequest $request, string $id): JsonResponse
    {
        $charge = Charge::findOrFail($id);
        $charge->update($request->all());
        return response()->json($charge);
    }

    public function destroy(string $id): JsonResponse
    {
        $charge = Charge::findOrFail($id);
        $charge->delete();
        return response()->json(null, 204);
    }
}
