<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    public function courses()
    {
        // return $this->hasMany('App\Lessons', 'courses_id')->with('category')->with('yazar')->with('seslendiren');
        return $this->belongsToMany(Courses::class, 'course_instructor','instructor_id','course_id');
    }
}
