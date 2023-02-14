<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
    
 
    </head>
    <style>
        body{
            background-color:#e4fff9 !important;
        }
    </style>
    
    <body class="sb-nav-fixed">
        @extends('layouts.navbar')
        <div id="layoutSidenav">
            @extends('layouts.sidebar')
            <div id="layoutSidenav_content">
               
            <main>
                <!-- GENERAL BOOKING NUMBER -->
                <div class="container-fluid px-4">
                        <h3 class="mt-4">Total Booking</h3>
                  
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: #15b4ac;">
                                        <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-table me-3 "></i>Month of March</p>
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: #15b4ac;">
                                        <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-table me-3 "></i>Total Revenue This Week</p>
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> 
                    </div>


                <!-- GENERAL REGISTERED USERS-->
                <div class="container-fluid px-4">
                        <h3 class="mt-4">New Registered</h3>
                  
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: #0c7daa;">
                                        <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-table me-3 "></i>New Passengers in month of March</p>
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart2" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: #0c7daa;">
                                        <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-table me-3 "></i>New Drivers in month of March</p>
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart2" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> 
                    </div>
         



            <!-- GENERAL BOOKING LISTS -->
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">General History Booking Lists  </h3>
                         <div class="card mb-4 shadow round">
                            <div class="card-header font-weight-bold" style="background-color: #25C36B;">
                                <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-table me-3 "></i>Booking Lists</p>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Driver Name:</th>
                                            <th>Passenger Name:</th>
                                            <th>Booking Date/Time:</th>
                                            <th>Arrival Date/Time:</th>
                                            <th>Total Pickup time:</th>
                                            <th>Pickup Location:</th>    
                                            <th>Destination</th>
                                            <th>Body Number</th>   
                                            <th>Status</th>    
                                            <th>Fare Received</th>
                                            <th>Rating</th>                       
                                        </tr>
                                    </thead>
                                    
                                    
                                    <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{$booking->driver}}</td>
                                            <td>{{$booking->passenger}}</td>
                                            <td>March 9, 2023 5:30pm</td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <th>5 mins</th>
                                            <td>Purok 2</td>
                                            <td>{{$booking->Destination}}</td>
                                            <td>{{$booking->body_number}}</td>
                                            @if($booking->status==0)
                                            <td>Failed</td>
                                            @else
                                            <td>Success</td>
                                            @endif
                                            <td>₱15</td>
                                            <td>5.00</td>
                                        </tr>
                                     @endforeach                  
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
      
    </body>
</html>
