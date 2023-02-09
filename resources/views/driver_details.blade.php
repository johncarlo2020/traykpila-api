<!DOCTYPE html>
<html lang="en">
    <head>
     
        <title>Dashboard - SB Admin</title>
     
    </head>
    <style>
        .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
            background-color: #d6ffe9;  
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
                                @if (($users[0]->Verified) == 0)
                                    <h5 class="breadcrumb-item ">Account Status: Not Verified</h5> 
                                @else 
                                    <h5 class="">Account Status: Verified</h5> 
                                @endif
                                <h5 class="">TraykPila Coins: {{$users[0]->TPC}} 
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <p class="mb-0">Top-up TPC</p> 
                                    </button>
                                </h5>  

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Top-up TraykPila Coins</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: #f3be2b;">
                                        <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-chart-area me-1"></i>Total Revenue This Week</p>
                                    </div>
                                    
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4 shadow round">
                                    <div class="card-header font-weight-bold" style="background-color: #2591c3;">
                                        <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-chart-bar me-1 my-0"></i>Total Passenger This Week</p>
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
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
