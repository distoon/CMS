<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructors extends Model
{
    protected $fillable = [
        'user_id','department_id',
    ];
}
