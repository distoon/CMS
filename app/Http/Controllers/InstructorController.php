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
        return view('instructor.register_course', compact('instructor_courses', 'courses', 'instructor'));
    }


    public function postRegisterCourses($course_id)
    {
        $instructor = Instructor::where('user_id', \Auth::user()->id)->first();
        if(!$instructor){
            return redirect()->back()->with([
                "message" => "Instructor has not been found successfully",
            ]);
        }
        $instructor_courses = $instructor->instructorCourses;
        if(count($instructor_courses) < 7){
            if($instructor_courses->contains('course_id',$course_id))
            {
                return redirect()->back()->with([
                    "message" => "Instructor already registered",
                ]);
            }
            $instructorCourse = InstructorCourse::create([
                'instructor_id' => $instructor->id,
                'course_id' => $course_id,
                'semester' => '1',
            ]);
            return redirect()->back()->with([
                "message" => "Instructor assigned successfully",
            ]);
        }
        else{
            return redirect()->back()->with([
                "message" => "Instructor already has more than 7 courses",
            ]);
        }    
    }

    public function postUnregisterCourses($course_id)
    {
        $instructor = Instructor::where('user_id', \Auth::user()->id)->first();
        if(!$instructor)
        {
            return redirect()->back()->with([
                "message" => "Instructor has not been found successfully",
            ]);
        }
        $instructorCourses = $instructor->instructorCourses;
        if($instructorCourses->contains('course_id', $course_id))
        {
            InstructorCourse::where('course_id', $course_id)->delete();
            return redirect()->back()->with([
                "message" => "Instructor unassigned successfully",
            ]);
            // return response()->json([
            //     "state" => true,
            //     "message" => "Course has been deleted successfully",
            // ]);
        }
        else
        {
            return redirect()->back()->with([
                "message" => "Instructor not registered",
            ]);
        }
    }

    public function updateProfile(Request $request)
    {
        return $request;
    }

    public function registerCourses($course_id,$instructor_id)
    {
        
    }

}