<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    //

    public function register(Request $request){

        $attrs= $request->validate([
            'name'=>'required|string',
            'address'=>'String',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
            'role' => 'required'

        ]);

        $user = User::create([
            'name'=>$attrs['name'],
            'email'=>$attrs['email'],
            'password'=>bcrypt($attrs['password']),
            'role'=> $attrs['role'],
            'address' =>$attrs['address']
        ]);

        return response([
            'user'  => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ],200);
    }

    public function login(Request $request){

        $attrs= $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        if(!Auth::attempt($attrs)){
            return response([
                'message' => 'Invalid Credentials'
            ], 403);
        }

        return response([
            'user'  => auth()->user(),
            'role' => auth()->user()->role,
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ],200);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout success'
        ], 200);
    }

    public function user(){
        return response([
            'user' => auth()->user()
        ], 200);
    }
}
