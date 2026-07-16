<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index()
    {
        // Eager Loading untuk mengatasi N+1 Problem
        $lectures = Lecture::with('department')->latest()->get();
        
        return view('lecture.index', compact('lectures'));
    }

    // Tambahkan method lain jika diperlukan (create, store, dll)
}