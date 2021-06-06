<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.5.1.slim.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <link href="css/home.css" rel="stylesheet">

            <!-------bootstrap css custom styling -> (OVERRIDE) <- --------------------->
        <style>
            .dropleft .dropdown-toggle::before{
                border-right: 0;
            }
            .dropdown-toggle::after{
                border-top: 0;
            }
        </style>
        <script src="js/fontawesome.js"></script>
    </head>
    <body>
        <!-----------------------------------nav section---------------------------------------------------->
        <header>
            <nav class="navbar shadow-lg p-1 mb-5 bg-white rounded fixed-top navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" style="margin-left: 35px;" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><img style="height: 40px;" src="img/logo.jpg" alt=""></a>
                <div class="d-md-none d-lg-none d-lg-none d-lx-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning bt"><i class="fas fa-user-circle"></i></button></a>
                    <div class="dropdown-menu" style="left: auto; right: 0;" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="pages/login.php">Sign In</a>
                    </div>   
                </div>
                <div class="d-md-none d-lg-none d-lg-none d-lx-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="logp rounded-circle" src="https://picsum.photos/id/237/200/300" alt=""></a>
                    <div class="dropdown-menu" style="left: auto; right: 0;" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="pages/profile.php">Account</a>
                        <a class="dropdown-item" href="pages/editprofile.php">Edit Profile</a>
                        <a class="dropdown-item" href="pages/favimg.php">Saved Images</a>
                        <a class="dropdown-item" href="pages/usruploadimg.php">Your Uploads</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">SignOff</a>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 align-items-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php" tabindex="-1" aria-disabled="true" style="color: rgba(18, 18, 221, 0.699);"><i class="fad fa-home" style="color: rgba(18, 18, 221, 0.699);" ></i> Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="pages/trending.php" tabindex="-1" aria-disabled="true"><i class="fad fa-fire" style=" color: rgb(255, 22, 22);"></i> Trending</a>
                        </li>
                        <li class="nav-item">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle text-center" data-toggle="dropdown" style="padding-left: 15%;"><i class="fad fa-bars" style="color: rgba(136, 255, 0, 0.815);"></i> Category</button>
                                <ul class="dropdown-menu scrollable-menu" role="menu">
                                    <li><a class="dropdown-item" href="pages/abstract.html">Abstract</a></li>
                                    <li><a class="dropdown-item" href="pages/art.html">Art</a></li>
                                    <li><a class="dropdown-item" href="pages/animals.html">Animals</a></li>
                                    <li><a class="dropdown-item" href="pages/anime.html">Anime</a></li>
                                    <li><a class="dropdown-item" href="pages/astro.html">Astro</a></li>
                                    <li><a class="dropdown-item" href="pages/black.html">Black</a></li>
                                    <li><a class="dropdown-item" href="pages/bridge.html">Bridge</a></li>
                                    <li><a class="dropdown-item" href="pages/cars.html">Cars</a></li>
                                    <li><a class="dropdown-item" href="pages/city.html">City</a></li>
                                    <li><a class="dropdown-item" href="pages/cloud.html">Cloud</a></li>
                                    <li><a class="dropdown-item" href="pages/dark.html">Dark</a></li>
                                    <li><a class="dropdown-item" href="pages/fashion.html">Fashion</a></li>
                                    <li><a class="dropdown-item" href="pages/flowers.html">Flowers</a></li>
                                    <li><a class="dropdown-item" href="pages/food.html">Food</a></li>
                                    <li><a class="dropdown-item" href="pages/macro.html">Macro</a></li>
                                    <li><a class="dropdown-item" href="pages/motorcycles.html">Motorcycles</a></li>
                                    <li><a class="dropdown-item" href="pages/music.html">Music</a></li>
                                    <li><a class="dropdown-item" href="pages/motion.html">Motion</a></li>
                                    <li><a class="dropdown-item" href="pages/nature.html">Nature</a></li>
                                    <li><a class="dropdown-item" href="pages/other.html">Other</a></li>
                                    <li><a class="dropdown-item" href="pages/people.html">people</a></li>
                                    <li><a class="dropdown-item" href="pages/sky">Sky</a></li>
                                    <li><a class="dropdown-item" href="pages/sport.html">Sport</a></li>
                                    <li><a class="dropdown-item" href="pages/street.html">Street</a></li>
                                    <li><a class="dropdown-item" href="pages/technologie.html">Technologie</a></li>
                                    <li><a class="dropdown-item" href="pages/texture.html">Texture</a></li>
                                    <li><a class="dropdown-item" href="pages/travel.html">Travel</a></li>
                                </ul>
                            </div>
                        </li>    
                    </ul>
                    <form class="my-2 my-lg-0">
                        <div class="row no-gutters align-items-center">
                            <input class="form-control sbdr rounded-pill pr-5" type="text" placeholder="Search" id="example-search-input2">
                            <div class="col-auto">
                                <button class="btn btn-outline-light text-dark border-0 rounded-pill ml-n5" type="button">
                                <i class="fad fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="pages/upload.php" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-success bt col-sm-12"><i class="fad fa-cloud-upload"></i> Upload</button></a>
                        </li>
                        <li class="nav-item dropleft text-decoration-none">
                            <div class="d-none d-md-block d-lg-block d-xl-block">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="logp rounded-circle" src="https://picsum.photos/id/237/200/300" alt=""></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="pages/profile.php">Account</a>
                                    <a class="dropdown-item" href="pages/editprofile.php">Edit Profile</a>
                                    <a class="dropdown-item" href="pages/favimg.php">Saved Images</a>
                                    <a class="dropdown-item" href="pages/usruploadimg.php">Your Uploads</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">SignOff</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropleft text-decoration-none ">
                            <div class="d-none d-md-block d-lg-block d-xl-block">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning bt"><i class="fad fa-user-alt"></i></button></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="pages/login.php">Sign In</a>
                                </div>
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
                <form action="">
                    <div class="row no-gutters mt-3 align-items-center">
                        <input class="form-control sbdr bg-light rounded-pill pr-5" type="text" placeholder="Search Images Eg: Nature, Potrait, Abstract etc." id="example-search-input2" style="height: 48px;">
                        <div class="col-auto">
                            <button class="btn btn-outline-light text-dark border-0 rounded-pill ml-n5" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
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
                    <img src="https://dummyimage.com/600x400/000/fff2.jpg" class="d-block cimg" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Welcome to the Gallery</h5>
                      <p>Scrole For More.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="https://dummyimage.com/600x400/000/fff2.jpg" class="d-block cimg" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Second slide label</h5>
                      <p>Some representative placeholder content for the second slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="https://dummyimage.com/600x400/000/fff2.jpg" class="d-block cimg" alt="...">
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
                                        <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fad fa-heart"></i> <span>500</span></a>
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
                                        <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fad fa-eye"></i> <span>500</span></a>
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
                                        <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fad fa-eye"></i> <span>500</span></a>
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
                                        <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fad fa-eye"></i> <span>500</span></a>
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
                                        <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fad fa-eye"></i> <span>500</span></a>
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
                                        <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fad fa-eye"></i> <span>500</span></a>
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
                                        <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fad fa-eye"></i> <span>500</span></a>
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
                                        <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fad fa-eye"></i> <span>500</span></a>
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
                                        <a href="#" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fad fa-eye"></i> <span>500</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>               
                             
                             
            </div>        
        </div>
        <!----------------------Footer Section---------------------------------------------------->
        <footer>
            <div class="bg-light text-dark pt-1">
                <div class="container">
                    <div class="row text-center text-md-left ">
                        <div class="col-md-10 col-xl-10 col-lg-10">
                            <div class="col-12 mt-3">
                                <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">About Us</h5>
                                <hrc class="mb-4">
                                <p>All started with a vision of giving all users a place where users upload and download their pictures taken by mobile phone. And we created <b>PIXWAVE</b>. <a style="text-decoration: none;" href="#"><i>READ MORE</i></a></p>
                            </div>
                            <div class="col-lg-8 col-md-12 col-xl-8 col-sm-12 mt-3">
                                <div class="qll">
                                    <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">Quick Links</h5>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p>
                                                <a href="#" class="text-dark" style="text-decoration: none;" ><i class="fad fa-person-sign"></i> About US</a>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>
                                                <a href="#" class="text-dark" style="text-decoration: none;" ><i class="fad fa-file-check"></i> Terms & Conditions</a>
                                            </p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>
                                                <a href="#" class="text-dark" style="text-decoration: none;" ><i class="fad fa-shield-check"></i> Privacy policy</a>
                                            </p>
                                        </div>
                                    </div>    
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 mt-3">
                            <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">Join Us</h5>
                                <div class="container pl-0">
                                    <div class="col-md-2">
                                        <div class="social-icons">
                                            <a href="#"><img src="pages/assets/img/fb.png"></a>
                                            <a href="#"><img src="pages/assets/img/ins.png"></a>
                                            <a href="#"><img src="pages/assets/img/tw.png"></a>
                                            <a href="#"><img src="pages/assets/img/in.png"></a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="row d-flex justify-content-center">
                        <div>
                            <p>
                                Copyright &copy; <script>document.write(new Date().getFullYear())</script> <a style="text-decoration: none;" href="/"><strong class="text-dark" style="text-decoration: none;"> PIXWAVE </strong></a> - All rights reserved
                            </p>
                        </div>
                    </div>
                </div>
            <div>    
        </footer>
    </body>
</html>