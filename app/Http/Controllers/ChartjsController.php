<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\User;
use App\Models\reports;

class ChartjsController extends Controller
{

    public function chart_controller(){

        // $registered = User::select(User::raw('MONTH(created_at) as month'), User::raw('COUNT(*) as total'))
        //                 ->groupBy('month')
        //                 ->get();

        //                 $months = $registered->pluck('month');
        //                 $totals = $registered->pluck('total');


      
        //                  return view('admin_dashboard', ['months' => $months, 'totals' => $totals]);


    }
}
