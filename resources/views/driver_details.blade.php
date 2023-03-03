
<?php
use Carbon\Carbon;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
     
        <title>Dashboard - SB Admin</title>
     
    </head>
    <style>
        .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
            background-color: #d6ffe9;  
        }
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
                    
                    <div class="container-fluid px-4 pt-4">
                    
                    <div class="row">
                    <div class="d-flex justify-content-between">
                        <h3>Name: {{$users[0]->name}} </h3>
                        <h3>Report This User: 
                                    <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#REPORT">
                                        <p class="mb-0">Report</p> 
                                    </button> -->
                                    <a style="color:red;"data-bs-toggle="modal" data-bs-target="#REPORT" href="your link here"><i class="fas fa-exclamation-circle"></i></a>
                         </h3>  
                    </div>
                    </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">email: {{$users[0]->email}}  </li>
                            <li class="breadcrumb-item active">Phone Number: {{$users[0]->PhoneNumber}}  </li>
                            <li class="breadcrumb-item active">Address: {{$users[0]->address}}  </li>
                        </ol>
                                @if ($tpcstatus = 0)
                                    <h5 class="breadcrumb-item ">Account Status: Insufficient TPC</h5> 
                                @else 
                                    <h5 class="">Account Status: Sufficient TPC</h5> 
                                @endif
                                <div class="row">
                                    
                                <h5 class="col-md-6">TraykPila Coins: {{$cashtpc[0]->wallet}} 
                                 <!--
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#TPC">
                                        <p class="mb-0">Top-up TPC</p> 
                                    </button>
                                </h5>  

                                <h5 class="col-md-2">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#TPC">
                                        <p class="mb-0">Cash-out TPC</p> 
                                    </button>
                                </h5>   -->                         
                                </div>

                    <div class="modal fade" id="CASH_OUT" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header bg-warning text-black">
                                <h5 class="modal-title" id="exampleModalLabel">Cash-Out Traykpila Coins</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                            <form action="{{ 'cash_out' }}/{{$driver[0]}}" method="POST">
                            @csrf
                                <div class="mb-3">
                                    <p>Current TraykPila Coins: <h3 id="wallet">{{$cashtpc[0]->wallet}}</h3></p>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Cash out Amount:</label>
                                    <input type="number" name="cashout"class="form-control" min="0" max="300" id="amount" onkeyup=imposeMinMax(this)>
                                    <div id="prompt" class="alert alert-danger mt-3" role="alert">
                                        *Invalid Cash-out, please check your amount
                                    </div>
                                </div>
                           
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                <button id="submit_cashout"type="submit" class="btn btn-primary">Send Amount</button>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    

                    <!-- Modal TPC -->
                    <div class="modal fade" id="TPC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Top-up TraykPila Coins</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                        <form action="{{ 'update_tpc' }}/{{$driver[0]}}" method="POST">
                        @csrf
                            <div class="mb-3">
                                <p>Current TraykPila Coins: <h3>{{$cashtpc[0]->wallet}}</h3></p>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Load amount:</label>
                                <input type="number" name="tpc"class="form-control" min="0" max="300" id="recipient-name" onkeyup=imposeMinMax(this)>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Send Amount</button>
                        </div>
                        </div>
                        </form>
                    </div>
                    </div>
                    <!-- Modal Report -->
                    <div class="modal fade" id="REPORT" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Report This User:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form>
                        <div class="col-md-6">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                             <label class="form-check-label" for="flexCheckDefault">Temporary Restrict</label>
                             <hr class="hr" />
                        </div>
                        <div class="col-md-6">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                             <label class="form-check-label" for="flexCheckDefault">Temporary Block </label>
                             <hr class="hr" />
                        </div>
                        <div class="col-md-6">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                             <label class="form-check-label" for="flexCheckDefault">Permanent Bann </label>
                            
                        </div>
                      
                       
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Send Report</button>
                        </div>
                        </div>
                    </div>
                    </div>
                  
                        <div class="card-header font-weight-bold" style="background-color: #2591c5;">
                            <p class="font-weight-bold text-white text-center mb-0" style="font-weight:bold;"><i class=""></i>Top-Up And Cash-Out</p>
                        </div>
                            <div class="d-flex ">
                                <h5 class="col-xl-6 p-3">
                                        <button type="button" class="btn btn-success w-100 p-3 " data-bs-toggle="modal" data-bs-target="#TPC">
                                            <p class="mb-0">Top-up TPC</p> 
                                        </button>
                                    </h5>  

                                    <h5 class="col-xl-6 p-3 ">
                                        <button type="button" class="btn btn-danger w-100 p-3 " data-bs-toggle="modal" data-bs-target="#CASH_OUT">
                                            <p class="mb-0">Cash-out TPC</p> 
                                        </button>
                                    </h5>  
                            </div>
                     
                                    
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color:  #d08031;">
                                        <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-chart-area me-1"></i>Total Revenue in the month of  {{date('F, Y');}}</p>
                                    </div>
                                    
                                    <div class="card-body"><canvas id="myAreaChart1" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: #2591c3;">
                                        <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-chart-bar me-1 my-0"></i>Total Passenger in the month of  {{date('F, Y');}} </p>
                                    </div>
                          
                                    <div class="card-body"><canvas id="myBarChart1" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> 

                     
                         <div class="card mb-4 shadow round">
                           
                            <div class="card-header font-weight-bold" style="background-color: #2591c3;">
                                <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-table me-3 "></i>Booking History</p>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            
                                            <th>Passenger Name:</th>
                                            <th>Booking Date/Time:</th>
                                            <th>Arrival Date/Time:</th>
                                            <th>Total Pickup time:</th>
                                            <th>Pickup Location:</th>    
                                            <th>Destination:</th>
                                            <th>Body Number:</th>   
                                            <th>Status:</th>    
                                            <th>Fare Received:</th>
                                            <th>Rating:</th>                       
                                        </tr>
                                    </thead>
                                    
                                    
                                    <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                        
                                            <td>{{$booking->passenger}}</td>
                                            <td>{{Carbon::parse($booking->created_at)->format('F d Y g:i A');}}</td>
                                            <td>{{Carbon::parse($booking->updated_at)->format('F d Y g:i A');}}</td>
                                            <th>{{$booking->created_at->diffInMinutes($booking->updated_at)}} min</th>
                                            <td>{{$booking->passenger_location}}</td>
                                            <td>{{$booking->Destination}}</td>
                                            <td>{{$booking->Body_number}}</td>
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

                         <!-- review -->
                        <div class="card mb-4 shadow round">
                            <div class="card-header font-weight-bold" style="background-color: #f3be2b;">
                                <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-table me-3 "></i>Reviews</p>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            
                                            <th>Passenger Name:</th>
                                            <th>Tricyce Body Number</th>
                                            <th>Review Description</th>
                                            <th>ratings</th>
                                            <th>Date</th>
                                                        
                                        </tr>
                                    </thead>
                                    
                                    
                                    <tbody>
                                @foreach ($reviews as $review)
                                        <tr>
                                        
                                            <td>{{$review->name}}</td>
                                            <td>{{$review->bodynumber}}</td>
                                            <td>{{$review->description}}</td>
                                            <td>{{$review->ratings}}</td>
                                            <td>{{$review->created_at}}</td>
                                @endforeach          
                                        </tr>                                                    
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                        <!-- report table -->
                        <div class="card mb-4 shadow round">
                            <div class="card-header font-weight-bold" style="background-color: red;">
                                <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-table me-3 "></i>Report</p>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            
                                            <th>Passenger Name:</th>
                                            <th>Tricyce Body Number</th>
                                            <th>Review Description</th>
                                            <th>Date</th>
                                                        
                                        </tr>
                                    </thead>
                                    
                                    
                                    <tbody>
                           
                                        <tr>
                                        
                                    
                                            <td></td>
                                            <td>March 9, 2023 5:30pm</td>
                                            <td>Speeding</td>
                                            <td>March 9, 2023 5:35pm</td>
                                          
                                        </tr>
                                      <tr>
                                        
                                        <td></td>
                                        <td>March 9, 2023 5:30pm</td>
                                        <td>Good driver</td>
                                        <td>March 9, 2023 5:35pm</td>
                                      
                                    </tr>
                                                      
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

<script>
         const prompt = document.getElementById("prompt");
         prompt.style.display = 'none'; 
         const wallet = document.getElementById("wallet");
         const amount = document.getElementById("amount");
         const button = document.getElementById("submit_cashout");

         amount.addEventListener('input', () => {
         const inputValue = parseFloat(amount.value);
         const headingValue = parseFloat(wallet.textContent);
        //  button.disabled = inputValue > headingValue 

         if(inputValue > headingValue){
            button.disabled = true;
            prompt.style.display = 'block'; 
         }else{
            button.disabled = false;
            prompt.style.display = 'none'; 
         }
      
   
         });

       
      
        
</script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart1");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels:  {!! json_encode($parsed_revenuedate) !!},
        datasets: [{
            label: "Revenue",
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
            data:  [ {!! json_encode($total_revenue) !!}],
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

// Bar Chart Example
var ctx = document.getElementById("myBarChart1");
var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($parsedDates) !!},
        datasets: [{
            label: "Passenger",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data:{!! json_encode($count) !!},
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
                ticks: {
                    min: 0,
                    max: 50,
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
