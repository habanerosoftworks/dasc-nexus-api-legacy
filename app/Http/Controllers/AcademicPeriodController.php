<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AcademicPeriodRequest;
Use App\Models\AcademicPeriod;
use Illuminate\Http\JsonResponse;

class AcademicPeriodController extends Controller
{
    public function index(): JsonResponse
    {
        $academicPeriods = AcademicPeriod::all();
        return response()->json([
            'academicPeriods' => $academicPeriods
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(AcademicPeriodRequest $request): JsonResponse
    {
        $academicPeriod = AcademicPeriod::create($request->all());
        return response()->json($academicPeriod, 201);
    }

    public function show(string $id): JsonResponse
    {
        $academicPeriod = AcademicPeriod::findOrFail($id);
        return response()->json($academicPeriod);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(AcademicPeriodRequest $request, string $id): JsonResponse
    {
        $academicPeriod = AcademicPeriod::findOrFail($id);
        $academicPeriod->update($request->all());
        return response()->json($academicPeriod);
    }

    public function destroy(string $id): JsonResponse
    {
        $academicPeriod = AcademicPeriod::findOrFail($id);
        $academicPeriod->delete();
        return response()->json(null, 204);
    }
}
