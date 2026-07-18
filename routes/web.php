<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\OrganizationController;

Route::get('/', function () {
    return redirect()->route('student.index');
});

Route::resource('student', StudentController::class);
Route::resource('department', DepartmentController::class);
Route::resource('lecture', LectureController::class);
Route::resource('organization', OrganizationController::class);