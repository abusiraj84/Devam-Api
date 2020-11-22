<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonUser extends Model
{
    use HasFactory;
    protected $fillable = ['lesson_id', 'user_id'];

    public function lessons()
    {
        return $this->hasMany('App\Models\Lessons');

    }
}
