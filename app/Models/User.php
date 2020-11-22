<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory,HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        // return $this->hasMany('App\Lessons', 'courses_id')->with('category')->with('yazar')->with('seslendiren');
        return $this->belongsTo(Roles::class, 'role_id');
    }
    public function courses()
    {
        // return $this->hasMany('App\Lessons', 'courses_id')->with('category')->with('yazar')->with('seslendiren');
        return $this->belongsToMany(Courses::class, 'course_users','user_id','course_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lessons::class, 'lesson_users','user_id','lesson_id');
    }



}
