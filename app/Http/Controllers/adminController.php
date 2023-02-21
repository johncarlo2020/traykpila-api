<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\tpc;
use App\Models\User;
use App\Models\reports;
use Carbon\Carbon;

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
        // $cashtpc=tpc::select('tpc.*','u1.name AS driver','SUM(tpc.farein)','SUM(tpc.cashin)','SUM(tpc.cashin) + SUM(tpc.farein) as total')
        $cashtpc=tpc::select(tpc::raw('SUM(tpc.farein) AS farein'),tpc::raw('SUM(tpc.cashin) AS cashin'),tpc::raw('SUM(tpc.cashin) + SUM(tpc.farein) as totals'),tpc::raw('tpc.tpcstatus AS tpcstatus'),tpc::raw('tpc.driver_id AS driver'))
        ->join('users As u1', 'u1.id', '=', 'tpc.driver_id')
        ->where('tpc.driver_id',$id)
        ->groupBy('driver_id','tpcstatus')
        ->get();
        $driver = $cashtpc->pluck('driver');
        $tpcstatus = $cashtpc->pluck('tpcstatus');
    //  dd($tpcstatus);
        $fareinrev = $cashtpc->pluck('farein');
        $cashinrev = $cashtpc->pluck('cashin');
        $totalrev = $cashtpc->pluck('totals');


        $bookings=booking::select('bookings.*','users.name AS passenger','tpc.cashin', 'tpc.farein','tricycles.body_number AS Body_number')
        ->join('users', 'users.id', '=', 'bookings.driver_id')
        ->join('tpc', 'tpc.id', '=', 'bookings.tpc_id')
        ->join('users As u1', 'u1.id', '=', 'tpc.driver_id')
        ->join('tricycles','tricycles.id','=','bookings.tricycle_id')
        ->where('bookings.driver_id',$id)
        ->get();


        $total_bookings = booking::select(booking::raw('DATE(created_at) as total_booking'), booking::raw('COUNT(id) as total_booking_count'))
        ->where('driver_id',$id)
        ->groupBy('total_booking')
        ->get();

        $total = $total_bookings->pluck('total_booking');
        $count = $total_bookings->pluck('total_booking_count');

        // $date = Carbon::parse('2023-02-19','2023-02-14');

        // dd ($date->format('l jS F Y'));
        
        $dates = $total;

        $parsedDates = [];

        foreach ($dates as $date) {
        $parsedDates[] = Carbon::parse($date)->format('F d');

        }

        $fareintpc =  booking::select(tpc::raw('SUM(tpc.cashin) as cashin'),tpc::raw('SUM(tpc.farein)'),booking::raw('SUM(tpc.cashin) + SUM(tpc.farein) as total'))
        ->join('tpc', 'tpc.id', '=', 'bookings.tpc_id')
        ->join('users as u1', 'u1.id', '=', 'bookings.driver_id')  
        ->join('users as u2', 'u2.id', '=', 'tpc.driver_id')            
        ->where('bookings.driver_id',$id)
        ->groupBy('cashin')
        ->get();

        // $faretpc = $fareintpc->pluck('total');

        // $cashintpc = booking::select(tpc::raw('SUM(tpc.farein)'),tpc::raw('SUM(tpc.cashin)'),tpc::raw('SUM(tpc.cashin) + SUM(tpc.farein) as total'))
        // ->join('tpc','tpc.id', '=', 'bookings.tpc_id')  
        // ->join('users as u2', 'u2.id', '=', 'tpc.driver_id')            
        // ->where('tpc.driver_id',$id)
        // ->groupBy('cashin')
        // ->get();

        // $cashtpc = $cashintpc->pluck('total');

    
       


        $total_revenue = booking::select(booking::raw('DATE(bookings.created_at) as bookings_date'),tpc::raw('SUM(tpc.farein) as revenue'))
        ->join('tpc', 'tpc.id', '=', 'bookings.tpc_id')
        ->join('users as u1', 'u1.id', '=', 'bookings.driver_id')  
        ->join('users as u2', 'u2.id', '=', 'tpc.driver_id')            
        ->where('bookings.driver_id',$id)
        ->groupBy('bookings_date')
        ->get();

        $revenue_date = $total_revenue->pluck('bookings_date');
        $sum = $total_revenue->pluck('revenue');
        // $total=$total_revenue->pluck('total');
        $dates = $revenue_date;

         $parsedDates = [];

        foreach ($dates as $date) {
        $parsedDates[] = Carbon::parse($date)->format('F d');
       
      
        }

       
        
        

        return view('driver_details',compact('users','bookings','parsedDates','count','revenue_date','sum','total','cashtpc','totalrev','cashinrev','fareinrev','driver','tpcstatus'));
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

        //  $users = User::where('id',$id)->get();
        // $tpc = $request->input('tpc');

        // $data = User::find($id);    
        // $data->save();
        
        $user=User::find($id); 
    
        $tpc = new tpc;
 
        $tpc->cashin = $request->tpc ;
        $tpc->driver_id = $user->id;
        $tpc->tpcstatus=0;
        $tpc->wallet=0;
        $tpc->cashout=0;
        $tpc->farein=0;
        $tpc->fareout=0;
 
        $tpc->save();
    
   
       
            
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