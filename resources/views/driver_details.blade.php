
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
                    </div>
                    </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">email: {{$users[0]->email}}  </li>
                            <li class="breadcrumb-item active">Phone Number: {{$users[0]->PhoneNumber}}  </li>
                            <li class="breadcrumb-item active">Address: {{$users[0]->address}}  </li>
                        </ol>
                                
                                    <h5 class="">Account Status: Sufficient TPC</h5> 
                                 
                        <div class="row">
                            <div class="col-xl-12">
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
                                            <th>Status:</th>    
                                            <th>Fare Received:</th>                  
                                        </tr>
                                    </thead>
                                    
                                    
                                    <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                        
                                            <td>{{$booking->passenger}}</td>
                                            <td>{{Carbon::parse($booking->created_at)->format('F d Y H:i');}}</td>

                                            <td>{{Carbon::parse($booking->updated_at)->format('F d Y H:i');}}</td>
                                            <th>{{$booking->created_at->diffInMinutes($booking->updated_at)}} min</th>
                                            @if($booking->status==0)
                                            <td>Failed</td>
                                            @else
                                            <td>Success</td>
                                            @endif
                                            <td>{{$booking->fare}}</td>
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
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
