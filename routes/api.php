<?php

use App\Http\Controllers\AssessmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuestionController;


Route::apiResource('user', UserController::class);
Route::apiResource('course', CourseController::class);
Route::apiResource('assessment', AssessmentController::class);
Route::apiResource('question', QuestionController::class);
