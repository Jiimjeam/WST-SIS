<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::with(['student', 'subject'])->get(); // Load related data
        $students = Student::all(); // Fetch all students
        $subjects = Subject::all(); // Fetch all subjects
    
        return view('adminPages.adminEnrolled', compact('enrollments', 'students', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('adminPages.modals.enrollment.enrollment', compact('students', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'enrollment_date' => 'required|date',
        ]);
    
        $exists = Enrollment::where('student_id', $request->student_id)
                            ->where('subject_id', $request->subject_id)
                            ->exists();
    
        if ($exists) {
            return redirect()->back()->withErrors(['student_id' => 'This student is already enrolled in this subject.'])->withInput();
        }
    
        Enrollment::create($request->all());
    
        return redirect()->route('Admin Enrolled Students')->with('success', 'Enrollment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('adminPages.modals.enrollment.enrollmentEdit', compact('enrollment', 'students', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'enrollment_date' => 'required|date',
        ]);
    
        Enrollment::findOrFail($id)->update($request->all());
    
        return redirect()->route('Admin Enrolled Students')->with('success', 'Enrollment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('Admin Enrolled Students')->with('success', 'Enrollment deleted successfully.');
    }
}
