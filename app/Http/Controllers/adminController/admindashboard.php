<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class admindashboard extends Controller
{
    public function indexAdmin() { 
        return view('adminPages.Adashbaord');
    }
}
