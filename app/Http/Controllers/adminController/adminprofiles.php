<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminprofiles extends Controller
{
    public function Aprofiles() { 
        return view('adminPages.adminProfiles');
    }
}
