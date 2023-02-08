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
    
    </head>
    <body class="sb-nav-fixed">
      
    @extends('layouts.navbar')
        <div id="layoutSidenav">
        @extends('layouts.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Travel Records </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Travel Records</li>
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
                        </div> -->
                        <!-- <div class="row">
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
                        </div> -->
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Passenger Name</th>
                                            <th>Date</th>
                                            <th>From</th>
                                            <th>Destination</th>    
                                            <th>Drivers Name</th>
                                            <th>Status</th>
                                            <th> </th>                                  
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Passenger Name</th>
                                            <th>Date</th>
                                            <th>From</th>
                                            <th>Destination</th>
                                            <th>Drivers Name</th> 
                                            <th>Status</th>
                                            <th> </th>      

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>02/1/2023</td>
                                            <td>Edinburgh</td>
                                            <td>Tokyo</td>
                                            <td>MANG KANOR</td>
                                            <td>Success</td>
                                            <td><a href="#">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>02/1/2023</td>
                                            <td>Tokyo</td>
                                            <td>Edinburgh</td>
                                            <td>MANG KANOR</td>
                                            <td>Success</td>
                                
                                            <td><a href="#">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>02/1/2023</td>
                                            <td>San Francisco</td>
                                            <td>Edinburgh</td>
                                            <td>MANG KANOR</td>
                                            <td>Success</td>
                                       
                                            <td><a href="#">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>02/1/2023</td>
                                            <td>Edinburgh</td>
                                            <td>San Francisco</td>
                                            <td>MANG KANOR</td>
                                            <td>Cancelled</td>
                                       
                                            <td><a href="#">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>02/1/2023</td>
                                            <td>Tokyo</td>
                                            <td>Edinburgh</td>
                                            <td>MANG KANOR</td>
                                            <td>Canelled</td>
                                         
                                            <td><a href="#">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>02/1/2023</td>
                                            <td>New York</td>
                                            <td>Tokyo</td>
                                            <td>MANG KANOR</td>
                                            <td>Canelled</td>
                                            <td><a href="#">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Herrod Chandler</td>
                                            <td>02/1/2023</td>
                                            <td>San Francisco</td>
                                            <td>Tokyo</td>
                                            <td>MANG JOSE</td>
                                            <td>Canelled</td>
                                      
                                            <td><a href="#">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>02/1/2023</td>
                                            <td>Tokyo</td>
                                            <td>Manila</td>
                                            <td>MANG KANOR</td>
                                            <td>Canelled</td>
                                       
                                            <td><a href="#">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>02/1/2023</td>
                                            <td>San Francisco</td>
                                            <td>Tokyo</td>
                                            <td>MANG JOSE</td>
                                            <td>Canelled</td>
                                        
                                            <td><a href="#">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Sonya Frost</td>
                                            <td>02/1/2023</td>
                                            <td>Edinburgh</td>
                                            <td>Tokyo</td>
                                            <td>MANG JOSE</td>
                                            <td>Canelled</td>
                                         
                                            <td><a href="#">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Jena Gaines</td>
                                            <td>02/1/2023</td>
                                            <td>London</td>
                                            <td>New York</td>
                                            <td>MANG KANOR</td>
                                            <td>Canelled</td>
                                       
                                            <td><a href="#">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Quinn Flynn</td>
                                            <td>02/1/2023</td>
                                            <td>Edinburgh</td>
                                            <td>London</td>
                                            <td>MANG KANOR</td>
                                            <td>Success</td>
                                    
                                            <td><a href="#">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Charde Marshall</td>
                                            <td>02/1/2023</td>
                                            <td>San Francisco</td>
                                            <td>New York</td>
                                            <td>MANG KANOR</td>
                                            <td>Canelled</td>
                                   
                                            <td><a href="#">ViewDetails</a></td>
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
