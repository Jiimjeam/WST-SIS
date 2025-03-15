<?php

namespace App\Http\Controllers\studentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\Grade;

class studentdashboard extends Controller
{
public function indexStudent() { 
    $student = Auth::guard('student')->user();

    $enrollments = Enrollment::where('student_id', $student->id ?? null)
        ->with('subject', 'grades')
        ->get();

    return view('studentPages.dashboard', compact('student', 'enrollments'));
}

    
}
