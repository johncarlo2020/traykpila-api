<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terminal;
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
        $terminal = Terminal::get();

        return response([
            'terminals'  => $terminal
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $attrs= $request->validate([
            'name'=>'required|string',
            'image'=>'String',
            'lat'=>'String',
            'lng' => 'String'

        ]);

        $terminal = Terminal::create([
            'name'=>$attrs['name'],
            'image'=>$attrs['image'],
            'lat'=>$attrs['lat'],
            'lng'=>$attrs['lng'],

        ]);

        return response([
            'terminals'  => $terminal
        ],200);
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
