<?php

namespace App\Http\Controllers;

use App\Http\Requests\DayRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Day;

class DayController extends Controller
{
    public function index(): JsonResponse
    {
        $days = Day::all();
        return response()->json([
            'days' => $days
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(DayRequest $request): JsonResponse
    {
        $day = Day::create($request->all());
        return response()->json($day, 201);
    }

    public function show(string $id): JsonResponse
    {
        $day = Day::findOrFail($id);
        return response()->json($day);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(DayRequest $request, string $id): JsonResponse
    {
        $day = Day::findOrFail($id);
        $day->update($request->all());
        return response()->json($day);
    }

    public function destroy(string $id): JsonResponse
    {
        $day = Day::findOrFail($id);
        $day->delete();
        return response()->json(null, 204);
    }
}
