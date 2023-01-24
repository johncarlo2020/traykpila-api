<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
         $attrs= $request->validate([
            'terminal_id'=>'required',
        ]);
        $terminal_id=$attrs['terminal_id'];
        $booking=booking::select('bookings.*','users.name')->join('users', 'users.id', '=', 'bookings.passenger_id')->where('status',0)->where('bookings.terminal_id',$terminal_id)->get();

        return response([
            'booking' => $booking,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
          $attrs= $request->validate([
            'passenger_id'=>'required',
            'passenger_lat'=>'String',
            'passenger_lng'=>'required',
            'passenger_count'=>'required',
            'passenger_location'=>'required',
            'terminal_id'=>'required',
            'status' => 'required',
        ]);


        $passenger = booking::create([
            'passenger_id'=>$attrs['passenger_id'],
            'passenger_lat'=>$attrs['passenger_lat'],
            'passenger_lng'=>$attrs['passenger_lng'],
            'passenger_count'=> $attrs['passenger_count'],
            'passenger_location'=> $attrs['passenger_location'],
            'terminal_id'=> $attrs['terminal_id'],
            'status' =>$attrs['status'],
        ]);

        return response([
            'booking' => $passenger,
        ], 200);
    }

    public function approved(request $request)
    {
          $attrs= $request->validate([
            'driver_id'=>'required',
            'driver_lat'=>'String',
            'driver_lng'=>'required',
            'tricycle_id'=>'required',
            'status' => 'required',
        ]);


        $passenger = booking::update([
            'driver_id'=>$attrs['driver_id'],
            'driver_lat'=>$attrs['driver_lat'],
            'driver_lng'=>$attrs['driver_lng'],
            'tricycle_id'=> $attrs['tricycle_id'],
            'status' =>$attrs['status'],
        ]);

        return response([
            'booking' => $passenger,
        ], 200);
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
    public function show($id)
    {
        //
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
