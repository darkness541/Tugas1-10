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
            ->when($request->keyword, function($query) use ($request) {
                $query->where('name', 'like', '%'.$request->keyword.'%');
            })
            ->when($request->department_id, function($query) use ($request) {
                $query->where('department_id', $request->department_id);
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        $departments = Department::all();

        return view('lecture.index', compact('lectures', 'departments'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('lecture.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        Lecture::create($request->all());

        return redirect()->route('lecture.index')
                         ->with('success', 'Lecturer berhasil ditambahkan');
    }
}