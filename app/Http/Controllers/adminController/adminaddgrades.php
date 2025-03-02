<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminaddgrades extends Controller
{
    public function Aaddgrades() { 
        return view('adminPages.adminaddgrades');
    }
}
