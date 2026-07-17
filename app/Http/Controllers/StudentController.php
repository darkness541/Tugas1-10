<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('department')->latest()->paginate(10);
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

    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim'  => 'required|digits:11|unique:students,nim,' . $student->id,
        ]);

        $student->update($request->all());

        return redirect()->route('student.index')
                         ->with('success', 'Student berhasil diupdate');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')
                         ->with('success', 'Student berhasil dihapus');
    }
}