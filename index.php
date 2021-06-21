<?php
    require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <script src="js/jquery-3.5.1.slim.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
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
                <a class="navbar-brand" href="index.php"><img style="height: 40px;" src="img/logo.svg" alt=""></a>
                <?php if (!isset($user_id)){?>
                <div class="d-md-none d-lg-none d-lg-none d-lx-none">
                    <a class="nav-link dropdown-toggle" href="login.php" role="button"><button type="button" class="btn btn-outline-warning bt"><i class="fas fa-user-circle"></i></button></a>   
                </div>
                <?php } ?>
                <?php if (isset($user_id)){?>
                <div class="d-md-none d-lg-none d-lg-none d-lx-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="logp rounded-circle" src="<?php echo $site_url."/".$user_avatar; ?>" alt="<?php echo $user_username; ?>" alt=""></a>
                    <div class="dropdown-menu" style="left: auto; right: 0; top: 20; min-width: none; margin-right: 10px;" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="pages/<?php echo $site_url.'/pages/profile.php?u='.$user_username; ?>">My Profile</a>
                        <a class="dropdown-item" href="pages/editprofile.php">Edit Profile</a>
                        <?php if ($row['admin']==1) {
                                    echo "<div class='dropdown-divider'></div><a class='dropdown-item' href='admin'>Admin Panel</a>";
                                } ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages/logout.php">Sign out</a>
                    </div>
                </div>
                <?php } ?>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 align-items-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php" tabindex="-1" aria-disabled="true" style="color: rgba(18, 18, 221, 0.699);"><i class="fad fa-home" style="color: rgba(18, 18, 221, 0.699);" ></i> Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="pages/trending.php" tabindex="-1" aria-disabled="true" style="color: rgb(255, 22, 22)"><i class="fad fa-fire"></i> Trending</a>
                        </li>
                        <li class="nav-item">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle text-center" data-toggle="dropdown" style="font-weight: 400; color: rgb(13 150 4 / 89%); padding-right: inherit;"><i class="fad fa-list-alt"></i> Category</button>
                                <ul class="dropdown-menu scrollable-menu" role="menu" style="top: 100%">
                                <li><a class="dropdown-item" href="pages/category.php?id=0">All Images</a></li>
                                <?php
                                    include('connect.php');
                                    $sql="SELECT * FROM categories ORDER BY category ASC";
                                    $result_cat=$connect->query($sql);
                                    while($row_cat=$result_cat->fetch_assoc()):
                                ?>
                                    <li><a class="dropdown-item" href="pages/category.php?id=<?php echo $row_cat['id']; ?>"><?php echo $row_cat['category']; ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </li>    
                    </ul>
                    <form action="search.php" method="GET" class="my-2 my-lg-0">
                        <div class="row no-gutters align-items-center">
                            <input type="text" autocomplete="off" name="q" id="query" data-toggle="dropdown" class="form-control sbdr rounded-pill pr-5" placeholder="Search" <?php if(isset($_GET['q'])){echo "value='".$_GET['q']."' ";} ?> required>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-light text-dark border-0 rounded-pill ml-n5">
                                <i class="fad fa-search"></i>
                                </button>
                            </div>
                            <!-- Here autocomplete list will be display -->
                            <div id="search-box" class="dropdown-menu" style="top: 80%"><div class="dropdown-item"><i class="fad fa-info-circle" style="color: #3654a9"></i> Type Something...</div></div>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="upload.php" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-success bt col-sm-12"><i class="fad fa-cloud-upload"></i> Upload</button></a>
                        </li>
                        <?php if (isset($user_id)){?>
                        <li class="nav-item dropleft text-decoration-none">
                            <div class="d-none d-md-block d-lg-block d-xl-block">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="logp rounded-circle" src="<?php echo $site_url."/".$user_avatar; ?>" alt="<?php echo $user_username; ?>"></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo $site_url.'/pages/profile.php?u='.$user_username; ?>">My Profile</a>
                                    <a class="dropdown-item" href="editprofile.php">Edit Profile</a>
                                    <?php if ($row['admin']==1) {
                                        echo "<div class='dropdown-divider'></div><a class='dropdown-item' href='admin'>Admin Panel</a>";
                                    } ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Sign out</a>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        <?php if (!isset($user_id)){?>
                        <li class="nav-item dropleft text-decoration-none ">
                            <div class="d-none d-md-block d-lg-block d-xl-block">
                            <a class="nav-link dropdown-toggle" href="login.php" role="button"><button type="button" class="btn btn-outline-warning bt"><i class="fas fa-user-circle"></i> Log IN</button></a>
                            </div>    
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>
   
        <!---------------------------------------------------banner--------------------------------------------->
        
        <!---------------------------------------Search bar------------------------------------->
        <div class="searchbar">
            <div class="container">
                <form action="">
                    <div class="row no-gutters mt-3 justify-content-center">
                        <input class="form-control col-md-8 sbdr bg-light rounded-pill pr-5" type="text" placeholder="Search Images Eg: Nature, Potrait, Abstract etc." id="example-search-input2" style="padding-left: 25px">
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
                    <img src="upload\images\d50c792a35.jpg" class="d-block cimg" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Welcome to the Gallery</h5>
                      <p>Scrole For More.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="upload\images\75c37a2060.jpg" class="d-block cimg" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Second slide label</h5>
                      <p>Some representative placeholder content for the second slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="upload\images\96fbc5671e.jpg" class="d-block cimg" alt="...">
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
        <div class="container shadow-lg p-3 mt-4 mb-5 my-3" style="border-radius: 1.25rem;">
            <div class="container shadow-lg p-3 mb-5 bg-white my-3 glry" style="border-radius: 1.25rem">
                <h3 class="text-center " data-toggle="tooltip" title="Best Of Week" style="color: #047dffc7"><i class="fad fa-star-of-david"></i> Featured</h3>
                <hr class="mb-3" style="border-radius: 1.25rem; border-top: 5px solid #dae0e5c4;">
                <div class="owl-carousel owl-theme">
                    <div class="item"><img class="fci" src="https://dummyimage.com/600x400/000/fff2.jpg" alt=""></div>
                    <div class="item"><img class="fci" src="https://dummyimage.com/600x400/000/fff2.jpg" alt=""></div>
                    <div class="item"><img class="fci" src="https://dummyimage.com/600x400/000/fff2.jpg" alt=""></div>
                    <div class="item"><img class="fci" src="https://dummyimage.com/600x400/000/fff2.jpg" alt=""></div>
                    <div class="item"><img class="fci" src="https://dummyimage.com/600x400/000/fff2.jpg" alt=""></div>
                    <div class="item"><img class="fci" src="https://dummyimage.com/600x400/000/fff2.jpg" alt=""></div>
                    <div class="item"><img class="fci" src="https://dummyimage.com/600x400/000/fff2.jpg" alt=""></div>
                    <div class="item"><img class="fci" src="https://dummyimage.com/600x400/000/fff2.jpg" alt=""></div>
                    <div class="item"><img class="fci" src="https://dummyimage.com/600x400/000/fff2.jpg" alt=""></div>
                    <div class="item"><img class="fci" src="https://dummyimage.com/600x400/000/fff2.jpg" alt=""></div>
                    <div class="item"><img class="fci" src="https://dummyimage.com/600x400/000/fff2.jpg" alt=""></div>
                    <div class="item"><img class="fci" src="https://dummyimage.com/600x400/000/fff2.jpg" alt=""></div>
                </div>                  
            </div>
            <div class="container shadow-lg p-3 mb-5 bg-white my-3 glry" style="border-radius: 1.25rem">
                <h3 class="text-center " data-toggle="tooltip" title="Letest Images" style="color: #00bb3a"><i class="fad fa-layer-plus"></i> Fresh Captured</h3>
                <hr class="mb-3" style="border-radius: 1.25rem; border-top: 5px solid #dae0e5c4;">
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
        </div>    
        <!----------------------Footer Section---------------------------------------------------->
<footer>
<div class="bg-light text-dark pt-1">
                <div class="container">
                    <div class="row text-center text-md-left ">
                        <div class="col-md-10 col-xl-10 col-lg-10">
                            <div class="col-12 mt-3">
                                <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">About</h5>
                                <hrc class="mb-4">
                                <p><b>Pixwave</b> started with a vision of giving all users a place where users upload and download their pictures taken by mobile phone.
                            </div>
                            <div class="col-lg-8 col-md-12 col-xl-8 col-sm-12 mt-3">
                                <div class="qll">
                                    <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">Quick Links</h5>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p>
                                                <a href="aboutus.php" class="text-dark" style="text-decoration: none;" ><i class="fad fa-person-sign"></i> About Us</a>
                                            </p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>
                                                <a href="contact.php" class="text-dark" style="text-decoration: none;" ><i class="fad fa-address-book"></i> Contact Us</a>
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <p>
                                                <a href="terms.php" class="text-dark" style="text-decoration: none;" data-toggle="tooltip" title="Terms And Conditions" ><i class="fad fa-file-check"></i> Terms</a>
                                            </p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>
                                                <a href="privacy.php" class="text-dark" style="text-decoration: none;" ><i class="fad fa-shield-check"></i> Privacy Policy</a>
                                            </p>
                                        </div>
                                    </div>    
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 mt-3">
                            <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">Connect with</h5>
                                <div class="container pl-0">
                                    <div class="col-md-2">
                                        <div class="social-icons">
                                            <a href="#" ><img src="pages/assets/img/fb.png"></a>
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
<!-------bootstrap tooltip script---->
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script>
        //Send Searching Request
    $(document).ready(function(){
        $('#query').keyup(function(){
            var query = $(this).val();
            if(query!=''){
                $.ajax({
                    url: "pages/search-value.php",
                    method: "GET",
                    data: {q:query},
                    success: function(data){
                        $('#search-box').fadeIn("fast").html(data);
                    }
                });
            }
            else{
                $('#search-box').fadeOut();
            }
        });
    });
    $(document).on('click','#search-box a',function(){
        $('#query').val($(this).text());
        $('#search-box').fadeOut("fast");
    });
</script>
        
        <script>
            jQuery(document).ready(function() {
                jQuery('.owl-carousel').owlCarousel({
                loop: true,
                nav:false,
                margin:10,
                autoplay: true,
                slideTransition: 'linear',
                autoplaySpeed: 6000,
                smartSpeed: 6000,
                center: true,
                dots:false,
                responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },            
                        960:{
                            items:3
                        },
                        1200:{
                            items:3
                        }
                    }
                });


                jQuery('.owl-carousel').trigger('play.owl.autoplay',[2000]);

                function setSpeed(){
                    jQuery('.owl-carousel').trigger('play.owl.autoplay',[6000]);
                }

                setTimeout(setSpeed, 1000);
            });
        </script>
       
        <script type="text/javascript">
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
    
    </body>
</html>