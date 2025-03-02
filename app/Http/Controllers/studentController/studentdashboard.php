<?php

namespace App\Http\Controllers\studentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class studentdashboard extends Controller
{
    public function indexStudent() { 
        return view('layouts.dashboardlayout');
    }
}
