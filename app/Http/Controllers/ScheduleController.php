<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ScheduleController extends Controller
{
    public function index(): JsonResponse
    {
        $schedules = Schedule::all();
        return response()->json([
            'schedules' => $schedules
        ], 200);
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

    public function getScheduleByUser(): JsonResponse
    {
        $user = User::where('id', auth()->id())->first();
        $schedules = $user->teacher->schedules;
        $schedules->load('classroom', 'course', 'group');
        return response()->json([
            'schedules' => $schedules
        ], 200);
    }
}
