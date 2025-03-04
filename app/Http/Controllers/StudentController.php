<?php


namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllStudents()
    {
        $studentList = Student::all();
        return view ('adminPages.adminStudentTables', 
            [
                'studentList' => $studentList
            ]
        );
    } 

    public function adminDashboard()
    {
        return view ('adminPages.Adashboard');
    } 

    public function adminProfile()
    {
        return view ('adminPages.adminProfiles');
    } 

    public function adminSubjects()
    {
        return view ('adminPages.adminSubjects');
    } 

    public function adminEnrolledStudents()
    {
        return view ('adminPages.adminEnrolled');
    } 

    public function adminAddgrades()
    {
        return view ('adminPages.adminaddgrades');
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view ('adminPages.modals.viewStudent', 
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
        return view('adminPages.modals.studentEdit',
            [
                "student" => $student
            ]
            
    );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'age' => 'required',
        ]);;

        return "updating " . $student . "<br>with: " . json_encode($data); 
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
