<?php

namespace App\Http\Controllers;
use App\Events\PusherEvent;
use App\Events\ActiveDriverEvent;
use App\Events\BookingEvent;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\booking;


class PusherController extends Controller
{
    public function triggerEvent(Request $request)
    {
        $message = $request->input('message');

        event(new PusherEvent($message));

        return response()->json(['message' => 'Event triggered!']);
    }

    public function activeDriver(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        $user->active = $request->input('status');
        $user->save();

        $total = User::where('role',1)->where('active',1)->count();
        event(new ActiveDriverEvent($user,$total));

        return response()->json(['message' => $user]);
    }

    public function create(Request $request)
    {
          $attrs= $request->validate([
            'passenger_id'=>'required',
            'passenger_lat'=>'required',
            'passenger_lng'=>'required',
            'destination_lat'=>'required',
            'destination_lng'=>'required',
            'passenger_count'=>'required',
            'payment_type'=>'required',
            'notes'=>'required',
            'status' => 'required',
        ]);


        $passenger = booking::create([
            'passenger_id'=>$attrs['passenger_id'],
            'passenger_lat'=>$attrs['passenger_lat'],
            'passenger_lng'=>$attrs['passenger_lng'],
            'destination_lat'=>$attrs['destination_lat'],
            'destination_lng'=>$attrs['destination_lng'],
            'payment_type'=>$attrs['payment_type'],
            'passenger_count'=> $attrs['passenger_count'],
            'notes'=> $attrs['notes'],
            'status' =>$attrs['status'],
        ]);

        event(new BookingEvent($passenger));


        return response()->json(['booking' => $passenger]);

    }
}
