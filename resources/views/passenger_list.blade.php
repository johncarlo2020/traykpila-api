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
                        <h1 class="mt-4">Passenger Lists</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Passenger Lists</li>
                        </ol>
                     
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
                                            <th>Cp Number</th>
                                            <th>Address</th>
                                            <th>Age</th>    
                                            <th></th>                                 
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Cp Number</th>
                                            <th>Address</th>
                                            <th>Age</th>
                                            <th></th> 

                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>+639984092871</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                               
                                            <td><a href="#">ViewDetails</a></td>
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
