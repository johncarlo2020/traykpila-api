<?php

namespace App\Http\Controllers;
use App\Models\booking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $bookings = booking::select('bookings.*','u1.name AS driver','u2.name AS passenger', 'tricycles.body_number')
        // ->join('users As u1', 'u1.id', '=', 'bookings.driver_id')
        // ->join('users As u2', 'u2.id', '=', 'bookings.passenger_id')
        // ->join('tricycles', 'tricycles.id', '=', 'bookings.passenger_id')
        // ->get();

        // return view('admin_dashboard',compact('bookings'));
        return view('home');
    }
    public function admin()
    {
        $bookings = booking::select('bookings.*','u1.name AS driver','u2.name AS passenger', 'tricycles.body_number')
        ->join('users As u1', 'u1.id', '=', 'bookings.driver_id')
        ->join('users As u2', 'u2.id', '=', 'bookings.passenger_id')
        ->join('tricycles', 'tricycles.id', '=', 'bookings.passenger_id')
        ->get();

        return view('admin_dashboard',compact('bookings'));
        // return view('home');
    }
}
