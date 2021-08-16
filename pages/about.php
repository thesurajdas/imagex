<?php
    //Add database connection
    require_once('../auth.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>About Us</title>
        <!-- Favicon -->
		<link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
        <link rel="icon" href="../img/icon.png" type="image/x-icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/jquery-3.5.1.slim.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <link href="../css/aboutus.css" rel="stylesheet">

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
        <!-------------------------------------------------------Contaxct Us---------------------------------------------->
          
        <div class="bg-light">
            <div class="container py-5">
                <div class="row h-100 align-items-center py-5">
                    <div class="col-lg-6">
                        <h1 class="display-4 ">About us</h1>
                        <p class="lead text-muted mb-0"><?php echo $row_config['site_name']; ?> is internet source of freely usable unlimited images. <?php echo $row_config['site_name']; ?> provides high quality and completely free stock photos licensed under the <?php echo $row_config['site_name']; ?> license. All photos are nicely tagged, searchable and also easy to discover.</p>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block"><img src="../img/about us.svg" alt="" class="img-fluid"></div>
                </div>
            </div>
        </div>
          
        <div class="bg-white py-5">
            <div class="container py-5">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 order-2 order-lg-1"><i class="fad fa-images fa-2x mb-3" style="color: #00B0FF;"></i>
                        <h2 class="font-weight-light">Photos</h2>
                        <p class="font-italic text-muted mb-4">We have free stock photos and every day new high-resolution photos will be added. All photos are hand-picked from photos uploaded by our users. Here on <?php echo $row_config['site_name']; ?> all of our published photos and images are free to download.</p>
                    </div>
                    <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="../img/photo.svg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-5 px-5 mx-auto"><img src="../img/photo source.svg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                    <div class="col-lg-6"><i class="fad fa-radar fa-2x mb-3" style="color: #00BFA6;"></i>
                        <h2 class="font-weight-light">Photo Sources</h2>
                        <p class="font-italic text-muted mb-4">Only free images from our community of photographers added to our photo database. We constantly try to deliver as many high-quality free stock photos as possible to the creatives who use our website.</p>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 order-2 order-lg-1"><i class="fad fa-bullseye-arrow  fa-2x mb-3" style="color: #F50057;"></i>
                        <h2 class="font-weight-light">Mission</h2>
                        <p class="font-italic text-muted mb-4">Our purpose is to collect and archive Beautiful, meaningful, amazing photographs that photographers can share and use for their personal and non-personal need. They can use photos freely which empowers them to create amazing art.</p>
                    </div>
                    <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="../img/mission.svg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-5 px-5 mx-auto"><img src="../img/feature.svg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                    <div class="col-lg-6"><i class="fad fa-french-fries fa-2x mb-3" style="color: #536DFE;"></i>
                        <h2 class="font-weight-light">Specialized Feature</h2>
                        <p class="font-italic text-muted mb-4">There is so much on mobile photography. Our present days phone’s cameras are also great. And many people love to shot pictures, capture their memories through mobile cameras so we have specially created this site for mobile photographers. The uploaded picture on our site shot by phone. As it is our solely focus is to create a big mobile photography environment.</p>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 order-2 order-lg-1"><i class="fad fa-handshake fa-2x mb-3" style="color: #F9A826"></i>
                        <h2 class="font-weight-light">Community</h2>
                        <p class="font-italic text-muted mb-4">Anyone can join the <?php echo $row_config['site_name']; ?> community. We’re the place where creators meet their audience, where individuals become a community and where anyone can become a source for creativity. If you are interested your images are welcome.</p>
                    </div>
                    <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="../img/community.svg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-5 px-5 mx-auto"><img src="../img/contribute.svg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                    <div class="col-lg-6"><i class="fad fa-box-heart fa-2x mb-3" style="color: #6C63FF;"></i>
                        <h2 class="font-weight-light">Contribute</h2>
                        <p class="font-italic text-muted mb-4">All submitted photos are moderated by us and we sure all the accepted images are high quality. To support us you can sign up and upload your own pictures to the <?php echo $row_config['site_name']; ?> community.</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Join now</a>
                    </div>
                </div>
            </div>
        </div>
          
        <div class="bg-light py-5">
            <div class="container py-5">
                <div class="row mb-4">
                    <div class="col-lg-5">
                        <h2 class="display-4 font-weight-light"><i class="fad fa-users" style="color: rgb(125, 145, 145);"></i> Our team</h2>
                        <p class="font-italic text-muted"><?php echo $row_config['site_name']; ?> is a free stock photo site created in 2021 by Akash Sarkar, Suraj Das and Kingshuk Chowlia.</p>
                    </div>
                </div>
          
              <div class="row text-center">
                <!-- Team item-->
                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="../img/akash.jpg" alt="" width="200" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Akash Sarkar</h5><span class="small text-uppercase text-muted">Front-end Developer</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="https://github.com/akashs-arkar1489" class="social-link"><i class="fa fa-github"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End-->
          
                <!-- Team item-->
                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="../img/suraj.jpg" alt="" width="200" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Suraj Das</h5><span class="small text-uppercase text-muted">back-end Developer</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="https://github.com/thesurajdas" class="social-link"><i class="fa fa-github"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End-->
          
                <!-- Team item-->
                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="../img/kingshuk.jpg" alt="" width="200" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Kingshuk Chowlia</h5><span class="small text-uppercase text-muted">Project Manager</span>
                            <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="https://github.com/kingshuk11" class="social-link"><i class="fa fa-github"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End-->
          
              </div>
            </div>
          </div>
          

        <!-------------------------------------------------------Footer Section---------------------------------------------------->
        <?php require_once('include/footer.php'); ?>
    </body>
</html>