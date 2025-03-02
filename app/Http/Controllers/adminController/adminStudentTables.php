<?php

namespace App\Http\Controllers\adminController;
use App\Models\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminstudentTables extends Controller
{
    public function AstudentTables() { 
        $studentList = Student::all();
        return view ('adminPages.adminStudentTables', 
            [
                'studentList' => $studentList
            ]
        );
    }
}
