<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\User;
use App\Models\tpc;
use App\Models\reports;
use Carbon\Carbon;


class ChartjsController extends Controller
{


    // ADMIN DASHBOARD
public function generaldetails(){
    $bookings = booking::select('bookings.*','u1.name AS driver','u2.name AS passenger', 't2.body_number','tpc.farein' )
    ->join('users As u1', 'u1.id', '=', 'bookings.driver_id')
    ->join('users As u2', 'u2.id', '=', 'bookings.passenger_id')
    // ->join('users As u3', 'u3.id', '=', 'tpc.driver_id')
    // ->join('users As u4', 'u4.id', '=', 'tpc.passenger_id')
    ->join('tpc', 'tpc.id', '=', 'bookings.tpc_id')
    ->join('tricycles As t2', 't2.id', '=', 'bookings.tricycle_id')
    ->join('users As u3', 'u3.id', '=', 't2.user_id')
    ->get();
    $count=$bookings->count(); 
<<<<<<< HEAD
   
 
=======
    // dd ($bookings);
>>>>>>> 417dbe081bfdb7ec5f19a05a016b0a293446b763
    //REGISTERED PASSENGER CHART
    $registered_passenger = User::select(User::raw('DATE(created_at) as registered_drivers_day'), User::raw('COUNT(*) as total_drivers'))
    ->where('role',2)
    ->groupBy('registered_drivers_day')
    ->get();

    $registered_drivers_day = $registered_passenger->pluck('registered_drivers_day');
    $total_drivers = $registered_passenger->pluck('total_drivers');  
    $dates = $registered_drivers_day;
    $registered_driver_parsedDates = [];

    foreach ($dates as $date) {
    $registered_driver_parsedDates[] = Carbon::parse($date)->format('F d');
    }
    //REGISTERED DRIVER CHART

    $registered_driver = User::select(User::raw('DATE(created_at) as registered_passenger_day'), User::raw('COUNT(*) as total_passenger'))
    ->where('role',1)
    ->groupBy('registered_passenger_day')
    ->get();

    $registered_passenger_day = $registered_driver->pluck('registered_passenger_day');  
    $total_passenger = $registered_driver->pluck('total_passenger');  
    $dates = $registered_passenger_day;
    $registered_passenger_parsedDates = [];

    foreach ($dates as $date) {
    $registered_passenger_parsedDates[] = Carbon::parse($date)->format('F d');
    }


    //TOTAL BOOKINGS CHART

    $total_bookings = booking::Select(booking::raw('DATE(created_at) as total_bookings_day'),booking::raw('COUNT(*) as total_bookings_count'))
    ->groupBy('total_bookings_day')
    ->get();
    
    $total_bookings_day = $total_bookings->pluck('total_bookings_day');
    $total_bookings_count = $total_bookings->pluck('total_bookings_count');

    $dates = $total_bookings_day;
    $total_bookings_day_parsedDates = [];

    foreach ($dates as $date) {
    $total_bookings_day_parsedDates[] = Carbon::parse($date)->format('F d');
    }



    //TPC CIRCULATTING SUPPLY CHART

    $total_tpc = User::select(User::raw('DATE(updated_at) as top_up_day'), User::raw('SUM(tpcw) as total_tpc'))
   
    ->groupBy('top_up_day')
    ->get();
  

    $top_up_day = $total_tpc->pluck('top_up_day');
    $total_tpc = $total_tpc->pluck('total_tpc');
    
    $dates = $top_up_day;
    $top_up_day = [];

    foreach ($dates as $date) {
    $top_up_day_parsedDates[] = Carbon::parse($date)->format('F d');
    }
    
    //TOTAL LABELS
    $circullating_tpc = User::select(User::raw('tpcw'))        
    ->get();
    
    $total_passenger_registered=User::where('role',2)
    ->get(); 

    $total_driver_registered=User::where('role',1)
    ->get();
    

    //OVER ALL DONUT CHART
    $results = booking::select('bookings.*')
    ->select(booking::raw('CASE
    WHEN TIMESTAMPDIFF(MINUTE, created_at, updated_at) > 20 THEN "20 minutes above"
    ELSE CONCAT(FLOOR(TIMESTAMPDIFF(MINUTE, created_at, updated_at) / 5) * 5, "-", FLOOR(TIMESTAMPDIFF(MINUTE, created_at, updated_at) / 5) * 5 + 5," minutes")
    END as diff_in_minutes'))
    ->selectRaw('COUNT(*) as users ')
    ->orderBy('created_at')
    ->groupBy('diff_in_minutes')
    ->get();

   
    $minutes = $results->pluck('diff_in_minutes');
    $user_counter = $results->pluck('users');
 

    $label = "User";


    
    



  
    return view('admin_dashboard',
     ['registered_driver_parsedDates' => $registered_driver_parsedDates, 
    'total_drivers' => $total_drivers,
    'bookings'=>$bookings,
    'count'=>$count,
    'registered_passenger_parsedDates'=>$registered_passenger_parsedDates,
    'total_passenger'=>$total_passenger,
    'total_bookings_day_parsedDates'=> $total_bookings_day_parsedDates,
    'total_bookings_count'=>$total_bookings_count,
    'top_up_day_parsedDates'=>$top_up_day_parsedDates,
    'total_tpc'=>$total_tpc,
    'circullating_tpc'=>$circullating_tpc,
    'total_passenger_registered'=>$total_passenger_registered,
<<<<<<< HEAD
    'total_driver_registered'=>$total_driver_registered,
    'minutes'=>$minutes,
    'user_counter'=>$user_counter,
    'label'=>$label

   
=======
    'total_driver_registered'=>$total_driver_registered
>>>>>>> 417dbe081bfdb7ec5f19a05a016b0a293446b763

]);
     
}}
