<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\tpc;
use App\Models\reports;
use App\Models\payment;
use App\Models\tpclogs;
use App\Models\License;

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

        $item = new tpc;
        $item->users_id = $user->id;
        $item->tpcstatus = 0;
        $item->wallet = 0;
        $item->save();
       
        $tpclogs = new tpclogs;
        $tpclogs->cashin = 0;
        $tpclogs->cashout=0;
        $tpclogs->farein=0;
        $tpclogs->fareout=0;
        $tpclogs->tpc_id=$item->id;
        $tpclogs->save();

        return response([
            'user'  => $user,
            'item' => $item,
            'tpclogs' =>$tpclogs,
            'token' => $user->createToken('secret')->plainTextToken,
            'path' => $path
        ],200);
    }
    
    public function upload_license(Request $request){

        $attrs= $request->validate([
            'id'=>'required',
            'license_number'=>'required|string',
            'expiration'=>'String',

        ]);

      
        $license = License::where('users_id', $attrs['id'])->exists();
           
        if ($license) {
            $license2 = License::where('users_id', $attrs['id'])->get();

            $license1 = License::find($license2[0]->id);
            $license1->license_number = $attrs['license_number'];
            $license1->expiration =  $attrs['expiration'];
            $license1->save();
        } else {
            $license1 = new License();
            $license1->users_id = $attrs['id'];
            $license1->license_number = $attrs['license_number'];
            $license1->expiration =  $attrs['expiration'];
            $license1->save();
        }

        return response([
            'license'  => $license1,
        ],200);
    }
    public function upload_license_back(Request $request){
        $attrs= $request->validate([
            'id'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
              // Get the uploaded file from the request
            $image = $request->file('image');
        
            // Generate a unique filename for the uploaded image
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        
            // Move the uploaded file to a public directory
            $image->move(public_path('images'), $filename);

            $license = License::where('users_id', $attrs['id'])->exists();
           
            if ($license) {
                $license2 = License::where('users_id', $attrs['id'])->get();

                $license1 = License::find($license2[0]->id);
                $license1->users_id = $attrs['id'];
                $license1->back_image = $filename;
                $license1->save();
            } else {
                $license1 = new License();
                $license1->users_id = $attrs['id'];
                $license1->back_image = $filename;
                $license1->save();
            }

           return response()->json(['success' => true, 'message' => 'Image uploaded successfully']);
    }
    public function upload_license_front(Request $request){
        $attrs= $request->validate([
            'id'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
              // Get the uploaded file from the request
            $image = $request->file('image');
        
            // Generate a unique filename for the uploaded image
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        
            // Move the uploaded file to a public directory
            $image->move(public_path('images'), $filename);

            $license = License::where('users_id', $attrs['id'])->exists();
           
            if ($license) {
                $license2 = License::where('users_id', $attrs['id'])->get();

                $license1 = License::find($license2[0]->id);
                $license1->users_id = $attrs['id'];
                $license1->front_image = $filename;
                $license1->save();
            } else {
                $license1 = new License();
                $license1->users_id = $attrs['id'];
                $license1->front_image = $filename;
                $license1->save();
            }

           return response()->json(
            [
            'success' => true, 
            'data' => $license1, 

            'message' => 'Image uploaded successfully']);
    }
    public function personal_information_image(Request $request){
        $attrs= $request->validate([
            'id'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
              // Get the uploaded file from the request
            $image = $request->file('image');
        
            // Generate a unique filename for the uploaded image
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        
            // Move the uploaded file to a public directory
            $image->move(public_path('images'), $filename);

           $user = User::find($attrs['id']);
           $user->image = $filename;
           $user->save();

           return response()->json([
            'success' => true, 
            'data' => $user, 
            'message' => 'Image uploaded successfully']
        );
    }

    public function personal_information(Request $request){

        $attrs= $request->validate([
            'id'=>'required',
            'nationality' => 'required',
            'emergency_name'=>'String',
            'emergency_relationship'=>'String',
            'emergency_number'=>'String',
            'emergency_address'=>'String',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',

        ]);

           // Get the uploaded file from the request
           $image = $request->file('image');
        
           // Generate a unique filename for the uploaded image
           $filename = uniqid() . '.' . $image->getClientOriginalExtension();
       
           // Move the uploaded file to a public directory
           $image->move(public_path('images'), $filename);

         

        $user = User::find($attrs['id']);
        $user->nationality = $attrs['nationality'];
        $user->emergency_contact = $attrs['emergency_name'];
        $user->emergency_relationship = $attrs['emergency_relationship'];
        $user->emergency_number = $attrs['emergency_number'];
        $user->emergency_address = $attrs['emergency_address'];
        $user->image = $filename;
        $user->save();


        return response([
            'success' => true, 
            'data' => $user, 
        ],200);
    }
    public function get_license(Request $request){

        $attrs= $request->validate([
            'id'=>'required',
        ]);
        $license = License::where('users_id',$attrs['id'])->get();

        return response([
            'user'  => $license[0],
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
