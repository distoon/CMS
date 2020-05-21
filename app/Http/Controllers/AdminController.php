<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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

        return view('admin.student.update',compact('student'));
    }
    public function postUpdateStudent(Request $request, Student $student)
    {
        $this->validate($request,[
            'email' => 'max:250|required|email',
        ]);
        $student->update([
            'val' => val,
            'val' => val,
        ]);
        $student->update($requestarray);
    }
}
