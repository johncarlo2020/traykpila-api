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
