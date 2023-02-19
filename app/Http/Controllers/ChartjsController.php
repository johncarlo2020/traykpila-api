<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\User;
use App\Models\reports;
use Carbon\Carbon;


class ChartjsController extends Controller
{


// ADMIN DASHBOARD
public function generaldetails(){
    $bookings = booking::select('bookings.*','u1.name AS driver','u2.name AS passenger', 'tricycles.body_number')
    ->join('users As u1', 'u1.id', '=', 'bookings.driver_id')
    ->join('users As u2', 'u2.id', '=', 'bookings.passenger_id')
    ->join('tricycles', 'tricycles.id', '=', 'bookings.passenger_id')
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

    $total_tpc = User::select(User::raw('DATE(updated_at) as top_up_day'), User::raw('SUM(TPC) as total_tpc'))
   
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
    $circullating_tpc = User::select(User::raw('TPC'))        
    ->get(); 
    
    $total_passenger_registered=User::where('role',2)->get();
    $total_driver_registered=User::where('role',1)->get();
    
    
    
    

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
    'total_driver_registered'=>$total_driver_registered

]);
     
}}
