<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk Student (Resource Controller)
Route::resource('student', StudentController::class);