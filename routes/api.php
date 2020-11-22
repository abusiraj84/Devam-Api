<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function () {
    return User::with('role')->with('courses')->with('lessons')->get();
});

// Route::get('login', 'Auth\LoginController')->name('login');



Route::post('login', 'App\Http\Controllers\UserController@login');
Route::post('register', 'App\Http\Controllers\UserController@register');



Route::apiResource('courses', 'App\Http\Controllers\CourseController');

Route::apiResource('instructors', 'App\Http\Controllers\InstructorsController');

Route::apiResource('sections', 'App\Http\Controllers\SectionController');

Route::apiResource('lessons', 'App\Http\Controllers\LessonsController');

Route::apiResource('cats', 'App\Http\Controllers\CatsController');

Route::apiResource('courseuser', 'App\Http\Controllers\CourseUserController');

Route::apiResource('lessonuser', 'App\Http\Controllers\LessonUserController');

Route::delete('lessonuser/{user_id}/{lesson_id}/', 'App\Http\Controllers\LessonUserController@destroy');
