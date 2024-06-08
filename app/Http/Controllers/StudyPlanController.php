<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudyPlanRequest;
use Illuminate\Http\Request;
use App\Models\StudyPlan;
use Illuminate\Http\JsonResponse;

class StudyPlanController extends Controller
{
    public function index(): JsonResponse
    {
        $studyPlans = StudyPlan::all();
        return response()->json([
            'studyPlans' => $studyPlans
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(StudyPlanRequest $request): JsonResponse
    {
        $studyPlan = StudyPlan::create($request->all());
        return response()->json($studyPlan, 201);
    }

    public function show(string $id): JsonResponse
    {
        $studyPlan = StudyPlan::findOrFail($id);
        return response()->json($studyPlan);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(StudyPlanRequest $request, string $id): JsonResponse
    {
        $studyPlan = StudyPlan::findOrFail($id);
        $studyPlan->update($request->all());
        return response()->json($studyPlan);
    }

    public function destroy(string $id): JsonResponse
    {
        $studyPlan = StudyPlan::findOrFail($id);
        $studyPlan->delete();
        return response()->json(null, 204);
    }
}
