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
    <body class="sb-nav-fixed">
        @extends('layouts.navbar')
        <div id="layoutSidenav">
            @extends('layouts.sidebar')
            <div id="layoutSidenav_content">
                <!-- <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Lists of Records</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Tricylce Drivers</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('tryk_drivers')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Passengers </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('passenger_details')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Terminals </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('admin/terminal_list')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Reports</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="container-fluid px-4 mt-5">
                        <div class="row">
                            <div class="col-xl-6">
                                <h2>Registered Accounts</h2>
                                <ol class="breadcrumb mb-4 ">
                                        <li class="breadcrumb-item active">Drivers Accounts</li>
                                    </ol>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="card bg-primary text-white mb-4">
                                                <div class="card-body">Verified Drivers</div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a class="small text-white stretched-link" href="{{route('tryk_drivers_accounts')}}">View Details</a>
                                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="card bg-warning text-white mb-4">
                                                <div class="card-body">Not Verified Drivers</div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a class="small text-white stretched-link" href="{{route('tryk_drivers_accounts_notverified')}}">View Details</a>
                                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-xl-6">
                                <h2 class="text-white">Registered Accounts</h2>
                                <ol class="breadcrumb mb-4 ">
                                        <li class="breadcrumb-item active">Passengers Accounts</li>
                                    </ol>
                                    <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="card bg-success text-white mb-4">
                                            <div class="card-body">Verified Passengers </div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="{{route('passenger_details_accounts')}}">View Details</a>
                                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="card bg-danger text-white mb-4">
                                            <div class="card-body">Not Verified Passengers</div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a class="small text-white stretched-link" href="{{route('passenger_details_accounts_notverified')}}">View Details</a>
                                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>    

                </main>  -->

                <!-- <main>
                <div class="container-fluid py-3 px-3">
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
                                            <th>Destination</th>
                                            <th>Body Number</th>   
                                            <th>Status</th>    
                                            <th>Fare Received</th>
                                            <th>Rating</th>                       
                                        </tr>
                                    </thead>
                                    
                                    
                                    <tbody>
                                
                                        <tr>
                                            <td>{{}}</td>
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
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>    
                </main> -->

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
