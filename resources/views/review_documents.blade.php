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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
       
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

                        <div class="d-flex  justify-content-around">
                            <h3>Verify this Driver:     
                                <a id="verify" style="color:green;" data-bs-toggle="modal" data-bs-target="#Verify" href=""><i class="fas fa-check-circle"></i></a>
                            </h3>
                            <span class="m-3"></span>
                            <h3> Cancel Driver Application:     
                                <a id="verify" style="color:red;" data-bs-toggle="modal" data-bs-target="#Cancel" href=""><i class="fas fa-times-circle"></i></a>
                            </h3>
                        </div>  
                                   

                    <!--MODAL VERIFY -->
                    <div class="modal fade" id="Verify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">                     
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Are you Sure that you want to Verify This User?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                
                        <div class="modal-footer ">
                            <form action="{{ route('verify_driver', ['id' => $users[0]->id]) }}" method="POST">
                            @csrf
                                <div class="">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button> 
                                    <button type="submit" class="btn btn-success">Verify</button>                                   
                                </div>
                        </form>
                        </div>
                        </div>
                    </div>
                    </div>    
                    </div>
                    </div>
                    <!--MODAL CANCEL -->
                    <div class="modal fade" id="Cancel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Reason For The Cancellation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form>
                        <div class="col-md-6">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                             <label class="form-check-label" for="flexCheckDefault">Poor Image Quality</label>
                             <hr class="hr" />
                        </div>
                        <div class="col-md-6">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                             <label class="form-check-label" for="flexCheckDefault">Not Clear Information</label>
                             <hr class="hr" />
                        </div>
                        <div class="col-md-6">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                             <label class="form-check-label" for="flexCheckDefault">Information already exists</label>
                             <hr class="hr" />
                        </div>
                        <div class="form-group purple-border">
                            <label class="pb-3 fs-5" for="exampleFormControlTextarea4">Specify Cancellation:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="The application has been cancelled because the you did not meet the eligibility requirements."></textarea>
                        </div>
                        
                      
                       
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>
                        </div>
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
                             <div class="container-fluid bg-white ">
                               <div class="text-center p-3">
                                <img  class="myImg rounded-circle"  src="data:image/jpeg;base64,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" width="200" height="200" alt="">
                               </div>
                               <ol>
                                <li class="fs-5 ">Nationality:</li>
                                <hr class="mt-2 mb-3"/>
                                <li class="fs-5">Emergency Contact Name:</li>
                                <hr class="mt-2 mb-3"/>
                                <li class="fs-5">Emergency Contact Relationship:</li>
                                <hr class="mt-2 mb-3"/>
                                <li class="fs-5">Contac Number:</li>
                                <hr class="mt-2 mb-3"/>
                                <li class="fs-5">Emergency Contact Address:</li>
                              
                               </ol>
                             </div>
                        </div>
                        <div class="card-header font-weight-bold " style="background-color: #2591c5;">
                            <p class="font-weight-bold text-white text-center mb-0" style="font-weight:bold;"><i class=""></i>Drivers License</p>                           
                        </div>
                        <div class="card  shadow round">  
                            <div class="container-fluid bg-white">
                                <div class="d-flex text-center p-3"> 
                                    <div class="col">
                                        <p class="fs-3">Front</p>                         
                                        <img class="myImg img-fluid img-thumbnail" src="https://th.bing.com/th/id/OIP.RvFf4kISDpVvCzuotmYOzQHaEr?w=285&h=180&c=7&r=0&o=5&pid=1.7" width="400" height="600" alt="">
                                        
                                            <div id="myModal" class="modal">

                                            <!-- The Close Button -->
                                            <span class="close">&times;</span>

                                            <!-- Modal Content (The Image) -->
                                            <img class="modal-content" id="img01">

                                            <!-- Modal Caption (Image Text) -->
                                            <div id="caption"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <p class="fs-3">Back</p>
                                        <img class="myImg img-fluid img-thumbnail" src="https://th.bing.com/th/id/OIP.OFfqlVWrOrWqBrLSUtRJmAHaEm?w=279&h=180&c=7&r=0&o=5&pid=1.7" width="400" height="600" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header font-weight-bold " style="background-color: #2591c5;">
                            <p class="font-weight-bold text-white text-center mb-0" style="font-weight:bold;"><i class=""></i>Vehicle Information</p>
                        </div>
                        <div class="card shadow round mb-5 pb-5"> 
                            <div class="text-center">  <p class=" pt-3 fs-5">Plate Number: <span class="text-success">CDJ-4492</span> </p></div>
                            <div class="container-fluid bg-white ">
                                <div class="d-flex text-center p-3"> 
                                    <div class="col">
                                        <p class="fs-3">Tricycle Official Receipt</p>                         
                                        <img class="myImg img-fluid img-thumbnail" src="https://th.bing.com/th/id/OIP.EOOORwDeuuMcuM70MFdwtAHaJ4?w=196&h=261&c=7&r=0&o=5&pid=1.7" width="300" height="600" alt="">
                                        
                                            <div id="myModal" class="modal">

                                            <!-- The Close Button -->
                                            <span class="close">&times;</span>

                                            <!-- Modal Content (The Image) -->
                                            <img class="modal-content" id="img01">

                                            <!-- Modal Caption (Image Text) -->
                                            <div id="caption"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <p class="fs-3">Tricycle Certificate OF Registration</p>
                                        <img class="myImg img-fluid img-thumbnail" src="https://th.bing.com/th/id/OIP.I81xqb_k9P-4upl-2mUjQgHaJ3?w=160&h=213&c=7&r=0&o=5&pid=1.7" width="300" height="600" alt="">
                                    </div>
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
      
    </body>
</html>

<script>
    // Get the modal
var modal = $("#myModal");
var modalImg = modal.find('.modal-content');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = $(".myImg");
var captionBox =$("#caption");

img.click(function() {
    modalImg.attr('src', $(this).attr('src'));
    captionBox.text( $(this).attr('alt') );
    modal.show();
});

// Get the elements that closes the modal
var modalCloser = $(".close");

// When the user clicks on the close element, close the modal
modalCloser.click(function() {
    modal.hide();
});

</script>