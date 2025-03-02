<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class admintables extends Controller
{
    public function Atables() { 
        return view('adminPages.adminTables');
    }
}
