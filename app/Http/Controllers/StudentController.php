<?php


namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("adminPages.modals.student.studentCreate");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated(); // Get validated data
    
        $data['role'] = $data['role'] ?? 'student';
    
        $student = new Student();
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->address = $data['address'];
        $student->age = $data['age'];
        $student->password = bcrypt($data['password']); // Hash password before saving
        $student->email_verified_at = now();
        
        $student->save();
        return redirect()->route('Admin Student Tables')->with('success', 'Student created successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view ('adminPages.modals.student.viewStudent', 
            [
                "student" => $student,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('adminPages.modals.student.studentEdit',
            [
                "student" => $student
            ]
    );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, string $id)
{
    $student = Student::find($id);

    if (!$student) {
        return redirect()->back()->with('error', 'Student not found!');
    }

    $student->update($request->validated());
    return redirect()->route('Admin Student Tables')->with('success', 'Student updated successfully!');
}
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        
        $student->delete(); 
        $studentList = Student::all();
        return view ("adminPages.adminStudentTables", [
            "ConfirmMessage" => "Student Deleted Successfully", 
            "alertType" => "success", 
            "studentList" => $studentList
        ]);
    }
}
