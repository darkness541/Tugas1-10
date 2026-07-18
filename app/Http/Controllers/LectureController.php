<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Department;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index(Request $request)
    {
        $lectures = Lecture::with('department')
            ->filter($request->only(['keyword', 'department_id']))
            ->latest()
            ->paginate(5)
            ->withQueryString();

        $departments = Department::all();

        return view('lecture.index', compact('lectures', 'departments'));
    }
}