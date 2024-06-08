<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionDascRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\SessionDasc;

class SessionDascController extends Controller
{
    public function index(): JsonResponse
    {
        $sessionsDasc = SessionDasc::all();
        return response()->json([
            'sessionsDasc' => $sessionsDasc
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(SessionDascRequest $request): JsonResponse
    {
        $sessionDasc = SessionDasc::create($request->all());
        return response()->json($sessionDasc, 201);
    }

    public function show(string $id): JsonResponse
    {
        $sessionDasc = SessionDasc::find($id);
        return response()->json($sessionDasc);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(SessionDascRequest $request, string $id): JsonResponse
    {
        $sessionDasc = SessionDasc::find($id);
        $sessionDasc->update($request->all());
        return response()->json($sessionDasc);
    }

    public function destroy(string $id): JsonResponse
    {
        $sessionDasc = SessionDasc::find($id);
        $sessionDasc->delete();
        return response()->json(null, 204);
    }
}
