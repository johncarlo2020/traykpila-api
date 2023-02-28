
<?php

use Carbon\Carbon;
?>
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
    <span class="loader"></span>
    <body class="sb-nav-fixed">
        @extends('layouts.navbar')
        <div id="layoutSidenav">
            @extends('layouts.sidebar')
            <div id="layoutSidenav_content">

            <main>
                <!-- GENERAL BOOKING NUMBER -->
                <div class="container-fluid px-4">


                    <div class="chart-container">   
                        <h3 class="mt-4">Bookings</h3>
                                <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: #15b4ac;">
                                        <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-table me-3 "></i>Total booking in the month of {{date('F, Y');}}</p>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="text-center text-primary pb-1">TOTAL BOOKINGS: <span class="text-success">{{$bookings->COUNT('id')}}</span> </h3>
                                        <canvas id="myBarChart1" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>                      
                    </div>


                <!-- GENERAL REGISTERED USERS-->
                <div class="container-fluid px-4">
                        <h3 class="">Newly Registered</h3>

                    <div class="row">
                        <div class="col-xl-6">
                                <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: #0c7daa;">
                                        <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-table me-3 "></i>New Passengers in month of {{date('F, Y');}}</p>
                                    </div>
                                    <div class="card-body">
                                    <h4 class="text-center text-primary pb-1">TOTAL PASSENGER: <span class="text-success">{{$total_passenger_registered->count('id')}}</span></h4>
                                        <canvas id="myAreaChart3" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                        </div>
                            <div class="col-xl-6">
                                <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: #0c7daa;">
                                        <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-table me-3 "></i>New Drivers in month of {{date('F, Y');}}</p>
                                    </div>
                                    <div class="card-body">
                                    <h4 class="text-center text-primary pb-1">TOTAL DRIVER: <span class="text-success">{{$total_driver_registered->count('id')}}</span></h4>
                                        <canvas id="myAreaChart4" width="100%" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="chart-container">
                            <h3 class="">Traykpila coins Top up and Cash out Coins </h3>
                            <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: #0c7daa;">
                                        <p class=" text-center font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa fa-industry me-3 "></i>Traykpila coins circullating supply </p>
                                    </div>
                                    <div class="card-body ">
                                   <div class="d-flex justify-content-around ">
                                    <h4 class="text-primary"> TOTAL CIRCULLATING TPC: <span class="text-success">{{$circullating_tpc->SUM('cashin')-$circullating_tpc_cashout->SUM('cashout')}}</h4>
                                    <!-- <h4 class="text-primary"> TOTAL TOP-UP TPC: <span class="text-success">{{$circullating_tpc->SUM('cashin')}}</h4> -->
                                
                                    <h4 class="text-primary"> TOTAL CASH OUT TPC: <span class="text-danger">-{{$circullating_tpc_cashout->SUM('cashout')}}</h4>
                                  
                                   </div>
                                         <canvas id="myChart"></canvas>

                                    </div>
                                </div>
                            
                            </div>   
                            <div class="chart-container">
                            <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: green;">
                                        <p class=" text-center font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-clock me-3 "></i>Over All Pickup time </p>
                                    </div>
                                    <div class="card-body ">
                                    <h4 class="text-center text-primary pb-1">Booking Arival Time by minutes: <span class="text-success"></span></h4>
                                      <canvas id="myPieChart"></canvas>
                                    </div>
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
                                            <td>{{Carbon::parse($booking->created_at)->format('F d Y g:i A');}}</td>
                                            <td>{{Carbon::parse($booking->updated_at)->format('F d Y g:i A');}}</td>
                                            <td>{{$booking->created_at->diffInMinutes($booking->updated_at)}} min</td>
                                            <td>{{$booking->passenger_location}}</td>
                                            <td>{{$booking->Destination}}</td>
                                            <td>{{$booking->body_number}}</td>
                                            @if($booking->status==0)
                                            <td>Failed</td>
                                            @else
                                            <td>Success</td>
                                            @endif
                                   
                                            <td>{{$booking->amount}}</td>
                                     
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
        <script src="https://code.jscharting.com/latest/jscharting.js"></script>

    

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <!-- <script src="{{url('js/datatables-simple-demo.js')}}"></script>
        <script src="{{url('js/scripts.js')}}"></script>
        <script src="{{url('assets/demo/chart-bar-demo.js')}}"></script> -->




<script>
 // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myDoughnutChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: {!! json_encode($minutes) !!},
    datasets: [{
   
      data:{!! json_encode($user_counter) !!} ,
      backgroundColor: ['#dc3545','#ffc107','#007bff','#28a745'],
    }],
  },
});

</script>
<script>
            // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Passenger Chart Area
var ctx = document.getElementById("myAreaChart3");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels:  {!! json_encode($registered_driver_parsedDates) !!},
        datasets: [{
            label: "Registered Passenger",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.2)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: {!! json_encode($total_drivers) !!},
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                scaleLabel: {
            display: true,
            labelString: 'Passengers',
            fontSize: 20
          },
                ticks: {
                    min: 0,
                    max: 100,
                    maxTicksLimit: 10
                    
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: false
        }
    }
});

        </script>

       <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Driver Chart Area
var ctx = document.getElementById("myAreaChart4");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels:  {!! json_encode($registered_passenger_parsedDates) !!},
        datasets: [{
            label: "Registered Driver",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.2)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: {!! json_encode($total_passenger) !!},
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                scaleLabel: {
            display: true,
            labelString: 'Drivers',
            fontSize: 20
          },
                ticks: {
                    min: 0,
                    max: 100,
                    maxTicksLimit: 10
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: false
        }
    }
});
</script>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Total Bookings Chart Bar
var ctx = document.getElementById("myBarChart1");
var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:  {!! json_encode($total_bookings_day_parsedDates) !!},
        datasets: [{
            label: "Bookings",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data:  {!! json_encode($total_bookings_count) !!},
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 6
                }
            }],
            yAxes: [{
                scaleLabel: {
            display: true,
            labelString: 'Bookings',
            fontSize: 20
          },
                ticks: {
                    min: 0,
                    max: 30,
                    maxTicksLimit: 10
                },
                gridLines: {
                    display: true
                }
            }],
        },
        legend: {
            display: false
        }
    }
});
</script>






<script>
var ctx = document.getElementById('myChart').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($top_up_day_parsedDates) !!},
        datasets: [{
            label: 'Top-Ups',
            data: {!! json_encode($total_tpc) !!},
            backgroundColor: '#7eff84',
            borderColor: '#002709',
            borderWidth: 1
        }, {
            label: 'Cash Out',
            data:{!! json_encode($totalcashout) !!},
            backgroundColor: '#Ff3a3a',
            borderColor: '#F30202',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                min: -100,
                max: 100,
                title: {
                    display: true,
                    text: 'Y-Axis Label'
                }
            }
        }
    }
});

</script>


