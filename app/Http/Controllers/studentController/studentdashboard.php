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
        // Check if student is authenticated
        $student = Auth::guard('student')->user();
    
        // Fetch the student's enrollments with subjects and grades
        $enrollments = Enrollment::where('student_id', $student->id)
            ->with('subject', 'grades') // Use 'grades' instead of 'grade'
            ->get();
        
        return view('studentPages.dashboard', compact('student', 'enrollments'));
    }
    
}
