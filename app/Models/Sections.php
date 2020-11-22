<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory;
    protected $primaryKey = 'sections_id';
    public function lessons()
    {
        // return $this->hasMany('App\Lessons', 'courses_id')->with('category')->with('yazar')->with('seslendiren');
        return $this->hasMany(Lessons::class, 'sections_id');
    }
}
