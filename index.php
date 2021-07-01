<?php
    require_once('connect.php');
    $login=0;
    //Check only non-login users and redirect them to login page.
    if(isset($_COOKIE['user_id'])){
        //Decode login cookie
        $user_id=$_COOKIE['user_id'];
        $user_id=convert_uudecode($user_id);
        //Get Data from SQL
        $sql="SELECT * FROM users WHERE id='".$user_id."';";
        $result=$connect->query($sql);
        $row=$result->fetch_assoc();
        //Check cookie id with database id with === operator
        if ($user_id===$row['id']) {
            $login=1;
            $id=$row['id'];
            $user_username=$row['username'];
            $user_name=$row['name'];
            $user_email=$row['email'];
            $last_active=$row['last_active'];
            $user_avatar=$row['avatar'];
            //Get stats Table data
            $today_date=date('Y-m-d');
            $sql_stats="SELECT * FROM stats WHERE id=1;";
            $result_stats=$connect->query($sql_stats);
            $r_stats=$result_stats->fetch_assoc();
            $stats_date=$r_stats['date'];
            //Today date
            $today_date=date('Y-m-d');
            //check today with stats date
            if ($today_date!=$stats_date) {
                $sql="UPDATE stats SET date='$today_date',today_active_users=0";
                $connect->query($sql);
            }
            //check last active and update
            if ($last_active!=$today_date) {
                $sql1="UPDATE stats SET today_active_users=today_active_users+1 WHERE id=1;";
                $connect->query($sql1);
            }
            //Update last active user every page refresh
            $sql2="UPDATE users SET last_active='$today_date' WHERE id='$id';";
            $connect->query($sql2);
        }
        else{
            header("Location:login.php");
            exit();
        }
    }
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
        <script src="js/jquery.min.js"></script>
        <script src="js/clipboard.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
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
            .navbar-toggler{
                border: none;
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
                <a class="navbar-brand" href="index.php"><img draggable="false" style="height: 40px;" src="img/logo.svg" alt="" onContextMenu="return false;"></a>
                <?php if (!isset($user_id)){?>
                <div class="d-md-none d-lg-none d-lg-none d-lx-none">
                    <a class="nav-link dropdown-toggle" href="pages/login.php" role="button"><button type="button" class="btn btn-outline-warning bt"><i class="fas fa-user-circle"></i></button></a>   
                </div>
                <?php } ?>
                <?php if (isset($user_id)){?>
                <div class="d-md-none d-lg-none d-lg-none d-lx-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img draggable="false" class="logp rounded-circle" src="<?php echo $site_url."/".$user_avatar; ?>" alt="<?php echo $user_username; ?>" alt="" onContextMenu="return false;"></a>
                    <div class="dropdown-menu" style="left: auto; right: 0; top: 20; min-width: none; margin-right: 10px;" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo $site_url.'/pages/profile.php?u='.$user_username; ?>">My Profile</a>
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
                            <a class="nav-link" href="pages/upload.php" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-success bt col-sm-12"><i class="fad fa-cloud-upload"></i> Upload</button></a>
                        </li>
                        <?php if (isset($user_id)){?>
                        <li class="nav-item dropleft text-decoration-none">
                            <div class="d-none d-md-block d-lg-block d-xl-block">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img draggable="false" class="logp rounded-circle" src="<?php echo $site_url."/".$user_avatar; ?>" alt="<?php echo $user_username; ?>" onContextMenu="return false;"></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo $site_url.'/pages/profile.php?u='.$user_username; ?>">My Profile</a>
                                    <a class="dropdown-item" href="pages/editprofile.php">Edit Profile</a>
                                    <?php if ($row['admin']==1) {
                                        echo "<div class='dropdown-divider'></div><a class='dropdown-item' href='admin'>Admin Panel</a>";
                                    } ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="pages/logout.php">Sign out</a>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        <?php if (!isset($user_id)){?>
                        <li class="nav-item dropleft text-decoration-none ">
                            <div class="d-none d-md-block d-lg-block d-xl-block">
                            <a class="nav-link dropdown-toggle" href="pages/login.php" role="button"><button type="button" class="btn btn-outline-warning bt"><i class="fas fa-user-circle"></i> Join Now</button></a>
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
                <form action="pages/search.php" method="GET">
                    <div class="row no-gutters mt-3 justify-content-center">
                        <input type="search" name="q" placeholder="Search Images Eg: Nature, Potrait, Abstract etc." class="form-control col-md-8 sbdr bg-light rounded-pill pr-5" style="padding-left: 25px">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-outline-light text-dark border-0 rounded-pill ml-n5">
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
                    <img draggable="false" src="upload\slide\slide1.jpg" class="d-block cimg" alt="..." onContextMenu="return false;">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Welcome to the Gallery</h5>
                      <p>Scrole For More.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img draggable="false" src="upload\slide\slide2.jpeg" class="d-block cimg" alt="..." onContextMenu="return false;">
                    <div class="carousel-caption d-none d-md-block">
                      <!-- <h5>Second slide label</h5>
                      <p>Some representative placeholder content for the second slide.</p> -->
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img draggable="false" src="upload\slide\slide3.jpg" class="d-block cimg" alt="..." onContextMenu="return false;">
                    <div class="carousel-caption d-none d-md-block">
                      <!-- <h5>Third slide label</h5>
                      <p>Some representative placeholder content for the third slide.</p> -->
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
                <h3 class="text-center " data-toggle="tooltip" title="Best Of Week" data-placement="top" style="color: #047dffc7"><i class="fad fa-star-of-david"></i> Featured</h3>
                <hr class="mb-3" style="border-radius: 1.25rem; border-top: 5px solid #dae0e5c4;">
                <div class="owl-carousel owl-theme">
                <?php
                $fi_date=date('Y-m');
                $sql="SELECT * FROM images WHERE visibility=0 AND time LIKE '{$fi_date}%' ORDER BY id,likes+views DESC, downloads DESC LIMIT 5";
                $result_fi=$connect->query($sql);
                while($row_fi=$result_fi->fetch_assoc()):
                ?>
                    <a href="<?php echo "pages/image.php?id=".$row_fi['image_id']; ?>"><div class="item"><img draggable="false" class="fci im" src="<?php echo $site_url,$row_fi['image_location']; ?>" alt="" onContextMenu="return false;"></div></a>
                <?php endwhile; ?>
                </div>                  
            </div>
            <div class="container shadow-lg p-3 mb-5 bg-white my-3 glry" style="border-radius: 1.25rem">
                <h3 class="text-center " data-toggle="tooltip" title="Letest Images" style="color: #00bb3a"><i class="fad fa-layer-plus"></i> Fresh Captured</h3>
                <hr class="mb-3" style="border-radius: 1.25rem; border-top: 5px solid #dae0e5c4;">
                <div id="loadData" class="row"></div>
                <div id="searching">Loading...</div>   
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
                                                    <a href="pages/about.php" class="text-dark" style="text-decoration: none;" ><i class="fad fa-person-sign"></i> About Us</a>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p>
                                                    <a href="pages/contact.php" class="text-dark" style="text-decoration: none;" ><i class="fad fa-address-book"></i> Contact Us</a>
                                                </p>
                                            </div>
                                            <div class="col-md-2">
                                                <p>
                                                    <a href="pages/terms.php" class="text-dark" style="text-decoration: none;" data-toggle="tooltip" title="Terms And Conditions" ><i class="fad fa-file-check"></i> Terms</a>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p>
                                                    <a href="pages/privacy.php" class="text-dark" style="text-decoration: none;" ><i class="fad fa-shield-check"></i> Privacy Policy</a>
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
                                    Copyright &copy; <span id="year"></span><script>let d = new Date(); let n = d.getFullYear(); document.getElementById("year").innerHTML = n;</script> <a style="text-decoration: none;" href="/"><strong class="text-dark" style="text-decoration: none;"> PIXWAVE </strong></a> - All rights reserved
                                </p>
                            </div>
                        </div>
                    </div>
            <div>    
        </footer>
        <!----------------------Share popup start--------------------------------------->
  <div class="modal fade" id="shareimg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Share Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <div id="sharepop"></div>
    <div class="modal-footer">
                <button type="button" class="btn btn-secondary bt" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
     <!----------------------Share popup end--------------------------------------->
        <!-- Index pagination -->
            <script>
                $(document).ready(function(){
                    // Load Data from Database with Ajax
                    function loadTable(page){
                    $.ajax({
                        url: "pages/index-pagination.php",
                        type: "POST",
                        data : { page_no : page },
                        success: function(data){
                        if(data){
                            $("#searching").remove();
                            $("#pagination").remove();
                            $("#loadData").append(data);
                        }else{
                            $("#searching").html("<div class='container text-center'><img style='height: 150px; width: 150px; object-fit: contain;' src='../img/notfound.svg' alt=''><h2 style='padding-top: 20px; padding-bottom: 25px; color: #6c757dd4;'>Sorry! No Result Found. <i class='fad fa-heart-broken' style='color: red;'></i></div>");
                            $("#ajaxbtn").html("<i class='fad fa-sad-cry'></i> No more images found!");
                            $("#ajaxbtn").prop("disabled",true);
                        }
                        
                        }
                    });
                    }
                    loadTable();
                    // Add Click Event on ajaxbtn
                    $(document).on("click","#ajaxbtn",function(){
                    $("#ajaxbtn").html("<div class='spinner-border spinner-border-sm text-info' role='status'><span class='sr-only'></span></div> Loading...");
                    var pid = $(this).data("id");
                    loadTable(pid);
                    });

                });
            </script>
                <?php if ($login==1) { ?>
                <script>
                //AJAX Like
                    function mylike(id){
                        $(document).ready(function(){
                            //Send AJAX request
                            $.ajax({
                                url: 'pages/like.php',
                                type: 'POST',
                                data: 'user_id=<?php echo $user_id; ?>&image_id='+id,
                                    success: function(result){
                                    $('#'+id).html(result);
                                }
                            });
                        });
                    }
                </script>
                <?php } else{ ?>
                <script>
                //Not Login Like
                    function mylike(id){
                        alert('You need to login to like this post!');
                    }
                </script>
                <?php } ?>
        <!-------bootstrap tooltip script---->
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
                            items:2
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
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
                })
                //Share scripts
        function shareimgpop(id){
            $(document).ready(function(){
                $.ajax({
                    url: 'pages/share-load.php',
                    type: 'POST',
                    data: 'img_id='+id,
                    success: function(result){
                        $('#sharepop').html(result);
                    }
                });
            });
        }
        </script>
    
    </body>
</html>