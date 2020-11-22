<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class RegisterController extends Controller
{
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
