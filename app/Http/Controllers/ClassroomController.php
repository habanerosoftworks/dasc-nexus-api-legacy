<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index(): JsonResponse
    {
        $classrooms = Classroom::all();
        return response()->json($classrooms, 200);
    }

    public function create()
    {
        //
    }

    public function store(ClassroomRequest $request): JsonResponse
    {
        $classroom = Classroom::create($request->all());
        return response()->json($classroom, 201);
    }

    public function show(string $id): JsonResponse
    {
        $classroom = Classroom::findOrFail($id);
        return response()->json($classroom, 200);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(ClassroomRequest $request, string $id): JsonResponse
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->update($request->all());
        return response()->json($classroom, 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();
        return response()->json(null, 204);
    }
}
