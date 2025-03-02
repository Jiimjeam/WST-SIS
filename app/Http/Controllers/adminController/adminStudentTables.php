<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminstudentTables extends Controller
{
    public function AstudentTables() { 
        return view('adminPages.adminStudentTables');
    }
}
