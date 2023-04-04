<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\tpc;
use App\Models\User;
use App\Models\reports;
use App\Models\payment;
use App\Models\tpclogs;
use App\Models\reviews;


use Carbon\Carbon;


class ChartjsController extends Controller
{


    // ADMIN DASHBOARD
public function generaldetails(){

    $bookings = booking::select('bookings.*','u1.name AS driver','u2.name AS passenger', 't2.body_number','payment.amount')
    ->join('users As u1', 'u1.id', '=', 'bookings.driver_id')
    ->join('users As u2', 'u2.id', '=', 'bookings.passenger_id')
    // ->join('users As u3', 'u3.id', '=', 't2.user_id')
    ->join('tricycles As t2', 't2.id', '=', 'bookings.tricycle_id')
    ->join('payment', 'bookings.id', '=', 'payment.bookings_id')
    ->get();


    $count=$bookings->count(); 
   
 

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



    $total_tpc = tpclogs::select(tpclogs::raw('DATE(created_at) as top_up_day'), tpclogs::raw('SUM(cashin) as total_tpc'))
    ->groupBy('top_up_day')
    ->get();
  

    $top_up_day = $total_tpc->pluck('top_up_day');
    $total_tpc = $total_tpc->pluck('total_tpc');

    
    $cashout = tpclogs::select(tpclogs::raw('DATE(created_at) as cashout_day'), tpclogs::raw('SUM(cashout) as cashout'))
    ->groupBy('cashout_day')
    ->get();

    $daysofcashout = $cashout->pluck('cashout_day');
    $totalcashout = $cashout->pluck('cashout');

   
   
    
    $dates = $top_up_day;
    $top_up_day_parsedDates = [];

    foreach ($dates as $date) {
    $top_up_day_parsedDates[] = Carbon::parse($date)->format('F d');
    }
    
    //TOTAL LABELS
    $circullating_tpc = tpclogs::select(tpclogs::raw('cashin'))        
    ->get();

    $circullating_tpc_cashout = tpclogs::select(tpclogs::raw('cashout'))        
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
    'cashout'=>$cashout,
    'circullating_tpc'=>$circullating_tpc,
    'total_passenger_registered'=>$total_passenger_registered,
    'total_driver_registered'=>$total_driver_registered,
    'minutes'=>$minutes,
    'user_counter'=>$user_counter,
    'daysofcashout'=>$daysofcashout,
    'totalcashout'=>$totalcashout,
    'circullating_tpc_cashout'=>$circullating_tpc_cashout 

    ]);
     
}}
