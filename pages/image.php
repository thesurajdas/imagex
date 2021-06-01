<?php
    //Add database connection
    require_once('../auth.php');
    //Get image id
    if (isset($_GET['id'])) {
        $img_id=$_GET['id'];
        $sql="SELECT * FROM images WHERE image_id='$img_id'";
        $result_img=$connect->query($sql);
        $row_img=$result_img->fetch_assoc();
        $title=$row_img['title'];
        $cat=$row_img['category'];
        $image_location=$row_img['image_location'];
        $p_time=$row_img['time'];
    }
    else{
        echo "<script>alert('Something Went Wrong!')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/jquery-3.5.1.slim.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <link href="../css/fullimg.css" rel="stylesheet">

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
    <!--------------------------------------------------Full Size Image----------------------------------------->
    <div class="container fimg">
        <!--<div class="col-lg-4 col-md-6 col-sm-12 sglry">-->
            <div class="card cdll shadow-lg">
                <div class="card-header" style="border-radius: 1.25rem">
                    <a class="text-decoration-none" href="#">
                        <div class="row justify-content-md-between">
                            <div>
                                <div class="row">
                                    <img class="pimgg ml-3" src="https://dummyimage.com/600x400/000/fff2.jpg" alt="">
                                    <h4 class="pl-2" style="color: black">username</h4>
                                </div>
                            </div>
                            <div class="pr-3">
                                <div class="row">
                                   
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <img class="imx" src="<?php echo $site_url,$row_img['image_location']; ?>" alt="Card image cap">
                <div class="card-body">
                    <div class="profile-head">
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Photographer</a>
                            </li>
                            <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Capture Details</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                                <!---------------image decription------------>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="container tabcon">
                                    <div class="row text-center">
                                        <div class="col-12 pb-4">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6><i class="fad fa-eye" style="color: #6161bbd6;"></i> Viewes:</h6>    
                                                        </div>
                                                        <div class="col-6">
                                                            <h6 class="badge" style="color: #fff; background-color: #6161bbd6;">80</h6>    
                                                        </div>
                                                    </div>    
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6><i class="fad fa-heart-circle" style="color: #ff0076d6;"></i> Hearts:</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6 class="badge" style="color: #fff; background-color: #ff0076d6;">50</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 style="color: #15c500e0;"></i> Downloads:</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6 class="badge" style="color: #fff; background-color: #15c500e0;">40</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-file-signature" style="color: #0062ccde;"></i> Image Name:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <h6 class="badge" style="color: #fff; background-color: #0062ccde;"><?php echo $title; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-grip-vertical" style="color: #ff7600d6;"></i> Image Category:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <h6 class="badge" style="color: #fff; background-color: #ff7600d6;"><?php echo $cat; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-grip-vertical" style="color: #ff7600d6;"></i> Publish On:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <h6 class="badge" style="color: #fff; background-color: #ff7600d6;"><?php echo $p_time; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="container tabcon">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-mobile-android" style="color: #6161bbd6;"></i> Camera Used:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: #6161bbd6;">Camera Model</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-stopwatch" style="color: #ff0000c9"></i> Exposure Time:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: #ff0000c9;">1/430</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-expand-arrows" style="color: #01b528e3;"></i> Resolution:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: #01b528e3;">1911X1434</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-border-none" style="color: #ff5e00d4"></i> Image Size:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: #ff5e00d4;">283kb</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-question-circle" style="color: #00a1ffe8"></i> ƒ:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: #00a1ffe8;">1.7</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <a href="#" class="btn btn-danger dg col-md-2 col-sm-12 bt" style="margin-top: 10px"><i class="fad fa-heart"></i> <span> 56</span></a>
                            <!--<a href="#" class="btn btn-success col-2"><i class="bi bi-download"></i></a>-->
                        </div>
                    </div>
                </div>
            </div>
        <!--</div>-->         
    </div>
    <!-------------------------------------------------Related Images Text------------------------------------------>
    <div class="container ht">
            
    </div>
    <!-------------------------------------------------Related Images main body------------------------------------------>
    <div class="container shadow-lg p-3 mb-5 bg-white my-3 glry" style="border-radius: 1.25rem">
    <h2 class="text-center"><span class="badge" style="color: #4ba0ffa8; background-color:#dee2e69e;">Related Images</span></h2>
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
    <!----------------------Footer Section---------------------------------------------------->
    <footer>
        <div class="bg-light text-dark pt-5 pt-4">
            <div class="container">
                <div class="row text-center text-md-left ">
                    <div class="col-md-3 col-lg-3 col-lx-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">About Us</h5>
                        <hrc class="mb-4">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro ipsum ipsam quibusdam molestias, vero perspiciatis ea cum sapiente in nesciunt tempore blanditiis beatae corrupti et suscipit commodi animi iste molestiae!</p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-lx-2 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">Quick Links</h5>
                        <hrc class="mb-4">
                            <p>
                                <a href="#" class="text-dark" style="text-decoration: none;" >Your Account</a>
                            </p>
                            <p>
                                <a href="#" class="text-dark" style="text-decoration: none;" >Favorites</a>
                            </p>
                            <p>
                                <a href="#" class="text-dark" style="text-decoration: none;" >Uploads</a>
                            </p>
                            <p>
                                <a href="#" class="text-dark" style="text-decoration: none;" >Trending</a>
                            </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-lx-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">Connect With Us</h5>
                        <hrc class="mb-4">
                        <p>
                            <i class="bi bi-house mr-3" ></i>Short Address,pin-0000000
                                
                        </p>
                        <p>
                            <i class="bi bi-envelope mr-3"></i>abc@xyz.com
                                
                        </p>
                        <p>
                            <i class="bi bi-telephone-plus mr-3"></i>1234567890
                                
                        </p>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="row d-flex justify-content-center">
                    <div>
                        <p>
                            Copyright © 2021 <strong class="text-info text-dark" style="text-decoration: none;">Gallery Name</strong> - All rights reserved
                        </p>
                    </div>
                </div>
                <!--<div class="row d-flex justify-content-center">
                    <div class="text-center ">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-dark" ><i class="bi bi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class= "text-dark" ><i class="bi bi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class=" text-dark" ><i class="fab bi bi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class=" text-dark" ><i class="bi bi-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>-->
            </div>
        <div>    
    </footer>
    <button type="button" class="btn btn-outline-success cbtnn" data-toggle="tooltip" title="Download Now (123)"><i class="fad fa-cloud-download-alt" style="width: 35px; height: 35px"></i></button>

    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
</body>
</html>

