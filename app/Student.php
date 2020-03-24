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
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}

