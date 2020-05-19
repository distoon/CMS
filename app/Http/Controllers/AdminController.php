<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAddStudent()
    {
        return view('admin.student.create');
    }
    public function postAddStudent(Request $request)
    {
        
    }
}
