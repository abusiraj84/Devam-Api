<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    function login(Request $request)
    {
        $user= User::where('email', $request->email)->with('role')->with('courses')->with('lessons')->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
      
                'token' => $token
            ];
        
             return response($response, 201);
    }



    public function register(Request $request)
    {
        $request->validate([
            'firstname'=>['required'],
            'lastname'=>['required'],
            'email'=>['required', 'email', 'unique:users'],
            'password'=>['required', 'min:8']
        ]);

        $registerComplete =    User::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        if($registerComplete)
        {
           return $this->login($request);
        }   
      
    }
}
