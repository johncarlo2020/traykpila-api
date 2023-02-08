<!DOCTYPE html>
<html lang="en">
    <head>
     
        <title>Dashboard - SB Admin</title>
     
    </head>
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
                        </ol>
                  
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Total Passenger This Week
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Total Revenue This Week
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> 
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Passenger Name:</th>
                                            <th>Travel Date/Time:</th>
                                            <th>Arrival Date/Time:</th>
                                            <th>Pickup Location:</th>    
                                            <th>Destination</th>   
                                            <th>Status</th>    
                                            <th>Fare Received</th>
                                            <th>Rating</th>                                  
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Passenger Name:</th>
                                            <th>Travel Date/Time:</th>
                                            <th>Arrival Date/Time:</th>
                                            <th>Pickup Location:</th>    
                                            <th>Destination</th>   
                                            <th>Status</th>    
                                            <th>Fare Received</th>
                                            <th>Rating</th>    

                                        </tr>
                                    </tfoot>
                                    
                                    <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{$booking->passenger}}</td>
                                            <td> {{}}</td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
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
