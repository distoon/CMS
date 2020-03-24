<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructorCourse extends Model
{
    protected $fillable = [
        'instructor_id','course_id',
    ];
}
