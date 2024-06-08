<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherAttendanceRequest;
use Illuminate\Http\Request;
use App\Models\TeacherAttendance;
use Illuminate\Http\JsonResponse;

class TeacherAttendanceController extends Controller
{
    public function index(): JsonResponse
    {
        $teacherAttendances = TeacherAttendance::all();
        return response()->json([
            'teacherAttendances' => $teacherAttendances
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(TeacherAttendanceRequest $request): JsonResponse
    {
        $teacherAttendance = TeacherAttendance::create($request->all());
        return response()->json($teacherAttendance, 201);
    }

    public function show(string $id): JsonResponse
    {
        $teacherAttendance = TeacherAttendance::findOrFail($id);
        return response()->json($teacherAttendance);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(TeacherAttendanceRequest $request, string $id): JsonResponse
    {
        $teacherAttendance = TeacherAttendance::findOrFail($id);
        $teacherAttendance->update($request->all());
        return response()->json($teacherAttendance);
    }

    public function destroy(string $id): JsonResponse
    {
        $teacherAttendance = TeacherAttendance::findOrFail($id);
        $teacherAttendance->delete();
        return response()->json(null, 204);
    }
}
