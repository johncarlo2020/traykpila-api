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
        <link href="{{url('/css/adminstyle.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
  <style>
    .active{
        color: rgb(20, 168, 70) !important;
    }
  </style>
     
        <div id="layoutSidenav">
    
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link {{ (request()->routeIs('admin') ? 'active' : '') }}" href="{{url('admin')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">List of Records</div>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ (request()->routeIs('tryk_drivers') || request()->routeIs('driver_details') ? 'active' : '') }}" href="{{route('tryk_drivers')}}">Tricycle Drivers </a>
                                    <a class="nav-link {{ (request()->routeIs('passenger_details') ? 'active' : '') }}" href="{{route('passenger_details')}}">Passengers</a>
                                    
                                </nav>

                            <div class="sb-sidenav-menu-heading">Accounts</div>
                            <!-- Drivers -->
                            <a class="nav-link {{ (request()->routeIs('tryk_drivers_accounts') ? '' : 'collapsed') }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="{{ (request()->routeIs('tryk_drivers_accounts') ? 'true' : 'false') }}" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Driver Accounts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapsed {{ (request()->routeIs('tryk_drivers_accounts') ? 'show' : '') }} || {{ (request()->routeIs('tryk_drivers_accounts') ? 'show' : '') }}" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ (request()->routeIs('tryk_drivers_accounts') ? 'active' : '') }}" href="{{route('tryk_drivers_accounts')}}">Verified Drivers</a>
                                    <a class="nav-link {{ (request()->routeIs('tryk_drivers_accounts_notverified') ? 'active' : '') }}" href="{{route('tryk_drivers_accounts_notverified')}}">Not Verified Drivers</a>
                                </nav>
                            </div>

                            <!-- Passenger -->
                            <a class="nav-link {{ (request()->routeIs('tryk_drivers_accounts') ? '' : 'collapsed') }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Passenger Accounts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapsed1" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ (request()->routeIs('passenger_details_accounts') ? 'active' : '') }}" href="{{route('passenger_details_accounts')}}">Verified Passengers</a>
                                    <a class="nav-link {{ (request()->routeIs('passenger_details_accounts_notverified') ? 'active' : '') }}" href="{{route('passenger_details_accounts_notverified')}}">Not Verified Passengers</a>
                                </nav>
                            </div>

                                <!-- Reports -->
                            <a class="nav-link {{ (request()->routeIs('tryk_drivers_accounts') ? '' : 'collapsed') }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="{{ (request()->routeIs('tryk_drivers_accounts') ? 'true' : 'false') }}" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Reports
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapsed {{ (request()->routeIs('tryk_drivers_accounts') ? 'show' : '') }} || {{ (request()->routeIs('tryk_drivers_accounts') ? 'show' : '') }}" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ (request()->routeIs('tryk_drivers_accounts') ? 'active' : '') }}" href="{{route('reported_drivers')}}">Reported Drivers</a>
                                    <a class="nav-link {{ (request()->routeIs('tryk_drivers_accounts_notverified') ? 'active' : '') }}" href="{{route('reported_passengers')}}">Reported Passengers</a>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin: Azil Sorveto@gmail.com
                    </div>
                </nav>
            </div> 
        
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{url('js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{url('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{url('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{url('js/datatables-simple-demo.js')}}"></script>
   
</html>
