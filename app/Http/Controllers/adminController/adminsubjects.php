<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminsubjects extends Controller
{
    public function Asubjects() { 
        return view('adminPages.adminSubjects');
    }
}
