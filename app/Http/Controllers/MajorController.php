<?php

namespace App\Http\Controllers;

use App\Http\Requests\MajorRequest;
use Illuminate\Http\Request;
use App\Models\Major;
use Illuminate\Http\JsonResponse;

class MajorController extends Controller
{
    public function index(): JsonResponse
    {
        $majors = Major::all();
        return response()->json($majors, 200);
    }

    public function create()
    {
        //
    }

    public function store(MajorRequest $request): JsonResponse
    {
        $major = Major::create($request->all());
        return response()->json($major, 201);
    }

    public function show(string $id): JsonResponse
    {
        $major = Major::findOrFail($id);
        return response()->json($major, 200);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(MajorRequest $request, string $id): JsonResponse
    {
        $major = Major::findOrFail($id);
        $major->update($request->all());
        return response()->json($major, 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $major = Major::findOrFail($id);
        $major->delete();
        return response()->json(null, 204);
    }
}
