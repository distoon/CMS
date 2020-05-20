<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;

class AdminController extends Controller
{
    public function getAddStudent()
    {
        return view('admin.student.create');
    }
    public function postAddStudent(Request $request)
    {
        
    }
    public function getUpdateStudent($name)
    {
        // $user = Student::where('user_name', $name)->get();

        // $user = User::where('user_name',$username)->first();
        // $user = $user->student;

        $student = Student::whereHas('user', function($query){
            $query->where('user_name',$username);
        })->first();

        return $student;
    }
}
