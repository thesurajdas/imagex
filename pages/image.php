<?php
    //Add database connection
    require_once('../auth.php');
    //Get image id
    if (isset($_GET['id'])) {
        $img_id=$_GET['id'];
        $sql="SELECT * FROM images WHERE image_id='$img_id'";
        $result=$connect->query($sql);
        $row=$result->fetch_assoc();
        $title=$row['title'];
        $image_location=$row['image_location'];
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
    <header>
        <nav class="navbar shadow-lg p-1 mb-5 bg-white rounded fixed-top navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.html">Gallery</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.html" tabindex="-1" aria-disabled="true">Home</a>
                    </li>
                    <li class="nav-item dropdown border-right-0">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="nature.html">Nature</a>
                            <a class="dropdown-item" href="potrait.html">Potraite</a>
                            <a class="dropdown-item" href="landscape.html">Landscape</a>
                            <a class="dropdown-item" href="astro.html">Astro</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trendings.html" tabindex="-1" aria-disabled="true">Trending</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="logsign.html"><button type="button" class="btn btn-outline-warning">LogIn/SignUP</button></a>
                    </li> -->
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn btn-outline-info my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="upload.html" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-outline-success"><i class="bi bi-cloud-arrow-up"></i></button></a>
                    </li>
                    <li class="nav-item dropleft text-decoration-none">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning"><img class="logp rounded-circle" src="https://picsum.photos/id/237/200/300" alt=""></button></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile.html">Account</a>
                            <a class="dropdown-item" href="editprofile.html">Edit Profile</a>
                            <a class="dropdown-item" href="favimg.html">Saved Images</a>
                            <a class="dropdown-item" href="usruploadimg.html">Your Uploads</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">SignOff</a>
                        </div>
                    </li>
                    <li class="nav-item dropleft text-decoration-none">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning"><i class="bi bi-emoji-expressionless-fill"></button></i></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="logsign.html">Sign In</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logsign.html">Sign UP</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!--------------------------------------------------Full Size Image----------------------------------------->
    <div class="container fimg">
        <!--<div class="col-lg-4 col-md-6 col-sm-12 sglry">-->
            <div class="card">
                <img class="imx" src="<?php echo $site_url,$row['image_location']; ?>" alt="Card image cap">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Photographer</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Image Details</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Capture Details</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                            <!---------------image decription------------>
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="container tabcon">
                                <h1><?php echo $title; ?></h1>
                                <p class="font-italic unm">username</p>
                                <p class="font-weight-lighter">Camera Use (Model Name)</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="container tabcon">
                                <h5>Image Name</h5>
                                <p class="font-weight-bolder">Badges</p><p><span class="badge badge-secondary">title</span></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="container tabcon">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Camera Used:</h5>
                                    </div>
                                    <div class="col-6">
                                        <p>Camera Model</p>
                                    </div>
                                    <div class="col-6">
                                        <h5>ƒ:</h5>
                                    </div>
                                    <div class="col-6">
                                        <p>Focal Lenght eg. 1.7</p>
                                    </div>
                                    <div class="col-6">
                                        <h5>Exposure Time:</h5>
                                    </div>
                                    <div class="col-6">
                                        <p>1/430</p>
                                    </div>
                                    <div class="col-6">
                                        <h5>Image Resolution:</h5>
                                    </div>
                                    <div class="col-6">
                                        <p>1911X1434</p>
                                    </div>
                                    <div class="col-6">
                                        <h5>Image Size:</h5>
                                    </div>
                                    <div class="col-6">
                                        <p>283kb</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-between">
                            <a href="#" class="btn btn-danger col-2"><i class="bi bi-suit-heart-fill"></i></a>
                            <a href="#" class="btn btn-success col-2"><i class="bi bi-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <!--</div>-->         
    </div>
    <!-------------------------------------------------Related Images Text------------------------------------------>
    <div class="container ht">
            <h1>Related Images</h1>
    </div>
    <!-------------------------------------------------Related Images main body------------------------------------------>
    <div class="container shadow-lg p-3 mb-5 bg-white rounded my-3 glry">
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
</body>
</html>
