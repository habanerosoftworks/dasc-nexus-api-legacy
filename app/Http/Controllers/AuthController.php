<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signUp(UserRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'status' => 'success',
            'message' => 'User created successfully',
            'token' => $token,
        ], 201);
    }

    public function signIn(LoginRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        return response()->json([
            'user' => $user,
            'status' => 'success',
            'message' => 'User signed in successfully',
            'token' => $user->createToken('API TOKEN')->plainTextToken,
        ], 200);
    }
}
