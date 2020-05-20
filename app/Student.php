<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id','unique_id','level','department_id','gpa',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function studentCourses()
    {
        return $this->hasMany('App\StudentCourse');
    }
    public function courses()
    {
        return $this->hasManyThrough('App\Course','App\StudentCourse');
    }
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
   
}

