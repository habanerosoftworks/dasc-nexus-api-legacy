<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Schedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $startTime = $request->query('start_time');
        $endTime = $request->query('end_time');

        $classrooms = Classroom::all();

        $classroomsWithAvailability = $classrooms->map(function($classroom) use ($startTime, $endTime) {
            if (is_null($startTime) || is_null($endTime)) {
                return [
                    'classroom' => $classroom,
                    'is_available' => null
                ];
            }
            return [
                'classroom' => $classroom,
                'is_available' => $classroom->isAvailable($startTime, $endTime)
            ];
        });

        return response()->json([
            'classrooms' => $classroomsWithAvailability
        ], 200);
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
