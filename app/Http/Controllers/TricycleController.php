<?php

namespace App\Http\Controllers;
use App\Models\tricycle;


use Illuminate\Http\Request;

class TricycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $image = new Tricycle;
        $image->name = $request->name;
        $image->plate_number = $request->plate_number;
        $image->body_number = $request->body_number;
        $image->max_passenger = $request->max_passenger;
        $image->user_id = $request->user_id;
            if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $image->image = $path;
           }
        $image->save();
        return $image;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validate fields
        $attrs = $request->validate([
            'name' => 'required|string',
            'plate_number' => 'required|string',
            'body_number' => 'required|string',
            'max_passenger' => 'required|string',
            'user_id'=>'required'

        ]);

        $image = $this->saveImage($request->image, 'tricycle');


        $post = tricycle::create([
            'name' => $attrs['name'],
            'plate_number' => $attrs['plate_number'],
            'body_number' => $attrs['body_number'],
            'max_passenger' => $attrs['max_passenger'],
            'user_id' => $attrs['user_id'],

            'image' => $image
        ]);

        // for now skip for post image

        return response([
            'message' => 'Post created.',
            'post' => $post,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tricycle = Tricycle::where('user_id',$id)->get();

        return $tricycle;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
