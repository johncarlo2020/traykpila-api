<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terminal;
use App\Http\Requests\ImageStoreRequest;
use App\Models\User;

use Auth;

class TerminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terminals = Terminal::get();
        $terminal = Terminal::count();


        return response([
            'terminals'  => $terminals,
            'count'  => $terminal

        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $attrs= $request->validated();
        $attrs['image'] = $request->file('image')->store('image');

        $terminal = Terminal::create($attrs);

        return response([
            'terminals'  => $terminal
        ],200);
    }

    public function addimage(Request $request)
    {
        $image = new Terminal;
        $image->name = $request->name;
        $image->address = $request->address;
        $image->lat = $request->lat;
        $image->lng = $request->lng;

        
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
        //
    }

    public function TerminalCount(){
        $terminal = Terminal::count();

        return response([
            'count'  => $terminal
        ],200);

    }

    public function UserCount(){
        $user = user::where('role','=','0')->count();

        return response([
            'count'  => $user
        ],200);

    }

    public function DriverCount(){
        $driver= user::where('role','=','1')->count();

        return response([
            'count'  => $driver
        ],200);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {
        $attrs= $request->validate([
            'id'=>'required',

        ]);
        $terminal = Terminal::where('id','=',$attrs['id'])->get();
        

        return response([
            'terminals'  => $terminal
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request)
    {
        $attrs= $request->validate([
            'id' => 'required',
            'name'=>'required|string',
            'image'=>'String',
            'lat'=>'String',
            'lng' => 'String'

        ]);

        $terminalUpdate = Terminal::where('id', $attrs['id'])->
        update([
            'name'=>$attrs['name'],
            'image'=>$attrs['image'],
            'lat'=>$attrs['lat'],
            'lng'=>$attrs['lng'],

        ]);

        $terminal = Terminal::where('id','=',$attrs['id'])->get();

        return response([
            'update' => $terminalUpdate,
            'terminals'  => $terminal
        ],200);
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
    public function destroy(request $request)
    {
        $attrs= $request->validate([
            'id'=>'required',

        ]);
        $delete = Terminal::where('id','=',$attrs['id'])->delete();
        $terminal = Terminal::get();


        return response([
            'deleted' => $delete,
            'terminals'  => $terminal
        ],200);
    }
}
