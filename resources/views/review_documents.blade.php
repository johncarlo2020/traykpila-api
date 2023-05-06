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
                    <h1 class="">Review Documents</h1>
                    <div class="d-flex justify-content-between">
                  
                        <h3>Name: {{$users[0]->name}} </h3>
                        <h3>Verify this Driver: 
                                    <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#REPORT">
                                        <p class="mb-0">Report</p> 
                                    </button> -->
                                   
                                     <a id="verify" style="color:green;" href="{{ route('verify_driver', ['id' => $users[0]->id]) }}"><i class="fas fa-check-circle"></i></a>
                        </h3>       
                    </div>
                    </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">email: {{$users[0]->email}}  </li>
                            <li class="breadcrumb-item active">Phone Number: {{$users[0]->PhoneNumber}}  </li>
                            <li class="breadcrumb-item active">Address: {{$users[0]->address}}  </li>
                        </ol>
                        <div class="card-header font-weight-bold " style="background-color: #2591c5;">
                            <p class="font-weight-bold text-white text-center mb-0" style="font-weight:bold;"><i class=""></i>Personal Information</p>
                                                      
                        </div>
                        <div class="card  shadow round">      
                             <canvas id="myBarChart1" width="100%" height="40"></canvas>      
                        </div>
                        <div class="card-header font-weight-bold " style="background-color: #2591c5;">
                            <p class="font-weight-bold text-white text-center mb-0" style="font-weight:bold;"><i class=""></i>Drivers License</p>
                        </div>
                        <div class="card  shadow round">      
                             <canvas id="myBarChart1" width="100%" height="40"></canvas>      
                        </div>
                        <div class="card-header font-weight-bold " style="background-color: #2591c5;">
                            <p class="font-weight-bold text-white text-center mb-0" style="font-weight:bold;"><i class=""></i>Consents & Declaration</p>
                        </div>
                        <div class="card  shadow round">      
                             <canvas id="myBarChart1" width="100%" height="40"></canvas>      
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
