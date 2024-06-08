<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    public function index(): JsonResponse
    {
        $courses = Course::all();
        return response()->json([
            'courses' => $courses
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(CourseRequest $request): JsonResponse
    {
        $course = Course::create($request->all());
        return response()->json($course, 201);
    }

    public function show(string $id): JsonResponse
    {
        $course = Course::findOrFail($id);
        return response()->json($course);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(CourseRequest $request, string $id): JsonResponse
    {
        $course = Course::findOrFail($id);
        $course->update($request->all());
        return response()->json($course);
    }

    public function destroy(string $id): JsonResponse
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return response()->json(null, 204);
    }
}
