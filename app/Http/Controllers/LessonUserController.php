<?php

namespace App\Http\Controllers;

use App\Models\LessonUser;
use Illuminate\Http\Request;

class LessonUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $var = LessonUser::all();

        return response()->json($var, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $var = LessonUser::create($request->all());
        return response()->json($var, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LessonUser  $lessonUser
     * @return \Illuminate\Http\Response
     */
    public function show(LessonUser $lessonUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LessonUser  $lessonUser
     * @return \Illuminate\Http\Response
     */
    public function edit(LessonUser $lessonUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LessonUser  $lessonUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LessonUser $lessonUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LessonUser  $lessonUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id,$lesson_id)
    {
    
        try{

            LessonUser::where('user_id', $user_id)
                                       ->where('lesson_id', $lesson_id)
                                       ->delete();
           
           } catch(\Exception $e){
               return response()->json([
                       'success' => false,
                       'message' => 'List could not be deleted'
               ], 500);
           }
           
           
            return response()->json([
                'success' => true
            ]);
        
    }
}
