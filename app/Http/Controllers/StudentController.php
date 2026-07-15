<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim'  => 'required|digits:11|unique:students',
        ]);

        Student::create($request->all());

        return redirect()->route('student.index')
                         ->with('success', 'Student berhasil ditambahkan');
    }

    // Edit, Update, Delete akan dilanjutkan di video ini juga
}