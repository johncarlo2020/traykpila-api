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
                                <img  class="myImg rounded-circle" src="http://31.187.75.224/traykpila-api/storage/app/images/{{$users[0]->image}}" width="200" height="200" alt="">
                               </div>
                               <ol>
                                <li class="fs-5 ">Nationality:  {{$users[0]->nationality}}</li>
                                <hr class="mt-2 mb-3"/>
                                <li class="fs-5">Emergency Contact Name:  {{$users[0]->emergency_contact}}</li>
                                <hr class="mt-2 mb-3"/>
                                <li class="fs-5">Emergency Contact Relationship:  {{$users[0]->emergency_relationship}}</li>
                                <hr class="mt-2 mb-3"/>
                                <li class="fs-5">Contac Number:  {{$users[0]->emergency_number}}</li>
                                <hr class="mt-2 mb-3"/>
                                <li class="fs-5">Emergency Contact Address:  {{$users[0]->emergency_address}}</li>
                              
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
                                        <img class="myImg img-fluid img-thumbnail" 
                                            src="{{ $license[0]->front_image ?? 'http://31.187.75.224/traykpila-api/storage/app/images/default_image.jpg' }}" 
                                            width="400" 
                                            height="600" 
                                            alt="">
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
                                    <img class="myImg img-fluid img-thumbnail" 
                                        src="{{ $license[0]->back_image ?? 'http://31.187.75.224/traykpila-api/storage/app/images/default_image.jpg' }}" 
                                        width="400" 
                                        height="600" 
                                        alt=""> </div>
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
                                        <img class="myImg img-fluid img-thumbnail" 
                                        src="{{ $tricycle[0]->or ?? 'http://31.187.75.224/traykpila-api/storage/app/images/default_image.jpg' }}" 
                                        width="400" 
                                        height="600" 
                                        alt="">
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
                                    <img class="myImg img-fluid img-thumbnail" 
                                        src="{{ $tricycle[0]->cr ?? 'http://31.187.75.224/traykpila-api/storage/app/images/default_image.jpg' }}" 
                                        width="400" 
                                        height="600" 
                                        alt=""></div>
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