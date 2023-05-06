<?php

namespace App\Http\Controllers;
use App\Models\tricycle;


use Illuminate\Http\Request;

class TricycleController extends Controller
{
    public function or_image(Request $request){
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

            $tricycle = tricycle::firstOrNew(['user_id' => $attrs['id']]);
            $tricycle->or = $filename;
            $tricycle->save();

           return response()->json([
            'success' => true, 
            'data' => $tricycle, 
            'message' => 'Image uploaded successfully']
        );
    }

    public function cr_image(Request $request){
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

            $tricycle = tricycle::firstOrNew(['user_id' => $attrs['id']]);
            $tricycle->cr = $filename;
            $tricycle->save();

           return response()->json([
            'success' => true, 
            'data' => $tricycle, 
            'message' => 'Image uploaded successfully']
        );
    }

    public function plate_number(Request $request){

        $attrs= $request->validate([
            'id'=>'required',
            'plate_number' => 'required',
        ]);

        $tricycle = tricycle::firstOrNew(['user_id' => $attrs['id']]);
        $tricycle->plate_number = $attrs['plate_number'];
        $tricycle->save();

        return response([
            'tricycle'  => $tricycle,
        ],200);
    }

    public function get_tricycle(Request $request){

        $attrs= $request->validate([
            'id'=>'required',
        ]);
        $tricycle = tricycle::where('user_id',$attrs['id'])->get();

        return response([
            'user'  => $tricycle->first()
        ],200);
    }
}
