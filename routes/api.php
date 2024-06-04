<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudyPlanController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/sign-up', [AuthController::class, 'signUp']);
Route::post('/sign-in', [AuthController::class, 'signIn']);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('classrooms', ClassroomController::class);
    Route::apiResource('teachers', TeacherController::class);
    Route::apiResource('majors', MajorController::class);
    Route::apiResource('study-plans', StudyPlanController::class);
});
