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
            'or' => 'required|image|mimes:jpeg,png,jpg,gif',
            'cr' => 'required|image|mimes:jpeg,png,jpg,gif',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            
        ]);

        $or = $request->file('or');
        $image = $request->file('image');
        $cr = $request->file('cr');

        
        // Generate a unique filename for the uploaded or
        $filename_or = uniqid() . '.' . $or->getClientOriginalExtension();
        $filename_cr = uniqid() . '.' . $cr->getClientOriginalExtension();
        $filename_image = uniqid() . '.' . $image->getClientOriginalExtension();


    
        // Move the uploaded file to a public directory
        $or->storeAs('images', $filename_or);
        $cr->storeAs('images', $filename_cr);
        $cr->storeAs('images', $image);

      

        $tricycle = tricycle::firstOrNew(['user_id' => $attrs['id']]);
        $tricycle->plate_number = $attrs['plate_number'];
        $tricycle->cr = $filename_cr;
        $tricycle->or = $filename_or;
        $tricycle->image = $filename_image;

        $tricycle->save();

        return response([
            'success' => true, 
            'tricycle'  => $tricycle,
        ],200);
    }

    public function get_tricycle(Request $request){

        $attrs= $request->validate([
            'id'=>'required',
        ]);
        $tricycle = tricycle::where('user_id',$attrs['id'])->first();
        if(!$tricycle){
            return $tricycle = null;
        }

        return response([
            'user'  => $tricycle ,
        ],200);
    }
}
