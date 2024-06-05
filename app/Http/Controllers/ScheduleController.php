<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Http\JsonResponse;

class ScheduleController extends Controller
{
    public function index(): JsonResponse
    {
        $schedules = Schedule::all();
        return response()->json($schedules);
    }

    public function create()
    {
        //
    }

    public function store(ScheduleRequest $request): JsonResponse
    {
        $schedule = Schedule::create($request->all());
        return response()->json($schedule, 201);
    }

    public function show(string $id): JsonResponse
    {
        $schedule = Schedule::findOrFail($id);
        return response()->json($schedule);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(ScheduleRequest $request, string $id): JsonResponse
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());
        return response()->json($schedule);
    }

    public function destroy(string $id): JsonResponse
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return response()->json(null, 204);
    }
}
