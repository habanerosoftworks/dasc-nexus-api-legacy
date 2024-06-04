<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Http\JsonResponse;

class GroupController extends Controller
{
    public function index(): JsonResponse
    {
        $groups = Group::all();
        return response()->json($groups);
    }

    public function create()
    {
        //
    }

    public function store(GroupRequest $request): JsonResponse
    {
        $group = Group::create($request->all());
        return response()->json($group, 201);
    }

    public function show(string $id): JsonResponse
    {
        $group = Group::findOrFail($id);
        return response()->json($group);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(GroupRequest $request, string $id): JsonResponse
    {
        $group = Group::findOrFail($id);
        $group->update($request->all());
        return response()->json($group);
    }

    public function destroy(string $id): JsonResponse
    {
        $group = Group::findOrFail($id);
        $group->delete();
        return response()->json(null, 204);
    }
}
