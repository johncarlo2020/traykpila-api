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
            background-color: #d6ffe9!important;
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
                        <h1 class="mt-4">Deposit Request</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Request Lists</li>
                        </ol>
                  
                         <div class="card mb-4 shadow round">
                            <div class="card-header font-weight-bold" style="background-color: #25C36B;">
                                <p class="font-weight-bold text-white mb-0" style="font-weight:bold;"><i class="fas fa-table me-3 "></i>Datatable</p>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>account_name</th>
                                            <th>account_number</th>    
                                            <th>reference_number</th>    
                                            <th>image</th>    
                                            <th>Action</th>                                   
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        @foreach($tpcs as $tpc)
                                        <tr>
                                            <td>{{$tpc->user->email}}</td>
                                            <td>{{$tpc->amount}}</td>
                                            <td>{{$tpc->account_name}}</td>
                                            <td>{{$tpc->account_number}}</td>
                                            <td>{{$tpc->reference_number}}</td>
                                            <td></td>
                                            <td>
                                                 <button class="btn btn-success accept-btn" 
                                                 data-id="{{$tpc->id}}" 
                                                 data-name="{{$tpc->user->email}}" 
                                                 data-user-id="{{$tpc->user->id}}" 
                                                 data-amount="{{$tpc->amount}}" 
                                                 data-account-name="{{$tpc->account_name}}" 
                                                 data-account-number="{{$tpc->account_number}}" 
                                                 data-reference-number="{{$tpc->reference_number}}">Accept</button>
                                                <button class="btn btn-danger">Reject</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                                                    
                                    </tbody>
                                </table> <!-- Modal -->
                            
                                <!-- End Modal -->
                            </div>
                        </div> 
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
      
                             <!-- Modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmModalLabel">Confirm Acceptance</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Name:</strong> <span id="modal-name"></span></p>
                        <p><strong>Amount:</strong> <span id="modal-amount"></span></p>
                        <p><strong>Account Name:</strong> <span id="modal-account-name"></span></p>
                        <p><strong>Account Number:</strong> <span id="modal-account-number"></span></p>
                        <p><strong>Reference Number:</strong> <span id="modal-reference-number"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="confirmBtn">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Handle accept button click
        $('.accept-btn').click(function() {
            var name = $(this).data('name');
            var amount = $(this).data('amount');
            var accountName = $(this).data('account-name');
            var accountNumber = $(this).data('account-number');
            var referenceNumber = $(this).data('reference-number');
            var id = $(this).data('id');
            var user_id = $(this).data('user-id');


            

            // Set modal content dynamically
            $('#modal-name').text(name);
            $('#modal-amount').text(amount);
            $('#modal-account-name').text(accountName);
            $('#modal-account-number').text(accountNumber);
            $('#modal-reference-number').text(referenceNumber);
            $('#confirmBtn').attr('data-id',id);
            $('#confirmBtn').attr('data-user-id',user_id);


            

            // Show modal
            $('#confirmModal').modal('show');
        });

        // Handle confirm button click
        $('#confirmBtn').click(function() {
            var id = $(this).data('id');
            var user_id = $(this).data('user-id');

            var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ route("tpc.change-status") }}', // Replace with the actual URL to your server-side route or endpoint
                    method: 'POST', // Use the appropriate HTTP method (e.g., POST, GET, etc.)
                    data: {
                        id: id,
                        status: 1,
                        user_id:user_id // Update the status value as per your requirements
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include the CSRF token in the request headers
                    },
                    success: function(response) {
                        console.log(response); // Handle the success response from the server
                        $('#confirmModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.log(error); // Handle the error response from the server
                    }
                });
            $('#confirmModal').modal('hide');
        });
    });
</script>
</html>


