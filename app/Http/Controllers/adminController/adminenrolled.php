<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminenrolled extends Controller
{
    public function Aenrolled() { 
        return view('adminPages.adminEnrolled');
    }
}
