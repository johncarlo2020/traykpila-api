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
       
    </head>
    <body class="sb-nav-fixed">
    @extends('layouts.navbar')
        <div id="layoutSidenav">
        @extends('layouts.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Driver Lists</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Driver Lists</li>
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
                                            <th>Name</th>
                                            <th>Body Number</th>
                                            <th>Phone Number</th>
                                            <th>Age</th>    
                                            <th></th>                                 
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Body Number</th>
                                            <th>Status</th>
                                            <th>Age</th>
                                            <th></th> 

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>0239</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                               
                                              <td><a href="{{url('/admin/tricycle_driver_details')}}">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>0232</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                
                                              <td><a href="{{url('/admin/tricycle_driver_details')}}">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>0235</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                       
                                              <td><a href="{{url('/admin/tricycle_driver_details')}}">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>0231</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                       
                                              <td><a href="{{url('/admin/tricycle_driver_details')}}">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>0236</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                         
                                              <td><a href="{{url('/admin/tricycle_driver_details')}}">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>0237</td>
                                            <td>New York</td>
                                            <td>61</td>
                                              <td><a href="{{url('/admin/tricycle_driver_details')}}">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Herrod Chandler</td>
                                            <td>0221</td>
                                            <td>San Francisco</td>
                                            <td>59</td>
                                      
                                              <td><a href="{{url('/admin/tricycle_driver_details')}}">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>0238</td>
                                            <td>Tokyo</td>
                                            <td>55</td>
                                       
                                              <td><a href="{{url('/admin/tricycle_driver_details')}}">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>0211</td>
                                            <td>San Francisco</td>
                                            <td>39</td>
                                        
                                              <td><a href="{{url('/admin/tricycle_driver_details')}}">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Sonya Frost</td>
                                            <td>0241</td>
                                            <td>Edinburgh</td>
                                            <td>23</td>
                                         
                                              <td><a href="{{url('/admin/tricycle_driver_details')}}">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Jena Gaines</td>
                                            <td>0251</td>
                                            <td>London</td>
                                            <td>30</td>
                                       
                                              <td><a href="{{url('/admin/tricycle_driver_details')}}">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Quinn Flynn</td>
                                            <td>0241</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                    
                                              <td><a href="{{url('/admin/tricycle_driver_details')}}">ViewDetails</a></td>
                                        </tr>
                                        <tr>
                                            <td>Charde Marshall</td>
                                            <td>0271</td>
                                            <td>San Francisco</td>
                                            <td>36</td>
                                   
                                              <td><a href="{{url('/admin/tricycle_driver_details')}}">ViewDetails</a></td>
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
