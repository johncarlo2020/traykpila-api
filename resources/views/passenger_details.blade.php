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
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Name: {{$users[0]->name}} </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">email: {{$users[0]->email}} </li>
                            <li class="breadcrumb-item active">Phone Number: {{$users[0]->PhoneNumber}} </li>
                            <li class="breadcrumb-item active">Address: {{$users[0]->address}} </li>
                        </ol>
                        @if ($tpcstatus = 0)
                                    <h5 class="breadcrumb-item ">Account Status: Insufficient TPC</h5> 
                                @else 
                                    <h5 class="">Account Status: Sufficient TPC</h5> 
                                @endif
                                <div class="row">
                                <h5 class="col-md-6">TraykPila Coins: {{$totalrev[0]}} 
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#TPC">
                                        <p class="mb-0">Top-up TPC</p> 
                                    </button>
                                </h5>  
                                <h5 class="col-md-6">Report This User: 
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#REPORT">
                                        <p class="mb-0">Report</p> 
                                    </button>
                                </h5>   
                                </div>

                                

                    <!-- Modal TPC -->
                    <div class="modal fade" id="TPC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Top-up TraykPila Coins</h5>
                            <button name="top-up" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        
                        <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <p>Current TraykPila Coins: <h3>₱2</h3></p>
                                
                                
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Load amount:</label>
                                <input type="number" class="form-control" min="0" max="300" id="recipient-name" onkeyup=imposeMinMax(this)">
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Send Amount</button>
                        </div>
                        </div>
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

                    

                    
                                    
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: #f3be2b;">
                                        <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-chart-area me-1"></i>Total Top up this week</p>
                                    </div>
                                    
                                    <div class="card-body"><canvas id="myAreaChart1" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: #2591c3;">
                                        <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-chart-bar me-1 my-0"></i>Total Booking This Week</p>
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart1" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> 
                         <div class="card mb-4 shadow round">
                            <div class="card-header font-weight-bold" style="background-color: #25C36B;">
                                <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-table me-3 "></i>Booking History</p>
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple" class="table table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            
                                            <th>Driver Name:</th>
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
                                        
                                            <td>{{$booking->driver}}</td>
                                            <td>March 9, 2023 5:30pm</td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <th>5 mins</th>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>2209</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
                                        </tr>
                                     @endforeach                     
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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

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
        labels: ['day','day','day','day'],
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
            data: [10, 20, 30, 50, 30, 20, 40, 50, 60, 70, 30, 20, 50, 12],
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
        labels: ['day','day','day','day'],
        datasets: [{
            label: "Passenger",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data: [10, 20, 30, 50, 30, 20, 40, 50, 60, 70, 30, 20, 50, 12],
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
