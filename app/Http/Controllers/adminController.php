<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\User;

class adminController extends Controller
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

    public function drivers(){
        $users=User::where('role',1)->get();

        return view('driver_list',compact('users'));
    }

    public function accounts(){
        $users=User::where('role',1)
        ->where('Verified',1)
        ->get();
        
        return view('driver_accounts',compact('users'));
    }

    public function notverified(){
        $users=User::where('role',1)
        ->where('Verified',0)
        ->get();
        
        return view('driver_accounts_notverified',compact('users'));
    }
    
    

    public function bookingdetails($id){
        $users=User::where('id',$id)->get();
        $bookings=booking::select('bookings.*','users.name AS passenger','tricycles.body_number AS Body_number')
        ->join('users', 'users.id', '=', 'bookings.passenger_id')
        ->join('tricycles','tricycles.id','=','bookings.tricycle_id')
        ->where('driver_id',$id)
        ->get();
        return view('driver_details',compact('users','bookings'));
    }

    public function passengers(){
        $users=User::where('role',2)->get();
        return view('passenger_list',compact('users'));
    }
 
    public function passenger_accounts(){
        $users=User::where('role',2)
        ->where('Verified',1)
        ->get();
        return view('passenger_accounts',compact('users'));
    }

    public function passenger_accounts_notverified(){
        $users=User::where('role',2)
        ->where('Verified',0)
        ->get();
        return view('passenger_accounts_notverified',compact('users'));
    }
    
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
