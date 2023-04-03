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
            'role' => 'required',

        ]);

          if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
           }else{
            $path='';
           }

        $user = User::create([
            'name'=>$attrs['name'],
            'email'=>$attrs['email'],
            'password'=>bcrypt($attrs['password']),
            'role'=> $attrs['role'],
            'Verified' => '0',
            'address' =>$attrs['address'],
            'image'=>$path
        ]);

        return response([
            'user'  => $user,
            'token' => $user->createToken('secret')->plainTextToken,
            'path' => $path
        ],200);
    }

    public function register_new(Request $request)
    {
        $attrs= $request->validate([
            'name'=>'required|string',
            'address'=>'String',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
            'role' => 'required',
        ]);

        $image = new User;
        $image->name = $request->name;
        $image->email = $attrs['email'];
        $image->password = bcrypt($attrs['password']);
        $image->address = $request->address;
        $image->role = $request->role;
            if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $image->image = $path;
           }
        $image->save();

        return response([
            'user'  => $image,
            'token' => $image->createToken('secret')->plainTextToken,
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

    public function active_driver(Request $request){
        $attrs= $request->validate([
            'terminal_id'=>'required',
            'tricycle_id'=>'required',
            'user_id'=>'required',
            'active'=>'required'
        ]);

        $update=[
            'terminal_id'=>$attrs['terminal_id'],
            'tricycle_id'=>$attrs['tricycle_id'],
            'active'=>$attrs['active'],
        ];

        $id=$attrs['user_id'];

        $user=User::where('id',$id)->update($update);

        return response([
            'active'  => $attrs['active'],
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
