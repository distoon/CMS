<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Department;
use App\Course;
use App\Instructor;
use App\Hall;
use App\InstructorCourse;
class InstructorController extends Controller
{
    public function getListCourses($user_name)
    {
        $instructor = Instructor::whereHas('user', function($query) use($user_name){
            $query->where('user_name',$user_name);
        })->first();
        $instructor_courses = $instructor->instructorCourses;
        $courses = Course::all();
    }
}