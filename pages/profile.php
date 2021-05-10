<?php
    require('../auth.php');
    //Add data into variables
    $user_phone_no=$row['phone_no'];
    $user_country=$row['country'];
    $user_device_name=$row['device_name'];
    $user_device_model=$row['device_model'];
    $user_apertures=$row['apertures'];
    $user_resolution=$row['resolution'];
    $user_focal_length=$row['focal_length'];
    $user_role=$row['role'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <link href="../css/profile2.css" rel="stylesheet">

            <!-------bootstrap css custom styling -> (OVERRIDE) <- --------------------->
        <style>
            .dropleft .dropdown-toggle::before{
                border-right: none;
            }
        </style>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    </head>
    <body>
        <!--------------------------------------nav Section--------------------------------------------------------->

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
                            <a class="nav-link" href="upload.html" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-outline-success"><i class="bi bi-cloud-arrow-up"></i> Upload</button></a>
                        </li>
                        <li class="nav-item dropleft text-decoration-none">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning"><img class="logp rounded-circle" src="https://picsum.photos/id/237/200/300" alt=""></button></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php">Account</a>
                                <a class="dropdown-item" href="editprofile.php">Edit Profile</a>
                                <a class="dropdown-item" href="favimg.html">Saved Images</a>
                                <a class="dropdown-item" href="usruploadimg.html">Your Uploads</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Sign Out</a>
                            </div>
                        </li>
                        <li class="nav-item dropleft text-decoration-none">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning"><i class="bi bi-emoji-expressionless-fill"></button></i></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="login.php">Sign In</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-----------------------------------------Profile section------------------------------------------------------>

        <div class="container shadow-lg p-3 mb-5 bg-white rounded emp-profile">

            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img class="rounded-circle pix" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                <i class="bi bi-arrow-repeat"></i>
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h1>
                                        <?php echo $user_name; ?>
                                    </h1>
                                    <h6>
                                    <?php echo $user_role; ?>
                                    </h6>
                                    <div class="container">
                                        <div class="row">
                                            <p class="col-4 "><i class="bi bi-eye"></i> <span>1000</span></p>
                                            <p class="col-4"><i class="bi bi-heart"></i> <span>1000</span></p>
                                            <p class="col-4"><i class="bi bi-file-earmark-arrow-down"></i> <span>1000</span></p>
                                        </div>
                                    </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="bi bi-info-circle"></i> About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="bi bi-camera"></i> Camera</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 d-none d-xl-block d-lg-block d-xl-none">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 d-none d-xl-block d-lg-block d-xl-none">
                        <div class="profile-work">
                            <p>User Account</p>
                            <a href="">Uploaded Photos</a><br/>
                            <a href="">Edit Profile</a><br/>
                            <a href="">Saved Photos</a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $user_username; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $user_name; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $user_email; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $user_phone_no; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Country</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $user_country; ?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Device Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $user_device_name; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Model Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $user_device_model; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Resolution</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $user_resolution." MP (Mega Pixel)"; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Focal Length</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $user_focal_length; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Apperture</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $user_apertures; ?></p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <hr class="mb-4">
            <!-------------------------------------------------Uploaded Images main body------------------------------------------>
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
        </div>
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
                                Copyright &copy; <script>document.write(new Date().getFullYear())</script> <a href="/"><strong class="text-dark" style="text-decoration: none;"> Gallery Name </strong></a> - All rights reserved
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