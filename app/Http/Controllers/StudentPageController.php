<?php


namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminStudentTable()
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
}
