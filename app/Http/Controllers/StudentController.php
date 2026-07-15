<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index');
    }

    public function create()
    {
        return view('student.create');
    }

    // Masih akan dilanjutkan di pertemuan berikutnya
}