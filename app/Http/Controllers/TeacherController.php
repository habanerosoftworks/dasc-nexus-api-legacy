<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Http\JsonResponse;

class TeacherController extends Controller
{
    public function index(): JsonResponse
    {
        $teachers = Teacher::all();
        return response()->json($teachers, 200);
    }

    public function create()
    {
        //
    }

    public function store(TeacherRequest $request): JsonResponse
    {
        $teacher = Teacher::create($request->all());
        return response()->json($teacher, 201);
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $teacher = Teacher::findOrFail($id);
        return response()->json($teacher, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, string $id): JsonResponse
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());
        return response()->json($teacher, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return response()->json(null, 204);
    }
}
