<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="/css/adminstyle.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
     @extends('layouts.navbar')
        <div id="layoutSidenav">
        @extends('layouts.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Name: Mang Kanor </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">email: mangkanor@gmail.com </li>
                        </ol>
                        <!-- <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Tricylce Drivers</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Passengers </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Terminals </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
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
                        </div>  -->
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
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>March 9, 2023 5:30pm </td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
                               
                                       
                                        </tr>
                                        <tr>
                                        <td>Tiger Nixon</td>
                                            <td>March 9, 2023 5:30pm </td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
                                        </tr>
                                        <tr>
                                        <td>Tiger Nixon</td>
                                            <td>March 9, 2023 5:30pm </td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
                                        </tr>
                                        <tr>
                                        <td>Tiger Nixon</td>
                                            <td>March 9, 2023 5:30pm </td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
                                        </tr>
                                        <tr>
                                        <td>Tiger Nixon</td>
                                            <td>March 9, 2023 5:30pm </td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
                                        </tr>
                                        <tr>
                                        <td>Tiger Nixon</td>
                                            <td>March 9, 2023 5:30pm </td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
                                        </tr>
                                        <tr>
                                        <td>Tiger Nixon</td>
                                            <td>March 9, 2023 5:30pm </td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
                                        </tr>
                                        <tr>
                                        <td>Tiger Nixon</td>
                                            <td>March 9, 2023 5:30pm </td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
                                        </tr>
                                        <tr>
                                        <td>Tiger Nixon</td>
                                            <td>March 9, 2023 5:30pm </td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
                                        </tr>
                                        <tr>
                                        <td>Tiger Nixon</td>
                                            <td>March 9, 2023 5:30pm </td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
                                        </tr>
                                        <tr>
                                        <td>Tiger Nixon</td>
                                            <td>March 9, 2023 5:30pm </td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
                                        </tr>
                                        <tr>
                                        <td>Tiger Nixon</td>
                                            <td>March 9, 2023 5:30pm </td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
                                        </tr>
                                        <tr>
                                        <td>Tiger Nixon</td>
                                            <td>March 9, 2023 5:30pm </td>
                                            <td>March 9, 2023 5:35pm</td>
                                            <td>Purok 2</td>
                                            <td>Purok 3</td>
                                            <td>Success</td>
                                            <td>₱15</td>
                                            <td>5.00</td>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{url('js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{url('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{url('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{url('js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
