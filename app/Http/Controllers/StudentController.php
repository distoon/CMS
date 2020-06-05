<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Student;
use Carbon\Carbon;
use App\Course;

class StudentController extends Controller
{
    public function profile()
    {
        switch(\Auth::user()->role){
            case '0':
                return view('admin.profile');
                break;
            case '1':
                $student = Student::whereHas('user', function($query){
                    $query->where('id',\Auth::user()->id);
                })->first();
                if($student){
                    return view('student.profile',compact('student'));
                }
                break;
            case '2':
                return view('instructor.profile');
                break;
            default: return redirect(route('login'));
        }
    }
    public function firstLogin(Request $request)
    {
        $this->validate($request,[
            'student_id' => 'required|numeric|digits:8|unique:students,unique_id',
            'email' => 'required|email',
        ]);
        $student = Student::whereHas('user', function($query) use($request){
            $query->where('id',$request->user_id);
        })->first();
        if($student){
            $student->user->update([
                'user_name' => $student->user->first_name."-".$student->user->last_name."-".$request->student_id,
                'email' => $request->email,
                'email_verified_at' => Carbon::now(),
            ]);
            $student->update([
                'unique_id' => $request->student_id,
            ]);
            return redirect()->back();
        }
        abort('500');
    }
    public function updateProfile(Request $request)
    {
        $rules = [
            'email' => 'email|unique:users,email',
            // 'confirm_password' => 'regex:/^(?=\S*[a-z])(?=\S*[!@#$&*])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
            'new_password' => 'same:confirm_password',
            'firstName' => 'alpha',
            'lasName' => 'alpha',
        ];
        $messeges = [
            'password.regex' => 'Password format must consist of a set of uppercase, numbers, and special characters (for example:! @ # $% ^ & *?> <).',
            'email.unique' => 'This Email is already taken',
            'new_password.same' => 'password does not match',
            'firstName.alpha' => 'name must contain only letters',
        ];
        $this->validate($request,$rules,$messeges);
        $student = Student::whereHas('user', function($query) use($request){
            $query->where('id',$request->user_id);
        })->first();
        if($student){
            $student->user->update([
                'email' => $request->email,
                'password' => \Hash::make($request->password),
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
            ]);
            return redirect()->back();
        }
        else{
            abort('500');
        }
    }
    public function registerCourses()
    {
        $courses = Course::all();
        return view('student.register_courses',compact('courses'));
    }
}
        