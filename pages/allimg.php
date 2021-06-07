<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/jquery-3.5.1.slim.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <link href="../css/allimg.css" rel="stylesheet">

            <!-------bootstrap css custom styling -> (OVERRIDE) <- --------------------->
        <style>
            .dropleft .dropdown-toggle::before{
                border-right: 0;
            }
            .dropdown-toggle::after{
                border-top: 0;
            }
        </style>
        <script src="../js/fontawesome.js"></script>
    </head>
    <body>
        <!-----------------------------------nav section---------------------------------------------------->
        <?php require_once('include/header.php'); ?>
        <!-----------------------------------------------image-section-------------------------------------------->

        <div class="container shadow-lg p-3 mb-5 bg-white glry" style="border-radius: 1.25rem;">
            <div class="col-12 text-center text-uppercase font-weight-bolder"><h2>All Images</h2></div>
            <div class="container shadow-lg pl-3 pr-3 pt-1 mt-4" style="border-radius: 1.25rem;">
                <div class="row pl-3 pr-3 pt-3">
                    <div class="text-right col-12">
                        <div class="btn-group btn-group-sm" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 1.25rem;"><i class="fad fa-caret-circle-down"></i> Short By</button>
                            <div class="dropdown-menu" style="min-width: auto;" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item " style="text-align: start; color: rgba(99, 96, 96, 0.856); font-size: 80%; font-weight: 700;" href="#"><i class="fad fa-eye"></i> View</a>
                            <a class="dropdown-item " style="text-align: start; color: rgba(220, 20, 60, 0.842); font-size: 80%; font-weight: 700;" href="#"><i class="fad fa-heart-circle"></i> Like</a>
                            <a class="dropdown-item " style="text-align: start; color: rgba(0, 128, 0, 0.815); font-size: 80%; font-weight: 700;" href="#"><i class="fad fa-download"></i> Download</a>
                            <a class="dropdown-item " style="text-align: start; color: rgba(28, 102, 177, 0.863); font-size: 80%; font-weight: 700;" href="#"><i class="fad fa-share-square"></i> Share</a>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 sglry">
                            <div class="card cds">
                                <img class="im" src="https://dummyimage.com/600x400/000/fff2.jpg" alt="Card image cap">
                                <div class="card-text cds-txt">
                                    <h3>Image Name</h3>
                                    <a href="" class=" text-decoration-none text-white"><h5><img class="upimg" src="https://picsum.photos/id/237/200/300" alt=""> username</h5></a>
                                    <div class="container">
                                        <div class="row chbtn">
                                            <a href="#" class="btn btn-outline-danger cbtn" title="Save This Image" style="margin-right: 5px;"><i class="fas fa-heart"></i> <span>500</span></a>
                                            <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fas fa-eye"></i> <span>500</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>         
                        <div class="col-lg-4 col-md-6 col-sm-12 sglry">
                            <div class="card cds">
                                <img class="im" src="https://dummyimage.com/600x400/000/fff2.jpg" alt="Card image cap">
                                <div class="card-text cds-txt">
                                    <h3>Image Name</h3>
                                    <a href="" class=" text-decoration-none text-white"><h5><img class="upimg" src="https://picsum.photos/id/237/200/300" alt=""> username</h5></a>
                                    <div class="container">
                                        <div class="row chbtn">
                                            <a href="#" class="btn btn-outline-danger cbtn" title="Save This Image" style="margin-right: 5px;"><i class="fas fa-heart"></i> <span>500</span></a>
                                            <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fas fa-eye"></i> <span>500</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>               
                        <div class="col-lg-4 col-md-6 col-sm-12 sglry">
                            <div class="card cds">
                                <img class="im" src="https://dummyimage.com/600x400/000/fff2.jpg" alt="Card image cap">
                                <div class="card-text cds-txt">
                                    <h3>Image Name</h3>
                                    <a href="" class=" text-decoration-none text-white"><h5><img class="upimg" src="https://picsum.photos/id/237/200/300" alt=""> username</h5></a>
                                    <div class="container">
                                        <div class="row chbtn">
                                            <a href="#" class="btn btn-outline-danger cbtn" title="Save This Image" style="margin-right: 5px;"><i class="fas fa-heart"></i> <span>500</span></a>
                                            <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fas fa-eye"></i> <span>500</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>               
                        <div class="col-lg-4 col-md-6 col-sm-12 sglry">
                            <div class="card cds">
                                <img class="im" src="https://dummyimage.com/600x400/000/fff2.jpg" alt="Card image cap">
                                <div class="card-text cds-txt">
                                    <h3>Image Name</h3>
                                    <a href="" class=" text-decoration-none text-white"><h5><img class="upimg" src="https://picsum.photos/id/237/200/300" alt=""> username</h5></a>
                                    <div class="container">
                                        <div class="row chbtn">
                                            <a href="#" class="btn btn-outline-danger cbtn" title="Save This Image" style="margin-right: 5px;"><i class="fas fa-heart"></i> <span>500</span></a>
                                            <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fas fa-eye"></i> <span>500</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>         
                        <div class="col-lg-4 col-md-6 col-sm-12 sglry">
                            <div class="card cds">
                                <img class="im" src="https://dummyimage.com/600x400/000/fff2.jpg" alt="Card image cap">
                                <div class="card-text cds-txt">
                                    <h3>Image Name</h3>
                                    <a href="" class=" text-decoration-none text-white"><h5><img class="upimg" src="https://picsum.photos/id/237/200/300" alt=""> username</h5></a>
                                    <div class="container">
                                        <div class="row chbtn">
                                            <a href="#" class="btn btn-outline-danger cbtn" title="Save This Image" style="margin-right: 5px;"><i class="fas fa-heart"></i> <span>500</span></a>
                                            <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fas fa-eye"></i> <span>500</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>               
                        <div class="col-lg-4 col-md-6 col-sm-12 sglry">
                            <div class="card cds">
                                <img class="im" src="https://dummyimage.com/600x400/000/fff2.jpg" alt="Card image cap">
                                <div class="card-text cds-txt">
                                    <h3>Image Name</h3>
                                    <a href="" class=" text-decoration-none text-white"><h5><img class="upimg" src="https://picsum.photos/id/237/200/300" alt=""> username</h5></a>
                                    <div class="container">
                                        <div class="row chbtn">
                                            <a href="#" class="btn btn-outline-danger cbtn" title="Save This Image" style="margin-right: 5px;"><i class="fas fa-heart"></i> <span>500</span></a>
                                            <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fas fa-eye"></i> <span>500</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>               
                        <div class="col-lg-4 col-md-6 col-sm-12 sglry">
                            <div class="card cds">
                                <img class="im" src="https://dummyimage.com/600x400/000/fff2.jpg" alt="Card image cap">
                                <div class="card-text cds-txt">
                                    <h3>Image Name</h3>
                                    <a href="" class=" text-decoration-none text-white"><h5><img class="upimg" src="https://picsum.photos/id/237/200/300" alt=""> username</h5></a>
                                    <div class="container">
                                        <div class="row chbtn">
                                            <a href="#" class="btn btn-outline-danger cbtn" title="Save This Image" style="margin-right: 5px;"><i class="fas fa-heart"></i> <span>500</span></a>
                                            <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fas fa-eye"></i> <span>500</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>         
                        <div class="col-lg-4 col-md-6 col-sm-12 sglry">
                            <div class="card cds">
                                <img class="im" src="https://dummyimage.com/600x400/000/fff2.jpg" alt="Card image cap">
                                <div class="card-text cds-txt">
                                    <h3>Image Name</h3>
                                    <a href="" class=" text-decoration-none text-white"><h5><img class="upimg" src="https://picsum.photos/id/237/200/300" alt=""> username</h5></a>
                                    <div class="container">
                                        <div class="row chbtn">
                                            <a href="#" class="btn btn-outline-danger cbtn" title="Save This Image" style="margin-right: 5px;"><i class="fas fa-heart"></i> <span>500</span></a>
                                            <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fas fa-eye"></i> <span>500</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>               
                        <div class="col-lg-4 col-md-6 col-sm-12 sglry">
                            <div class="card cds">
                                <img class="im" src="https://dummyimage.com/600x400/000/fff2.jpg" alt="Card image cap">
                                <div class="card-text cds-txt">
                                    <h3>Image Name</h3>
                                    <a href="" class=" text-decoration-none text-white"><h5><img class="upimg" src="https://picsum.photos/id/237/200/300" alt=""> username</h5></a>
                                    <div class="container">
                                        <div class="row chbtn">
                                            <a href="#" class="btn btn-outline-danger cbtn" title="Save This Image" style="margin-right: 5px;"><i class="fas fa-heart"></i> <span>500</span></a>
                                            <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fas fa-eye"></i> <span>500</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>               
                                
                                
                    </div>        
                </div>
                <div class="container pn" style="margin-top: 25px;">
                    <div class="row justify-content-center">
                        <a href="#" class="btn btn-outline-dark col-2" style="margin-right: 10px;">Previous Page <i class="bi bi-arrow-bar-left"></i></a>
                        <a href="#" class="btn btn-outline-dark col-2" style="margin-left: 10px;">Next Page <i class="bi bi-arrow-bar-right"></i></a>
                    </div>         
                </div>
            </div>    
        </div>
        <!----------------------Footer Section---------------------------------------------------->
        <?php require_once('include/footer.php'); ?>
        
    </body>
</html>