<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\tpc;
use App\Models\User;
use App\Models\reports;
use App\Models\payment;
use App\Models\reviews;
use App\Models\License;
use App\Models\tricycle;
use App\Events\DepositEvent;



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

        $cashtpc = tpc::select('tpc.users_id as driver')
        ->join('users','users.id','=','tpc.users_id')
        ->where('tpc.users_id',$id)
        ->get();


        $driver = $cashtpc->pluck('driver');



        $reviews = reviews::where('users_id',$id)
        ->get();

       

        $bookings = booking::select('bookings.*','u2.name AS passenger')
        ->join('users As u1', 'u1.id', '=', 'bookings.driver_id')
        ->join('users As u2', 'u2.id', '=', 'bookings.passenger_id')
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



        return view('driver_details',compact('users','bookings','parsedDates','count','total','cashtpc','driver','reviews'));
     }





    public function passengerdetails($id){
        $users=User::where('id',$id)->get();
        // $cashtpc=tpc::select('tpc.*','u1.name AS driver','SUM(tpc.farein)','SUM(tpc.cashin)','SUM(tpc.cashin) + SUM(tpc.farein) as total')
        $cashtpc = tpc::select('tpc.users_id as passenger')
        ->join('users','users.id','=','tpc.users_id')
        ->where('tpc.users_id',$id)
        ->get();




        $passenger = $cashtpc->pluck('passenger');


        $bookings = booking::select('bookings.*','u2.name AS driver','payment.amount')
        ->join('users As u1', 'u1.id', '=', 'bookings.passenger_id')
        ->join('users As u2', 'u2.id', '=', 'bookings.driver_id')
        // ->join('users As u3', 'u3.id', '=', 't2.user_id')
        ->join('payment', 'bookings.id', '=', 'payment.bookings_id')
        ->where('bookings.passenger_id',$id)
        ->get();





        $total_bookings = booking::select(booking::raw('DATE(created_at) as total_booking'), booking::raw('COUNT(id) as total_booking_count'))
        ->where('passenger_id',$id)
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

        // }





        return view('passenger_details',compact('users','bookings','parsedDates','count','total','cashtpc'));
        // $users=User::where('id',$id)->get();




        // return view('passenger_details',compact('users','bookings'));


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

    public function review_documents($id){

        $users=User::where('id',$id)->get();
        $license = License::where('users_id',$id)->get();
        $tricycle = tricycle::where('user_id',$id)->get();

        return view('review_documents',compact('users','license','tricycle'));

    }

    public function verify_driver(Request $request, $id){

        $item = User::where('id',$id)->firstOrFail();
        $item->Verified = 1;
        $item->save();

        return redirect('admin/drivers_accounts_notverified');
    }

    public function deposit_request(Request $request){

        $tpcs= Tpc::with('user')->where('status', 0)->get();


        return view('deposit_request',compact('tpcs'));

    }

    public function deposit_accept(Request $request){

        $id = $request->input('id');

        $tpc = TPC::find($id);

            if ($tpc) {
                // Update the status
                $tpc->status = 1;
                $user=User::find($request->input('user_id'));
                $user->balance+=$tpc->amount;
                $user->save();
                $tpc->save();
                $user->tpc=$tpc;

                event(new DepositEvent($tpc,$user));



                // Return a success response
                return response()->json(['message' => 'TPC status updated successfully','data'=>$user]);
            }

            // Return an error response if the TPC was not found
            return response()->json(['error' => 'TPC not found'], 404);


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
