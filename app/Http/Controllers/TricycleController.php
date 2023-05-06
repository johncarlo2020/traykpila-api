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

            $tricycle = tricycle::firstOrNew(['users_id' => $attrs['id']]);

            $tricycle->back_image = $filename;
            $tricycle->save();

           return response()->json([
            'success' => true, 
            'data' => $tricycle, 
            'message' => 'Image uploaded successfully']
        );
    }
}
