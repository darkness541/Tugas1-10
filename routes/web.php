<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LectureController;

Route::get('/', function () {
    return redirect()->route('student.index');
});

// Resource Routes
Route::resource('student', StudentController::class);
Route::resource('department', DepartmentController::class);
Route::resource('lecture', LectureController::class);