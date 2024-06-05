<?php

use App\Http\Controllers\AcademicPeriodController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SessionDascController;
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
    Route::apiResource('academic-periods', AcademicPeriodController::class);
    Route::apiResource('sessions-dasc', SessionDascController::class);
    Route::apiResource('days', DayController::class);
    Route::apiResource('groups', GroupController::class);
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('charges', ChargeController::class);
    Route::apiResource('schedules', ScheduleController::class);
});
