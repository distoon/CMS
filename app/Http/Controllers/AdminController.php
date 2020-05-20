<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class AdminController extends Controller
{
    public function getAddStudent(Request $request)
    {
        return view('admin.student.create');
    }
    public function postAddStudent(Request $request)
    {
        
    }
    public function getUpdateStudent($name){
        
        $student = Student::whereHas('user', function($query) use($name){
            $query->where('user_name',$name);
        })->first();

        return $student->gpa;
    }
}
