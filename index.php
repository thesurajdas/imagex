<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <link href="css/home.css" rel="stylesheet">

            <!-------bootstrap css custom styling -> (OVERRIDE) <- --------------------->
        <style>
            .dropleft .dropdown-toggle::before{
                border-right: 0;
            }
        </style>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
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
                            <a class="nav-link" href="index.html" tabindex="-1" aria-disabled="true">Home</a>
                        </li>
                        <li class="nav-item dropdown border-right-0">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="pages/nature.html">Nature</a>
                                <a class="dropdown-item" href="pages/potrait.html">Potraite</a>
                                <a class="dropdown-item" href="pages/landscape.html">Landscape</a>
                                <a class="dropdown-item" href="pages/astro.html">Astro</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/trendings.html" tabindex="-1" aria-disabled="true">Trending</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="login.php"><button type="button" class="btn btn-outline-warning">LogIn/SignUP</button></a>
                        </li> -->
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="pages/upload.html" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-outline-success"><i class="fas fa-cloud-upload-alt"></i></button></a>
                        </li>
                        <li class="nav-item dropleft text-decoration-none">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning"><img class="logp rounded-circle" src="https://picsum.photos/id/237/200/300" alt=""></button></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="pages/profile.html">Account</a>
                                <a class="dropdown-item" href="pages/editprofile.html">Edit Profile</a>
                                <a class="dropdown-item" href="pages/favimg.html">Saved Images</a>
                                <a class="dropdown-item" href="pages/usruploadimg.html">Your Uploads</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">SignOff</a>
                            </div>
                        </li>
                        <li class="nav-item dropleft text-decoration-none">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning"><i class="fas fa-user-circle"></i></button></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="pages/login.php">Sign In</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages/login.php">Sign UP</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
   
        <!---------------------------------------------------banner--------------------------------------------->
        
        <!---------------------------------------Search bar------------------------------------->
        <div class="searchbar">
            <div class="container">
                <div class="col-lg-10 mx-auto sb">
                    <div class="input-group mb-3 rounded">
                        <input type="text" class="form-control" placeholder="Search Images" aria-label="Search Images" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary">Search</button>
                        </div>
                      </div>
                </div>
            </div>
        </div>
            <!-------------------------------------**welcome text--------------------------------------->
        <!----<div class="container wlc">
            <h1>Welcome to The Gallery</h1>
        </div>-->
            <!--------------------carousel-------------------------->
        <div class="fstcon"> 
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://dummyimage.com/600x400/000/fffa.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Welcome to the Gallery</h5>
                      <p>Scrole For More.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="https://dummyimage.com/600x400/000/fffb.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Second slide label</h5>
                      <p>Some representative placeholder content for the second slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="https://dummyimage.com/600x400/000/fffc.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third slide label</h5>
                      <p>Some representative placeholder content for the third slide.</p>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!-----------------------------------------------image-section-------------------------------------------->

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
                                    <i class="fas fa-house-user"></i> <span>Short Address,pin-0000000</span>
                                        
                                </p>
                                <p>
                                    <i class="fas fa-at"></i> <span>abc@xyz.com</span>
                                        
                                </p>
                                <p>
                                    <i class="fas fa-phone-square-alt"></i> <span>1234567890</span>
                                        
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