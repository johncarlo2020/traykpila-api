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
                    <div class="row justify-content-between">
                            <div class="col-xl-3">
                                <h1 class="mt-4">Passenger Lists</h1>
                            </div>
                            <div class="col-xl-5">
                                <h3 class="mt-4">Total Not Verified Passenger: {{$count}}</h3>
                            </div>
                        </div>
                     
                         <div class="card mb-4 shadow round">
                            <div class="card-header" style="background-color: #25C36B;">
                                <i class="fas fa-table me-1"></i>
                               Not Verified Passengers 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>TPC</th>  
                                            <th></th>                                 
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->PhoneNumber}}</td>
                                            <td>{{$user->TPC}}</td>
                                            <td><a href="{{url('/admin/passenger_list/details/')}}/{{$user->id}}">ViewDetails</a></td>
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
                                <a href="">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
  
    </body>
</html>
