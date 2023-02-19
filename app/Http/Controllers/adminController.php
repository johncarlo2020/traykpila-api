<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\User;
use App\Models\reports;

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

 

    public function reported_drivers()
    {
        $users=User::where('role',1)->get();

        $reports=reports::select('Reports.*','users.name AS driver','users.email','users.PhoneNumber')
        ->join('users', 'users.id', '=', 'Reports.driver_id')
        ->where('ReportStatus',1)
        ->get();

    

   
        return view('reported_drivers',compact('users','reports'));
    }


    
    public function reported_passengers()
    {
        $users=User::where('role',2)->get();

        $reports=reports::select('Reports.*','users.name AS passenger','users.email','users.PhoneNumber')
        ->join('users', 'users.id', '=', 'Reports.passenger_id')
        ->where('ReportStatus',1)
        ->get();
        return view('reported_passengers',compact('users','reports'));
    }
    

    public function drivers(){
        $users=User::where('role',1)->get();
        
        return view('driver_list',compact('users'));
    }

    public function accounts(){
        $users=User::where('role',1)
        ->where('Verified',1)
        ->get();
        $count = $users->count();
        
        return view('driver_accounts',compact('users','count'));
    }

    public function notverified(){
        $users=User::where('role',1)
        ->where('Verified',0)
        ->get();
        
        $count = $users->count();
        return view('driver_accounts_notverified',compact('users','count'));
    }
    
    

    public function driver_details($id){
        $users=User::where('id',$id)->get();
        $bookings=booking::select('bookings.*','users.name AS passenger','tricycles.body_number AS Body_number')
        ->join('users', 'users.id', '=', 'bookings.passenger_id')

        ->join('tricycles','tricycles.id','=','bookings.tricycle_id')
        ->where('driver_id',$id)
        ->get();
        return view('driver_details',compact('users','bookings'));
    }

    public function passengerdetails($id){
        $users=User::where('id',$id)->get();
        $bookings=booking::select('bookings.*','users.name AS driver','tricycles.body_number AS Body_number')
        ->join('users', 'users.id', '=', 'bookings.driver_id')

        ->join('tricycles','tricycles.id','=','bookings.tricycle_id')
        ->where('passenger_id',$id)
        ->get();
        
        
        return view('passenger_details',compact('users','bookings'));
        
      
    }
    


// ADMIN DASHBOARD
    public function generaldetails(){
        $bookings = booking::select('bookings.*','u1.name AS driver','u2.name AS passenger', 'tricycles.body_number')
        ->join('users As u1', 'u1.id', '=', 'bookings.driver_id')
        ->join('users As u2', 'u2.id', '=', 'bookings.passenger_id')
        ->join('tricycles', 'tricycles.id', '=', 'bookings.passenger_id')
        ->get();

        $count=$bookings->count(); 
        
        //REGISTERED DRIVERS CHART
        $registered_drivers = User::select(User::raw('DATE(created_at) as registered_drivers_day'), User::raw('COUNT(*) as total_drivers'))
        ->where('role',1)
        ->groupBy('registered_drivers_day')
        ->get();

        $registered_drivers_day = $registered_drivers->pluck('registered_drivers_day');
        $total_drivers = $registered_drivers->pluck('total_drivers');  
        
        //REGISTERED PASSENGER CHART

        $registered_passenger = User::select(User::raw('DATE(created_at) as registered_passenger_day'), User::raw('COUNT(*) as total_passenger'))
        ->where('role',2)
        ->groupBy('registered_passenger_day')
        ->get();

        $registered_passenger_day = $registered_passenger->pluck('registered_passenger_day');
      
        $total_passenger = $registered_passenger->pluck('total_passenger');  
        
        //TOTAL BOOKINGS CHART

        $total_bookings = booking::Select(booking::raw('DATE(created_at) as total_bookings_day'),booking::raw('COUNT(*) as total_bookings_count'))
        ->groupBy('total_bookings_day')
        ->get();
        
        $total_bookings_day = $total_bookings->pluck('total_bookings_day');
        $total_bookings_count = $total_bookings->pluck('total_bookings_count');

        //TPC CIRCULATTING SUPPLY CHART

        $total_tpc = User::select(User::raw('DATE(updated_at) as top_up_day'), User::raw('SUM(TPC) as total_tpc'))
       
        ->groupBy('top_up_day')
        ->get();

        $top_up_day = $total_tpc->pluck('top_up_day');
        $total_tpc = $total_tpc->pluck('total_tpc');

        $circullating_tpc = User::select(User::raw('TPC'))
        ->get(); 
        
        
        

        return view('admin_dashboard',
         ['registered_drivers_day' => $registered_drivers_day, 
        'total_drivers' => $total_drivers,
        'bookings'=>$bookings,
        'count'=>$count,
        'registered_passenger_day'=>$registered_passenger_day,
        'total_passenger'=>$total_passenger,
        'total_bookings_day'=> $total_bookings_day,
        'total_bookings_count'=>$total_bookings_count,
        'top_up_day'=>$top_up_day,
        'total_tpc'=>$total_tpc,
        'circullating_tpc'=>$circullating_tpc

    ]);
         
    }
    

    public function passengers(){
        $users=User::where('role',2)->get();
        return view('passenger_list',compact('users'));
    }


 
    public function passenger_accounts(){
        $users=User::where('role',2)
        ->where('Verified',1)
        ->get();

        $count = $users->count();
        return view('passenger_accounts',compact('users','count'));
    }

    public function passenger_accounts_notverified(){
        $users=User::where('role',2)
        ->where('Verified',0)
        ->get();

        $count = $users->count();
      
        return view('passenger_accounts_notverified',compact('users','count'));
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
    public function update_tpc(Request $request, $id)
    {

        // $users = User::where('id',$id)->get();
        // $tpc = $request->input('tpc');

        $data = User::find($id);
        $data->TPC =  $data->TPC + $request->tpc;        
        $data->save();
            
        return redirect('admin/tricycle_drivers/details/'.$id);
        
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
