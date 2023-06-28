<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\tpc;
use App\Models\reports;
use App\Models\payment;
use App\Models\License;
use App\Models\tricycle;

use DB;
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

        $userCreate = User::create([
            'name'=>$attrs['name'],
            'email'=>$attrs['email'],
            'password'=>bcrypt($attrs['password']),
            'role'=> $attrs['role'],
            'Verified' => '0',
            'address' =>$attrs['address'],
            'image'=>$path
        ]);

        $user= User::find($userCreate->id);


        return response([
            'user'  => $user,
            'token' => $user->createToken('secret')->plainTextToken,
            'path' => $path
        ],200);
    }

    public function upload_license(Request $request)
    {
      
            $attrs = $request->validate([
                'id' => 'required',
                'license_number' => 'required|string',
                'expiration' => 'string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                'image_back' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);

            $image = $request->file('image');
            $image_back = $request->file('image_back');

            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $filename_back = uniqid() . '.' . $image_back->getClientOriginalExtension();

            $image->storeAs('images', $filename);
            $image_back->storeAs('images', $filename_back);

                $license = License::firstOrNew(['users_id' => $attrs['id']]);
                $license->license_number = $attrs['license_number'];
                $license->expiration = $attrs['expiration'];
                $license->back_image = $filename_back;
                $license->front_image = $filename;
                $license->save();


            return response([
                'success' => true,
                'data' => $license,
            ], 200);
    }

    public function get_license(Request $request){

       $attrs = $request->validate([
            'id' => 'required',
        ]);

        $license = License::where('users_id', $attrs['id'])->first();

        if (!$license) {
            return $license = null;
        }

        return response([
            'user' => $license,
        ], 200);
    }




    public function personal_information(Request $request)
    {
            $attrs = $request->validate([
                'id' => 'required',
                'nationality' => 'required',
                'emergency_name' => 'nullable|string',
                'emergency_relationship' => 'nullable|string',
                'emergency_number' => 'nullable|string',
                'emergency_address' => 'nullable|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);

            $user = User::find($attrs['id']);
            $user->nationality = $attrs['nationality'];
            $user->emergency_contact = $attrs['emergency_name'];
            $user->emergency_relationship = $attrs['emergency_relationship'];
            $user->emergency_number = $attrs['emergency_number'];
            $user->emergency_address = $attrs['emergency_address'];

            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $filename);
            $user->image = $filename;

            $user->save();

            return response([
                'success' => true,
                'data' => $user,
            ], 200);
        
    }



    public function verify_documents(Request $request){

        $attrs= $request->validate([
            'id'=>'required',
        ]);

        $user = User::find($attrs['id']);
        $hasRequiredData = !empty($user->nationality) && !empty($user->image) && !empty($user->emergency_contact) && !empty($user->emergency_relationship) && !empty($user->emergency_number) && !empty($user->emergency_address);


        $license = License::where('users_id', $attrs['id'])->exists();
        $licenseDocuments = $license ? true : false;

        $tricycle = tricycle::where('user_id',$attrs['id'])->exists();
        $tricycleDocuments = $tricycle ? true : false;


        return response([
            'personal_information' => $hasRequiredData,
            'license'  => $licenseDocuments,
            'tricycle'  => $tricycleDocuments,
        ],200);
    }

    public function get_personal_information(Request $request){

        $attrs= $request->validate([
            'id'=>'required',
        ]);
        $user = User::find($attrs['id']);

        return response([
            'user'  => $user,
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
