<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cats extends Model
{
    use HasFactory;
    protected $primaryKey = 'cat_id';
    public function courses()
    {
        // return $this->hasMany('App\Lessons', 'courses_id')->with('category')->with('yazar')->with('seslendiren');
        return $this->hasMany(Courses::class, 'cat_id');
}


}
