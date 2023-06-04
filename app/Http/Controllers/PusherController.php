<?php

namespace App\Http\Controllers;
use App\Events\PusherEvent;
use App\Events\ActiveDriverEvent;
use App\Events\DepositEvent;
use App\Events\BookingEvent;
use App\Events\BookingListEvent;
use App\Events\BookingDriverAccepted;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\tpc;
use App\Models\booking;
use App\Models\tricycle;


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

    public function Deposit(Request $request)
    {

        $image = $request->file('image');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('images', $filename);


        $tpc = tpc::create([
            'users_id'              =>    $request->input('users_id'),
            'amount'                =>    $request->input('amount'),
            'account_number'        =>    $request->input('account_number'),
            'account_name'          =>    $request->input('account_name'),
            'reference_number'      =>    $request->input('reference_number'),
            'image'                 =>    $filename,
            'type'                  =>    0,
            'status'                =>    0,
        ]);


        return response()->json(['message' => $tpc]);
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
            'notes'=>'',
        ]);
        $booking = booking::create([
            'passenger_id'=>$attrs['passenger_id'],
            'passenger_lat'=>$attrs['passenger_lat'],
            'passenger_lng'=>$attrs['passenger_lng'],
            'destination_lat'=>$attrs['destination_lat'],
            'destination_lng'=>$attrs['destination_lng'],
            'payment_type'=>$attrs['payment_type'],
            'passenger_count'=> $attrs['passenger_count'],
            'notes'=> $attrs['notes'],
            'status' =>0,
        ]);

        event(new BookingEvent($booking));
       

        return response()->json(['booking' => $booking]);
    }

    public function BookingDriverAccept(Request $request)
    {
        $attrs = $request->validate([
            'driver_id' => 'required|integer',
            'booking_id' => 'required|integer',
            'fare' => 'required',
            'driver_lat' => 'required',
            'driver_lng' => 'required'
        ]);
        
        $booking = Booking::findOrFail($attrs['booking_id']);
        $booking->fill([
            'driver_id' => $attrs['driver_id'],
            'fare' => $attrs['fare'],
            'driver_lat' => $attrs['driver_lat'],
            'driver_lng' => $attrs['driver_lng'],
            'status' => 1
        ])->save();
        
        $details = [
            'booking' => $booking,
            'driver' => User::findOrFail($attrs['driver_id']),
            'tricycle' => Tricycle::where('user_id', $attrs['driver_id'])->firstOrFail()
        ];
        
        event(new BookingDriverAccepted($details));

        return response()->json(['booking' => $booking]);

        
    }

    public function bookingList(){
        $booking = booking::where('status',0)->get();

        foreach ($booking as $key => $value) {
            $passenger = User::find($value->passenger_id);
            $value->passenger = $passenger;
            if($value->driver_id != null){
                $driver = User::find($value->driver_id);
                $tricyle = tricycle::where('user_id',$value->driver_id)->get();
                $value->driver = $driver;
                $value->driver->tricycle=$tricyle;
            }
        }
        event(new BookingListEvent($booking));
        return response()->json(['booking' => $booking]);
    }

    
}
