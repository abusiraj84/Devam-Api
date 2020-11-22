<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $primaryKey = 'courses_id';


    public function sections()
    {
        // return $this->hasMany('App\Lessons', 'courses_id')->with('category')->with('yazar')->with('seslendiren');
        return $this->hasMany(Sections::class, 'course_id');
    }

    
    public function lessons()
    {
        // return $this->hasMany('App\Lessons', 'courses_id')->with('category')->with('yazar')->with('seslendiren');
        return $this->hasMany(Lessons::class, 'section_id');
    }

    public function cats()
    {
        // return $this->hasMany('App\Lessons', 'courses_id')->with('category')->with('yazar')->with('seslendiren');
        return $this->belongsTo(Cats::class, 'cat_id');
    }
    public function prices()
    {
        // return $this->hasMany('App\Lessons', 'courses_id')->with('category')->with('yazar')->with('seslendiren');
        return $this->belongsTo(Prices::class, 'price_id');
    }

       
    public function alllessons()
    {
        // return $this->hasMany('App\Lessons', 'courses_id')->with('category')->with('yazar')->with('seslendiren');
        return $this->hasManyThrough(
            Lessons::class,
            Sections::class,
            'course_id', // Foreign key on users table...
            'sections_id', // Foreign key on posts table...
            'courses_id', // Local key on countries table...
            'sections_id' // Local key on users table...
        );
    }


    public function instructors()
    {
        // return $this->hasMany('App\Lessons', 'courses_id')->with('category')->with('yazar')->with('seslendiren');
        return $this->belongsToMany(Instructor::class, 'course_instructor','course_id','instructor_id');
    }

    public function users()
    {
        // return $this->hasMany('App\Lessons', 'courses_id')->with('category')->with('yazar')->with('seslendiren');
        return $this->belongsToMany(User::class, 'course_users','course_id','user_id');
    }

    public function color()
    {
        // return $this->hasMany('App\Lessons', 'courses_id')->with('category')->with('yazar')->with('seslendiren');
        return $this->belongsTo(Bgcolors::class, 'bg_color_id');
    }


}
