<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name','code','min_students_number','department_id','semester','credit_hours'
    ]
}
