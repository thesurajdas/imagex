<?php
    //Add database connection
    require_once('../auth.php');
    //Get image id
    if (isset($_GET['id'])) {
        $img_id=$_GET['id'];
        $sql="SELECT * FROM images WHERE image_id='$img_id'";
        $result_img=$connect->query($sql);
        $row_img=$result_img->fetch_assoc();
        if($row_img['visibility']!=0){
            if(isset($user_id)){
                if($user_id!=$row_img['user_id']){
                    header('location: 404.php');
                }
            }
            else{ header('location: 404.php'); }
        }
        //View System
        //create cookies
        $cookie_time = time()+60*60*24*10;
        if(!isset($_COOKIE['tmp_id'])){
            //Set image ID cookie
            if (!isset($_COOKIE['tmp_id'])) {
                $cookie_name = "tmp_id";
                $cookie_value = $img_id;
                setcookie($cookie_name,$cookie_value,$cookie_time);
            }
                //Update page view
                $sql="UPDATE images SET views=views+1 WHERE image_id='$img_id'";
                $connect->query($sql);
        }
        elseif((isset($_COOKIE['tmp_id'])) && ($_COOKIE['tmp_id']!=$img_id)){
            //Set Image ID cookie
            $cookie_name = "tmp_id";
            $cookie_value = $img_id;
            setcookie($cookie_name,$cookie_value,$cookie_time);
            //Update page view
            $sql="UPDATE images SET views=views+1 WHERE image_id='$img_id'";
            $connect->query($sql);
        }
        //Show images data
        $sql="SELECT * FROM images";
        $result=$connect->query($sql);
    }
    else{
        header('location: 404.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/tree.css">
        <script src="../js/jquery-3.5.1.slim.min.js"></script>
        <script src="../js/jquery.min.js"></script>
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
            .badge{
                white-space: unset;
            }

            /* .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
                color: #5a5a5a;
                background-color: #c5c5c5;
                border-color: #dee2e6 #dee2e6;
            } */

            a.badge-secondary.focus, a.badge-secondary:focus{
                box-shadow: none;
            }

            .btn-light {
                color: #212529;
                background-color: #f8f9fa;
                border: 2px solid #d8dadc;
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
                        <div class="row">
                            <div>
                                <div class="row">
                                    <?php
                                    $img_user_id=$row_img['user_id'];
                                    $sql="SELECT * FROM users WHERE id='$img_user_id'";
                                    $result_img=$connect->query($sql);
                                    $row_img_user=$result_img->fetch_assoc();
                                    ?>
                                    <img class="pimgg ml-4" src="<?php echo $site_url."/".$row_img_user['avatar']; ?>" alt="">
                                    <h5 class="pl-2 " style="padding-top: 3px;" data-toggle="tooltip" data-placement="bottom" title="<?php echo $row_img_user['username']; ?>"><a class="text-decoration-none" href="<?php echo $site_url."/pages/profile.php?u=".$row_img_user['username']; ?>"><?php
                                    echo $row_img_user['name'];
                                    ?></a></h5>
                                </div>
                            </div>
                            <!-- <div class="pr-3">  ///follow
                                <div class="row">
                                   <button>follow</button>
                                </div>
                            </div> -->
                        </div>
                    </a>
                </div>
                <img class="imx" draggable="false" src="<?php echo $site_url,$row_img['image_location']; ?>" alt="<?php echo $row_img['title']; ?>" onContextMenu="return false;">
                <div class="card-body">
                    <div class="profile-head">
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Photographer</a>
                            </li>
                            <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Capture Details</a>
                            </li>
                            <button type="button" class="btn text-warning"data-toggle="modal" data-target="#reportimg" style="position: absolute; left:87%; border-radius: 1.35rem"><i class="fad fa-exclamation-triangle"></i></button>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                                <!---------------image decription------------>
                                <?php
                                    // Open a the file from local folder
                                    $fl="../".$row_img['image_location'];
                                    $fp = fopen($fl, 'rb');
                                    // Read the exif headers
                                    $headers = exif_read_data($fp);
                                ?>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="container tabcon">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-eye" style="color: #6161bbd6;"></i> Views:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <h6 class="badge" style="color: #fff; background-color: #6161bbd6;"><?php $views=number_format($row_img['views']); echo $views; ?></h6>    
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-heart-circle" style="color: #ff0076d6;"></i> Hearts:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <h6 class="badge" style="color: #fff; background-color: #ff0076d6;"><?php $likes=number_format($row_img['likes']); echo $likes; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6 style="color: #15c500e0;"></i> Downloads:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <h6 class="badge" style="color: #fff; background-color: #15c500e0;"><?php $downloads=number_format($row_img['downloads']); echo $downloads; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-file-signature" style="color: #0062ccde;"></i> Image Name:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <h6 class="badge" style="color: #fff; background-color: #0062ccde;"><?php echo $row_img['title']; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-grip-vertical" style="color: #ff7600d6;"></i> Image Category:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <h6 class="badge" style="color: #fff; background-color: #ff7600d6;"><?php
                                                    //Check category Name
                                                    $category_id=$row_img['category'];
                                                        $sql="SELECT * FROM categories WHERE id='$category_id'";
                                                        $result_cat_name=$connect->query($sql);
                                                        $row_cat_name=$result_cat_name->fetch_assoc();
                                                    echo $row_cat_name['category']; 
                                                    ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-clock" style="color: rgb(0 0 0 / 74%);"></i> Publish On:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <h6 class="badge" style="color: #fff; background-color: rgb(0 0 0 / 74%);"><?php $date=date_create($row_img['time']); echo date_format($date,"d F, Y h:i A"); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-copyright" style="color: #b6b900;"></i> License:</h6>
                                                </div>
                                                <div class="col-6">
                                                <?php
                                                    $sql="SELECT * FROM license";
                                                    $result_lic=$connect->query($sql);
                                                    while($row_lic=$result_lic->fetch_assoc()):
                                                ?>
                                                    <h6 class="badge" style="color: #fff; background-color: #b6b900"><?php if($row_img['license_id']==$row_lic['id']) {echo $row_lic['license_name'];} ?></h6>
                                                <?php endwhile; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="container tabcon">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-mobile-android" style="color: #6161bbd6;"></i> Camera Used:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: #6161bbd6;"><?php if(isset($headers['Model'])){echo $headers['Model'];} else{echo "Unknown!";} ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-stopwatch" style="color: #ff0000c9"></i> Exposure Time:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: #ff0000c9;"><?php if(isset($headers['ExposureTime'])){echo $headers['ExposureTime'];} else{echo "Unknown!";} ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-expand-arrows" style="color: #01b528e3;"></i> Resolution:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: #01b528e3;"><?php if((isset($headers['COMPUTED']['Height']))&&(isset($headers['COMPUTED']['Width']))){echo $headers['COMPUTED']['Width']."x".$headers['COMPUTED']['Height'];} else{echo "Unknown!";} ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-border-none" style="color: #ff5e00d4"></i> Image Size:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: #ff5e00d4;"><?php $image_size=round($row_img['image_size']/1024); echo $image_size." KB"; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-question-circle" style="color: #00a1ffe8"></i> Aperture:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: #00a1ffe8;"><?php if(isset($headers['COMPUTED']['ApertureFNumber'])){echo $headers['COMPUTED']['ApertureFNumber'];} else{echo "Unknown!";} ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-water" style="color:darkslategray"></i></i> Focus Distance:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: darkslategray;"><?php if(isset($headers['COMPUTED']['FocusDistance'])){echo $headers['COMPUTED']['FocusDistance'];} else{echo "Unknown!";} ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fab fa-uncharted" style="color:cornflowerblue"></i> Software:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: cornflowerblue;"><?php if(isset($headers['Software'])){echo $headers['Software'];} else{echo "Unknown!";} ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-sort-circle" style="color:goldenrod"></i> ISO:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: goldenrod;"><?php if(isset($headers['ISOSpeedRatings'])){if(!empty($headers['ISOSpeedRatings'][0])){echo $headers['ISOSpeedRatings'][0];} else{echo $headers['ISOSpeedRatings'];}} else{echo "Unknown!";} ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6><i class="fad fa-alarm-exclamation" style="color:darkmagenta"></i> Capture Time:</h6>
                                                </div>
                                                <div class="col-6">
                                                    <p class="badge" style="color: #fff; background-color: darkmagenta;"><?php if(isset($headers['DateTimeOriginal'])){$date=date_create($headers['DateTimeOriginal']); echo date_format($date,"d F, Y h:i A");} else{echo "Unknown!";} ?></</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container pr-10 pl-10" >
                        <div class="row" style="justify-content: space-around;">
                        <?php
                                                            $image_id=$row_img['id'];
                                                                if($login==1){
                                                                    //Check liked or not
                                                                    $sql="SELECT * FROM likes WHERE image_id='$image_id' AND user_id='$user_id'";
                                                                    $result_like=$connect->query($sql);
                                                                    if($result_like->num_rows==1){
                                                                        $icon="fad";
                                                                        $like_color="color:red";
                                                                    }
                                                                    else{
                                                                        $icon="far";
                                                                        $like_color="";
                                                                    }
                                                                }
                                                                else{
                                                                    $icon="far";
                                                                    $like_color="";
                                                                }
                                                        ?>
                            <a class="btn btn-outline-danger bt" style="margin-top: 10px;" onclick="mylike(<?php echo $image_id; ?>)"><span id="<?php echo $image_id; ?>"><span style="<?php echo $like_color;?>"><i class="<?php echo $icon; ?> fa-heart"></i></span> <?php echo $row_img['likes']; ?></span><span> Heart</span></a>
                            <?php if($row_img['downloadable']==0): ?>
                            <a href="<?php echo $site_url,$row_img['image_location']; ?>" download="<?php echo $row_img['title']; ?>"><button type="button" id="countDown" onclick="countDownload(<?php echo $row_img['id']; ?>)" class="btn btn btn-outline-success bt" style="margin-top: 10px" ><i class="fad fa-cloud-download-alt"></i> Download (<?php $downloads=number_format($row_img['downloads']); echo $downloads; ?>)</button></a>
                            <?php endif; ?>
                            <a class="btn btn-outline-dark bt" data-toggle="modal" data-target="#shareimg" style="margin-top: 10px" id=""><i class="fad fa-share-square"></i> Share (<span id="sharecount"><?php $shares=number_format($row_img['shares']); echo $shares; ?></span>)</a>

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
        <div id="loadData" class="row"></div>
        <div id="searching" class='container text-center'>
            <div class="container" style="padding-bottom:25px">
                <div class="text-center trees">
                    <svg x="0" y="0" width="258" height="258">
                
                        <g clip-path="url(#clip-path)">
                                                    
                            <path class="tree-lite" d="M207.03 74.82c-0.77 0.9-3.85 2.06-4.37 0.64 -0.51-1.41-1.93 2.19-3.34 1.41 -1.41-0.77-5.27-2.31-5.52-0.9 -0.26 1.42-1.8 2.7-2.44 1.93 -0.64-0.77-3.21-3.6-2.18-4.37 1.03-0.77 1.42-2.95-0.51-2.31 -1.93 0.64-1.54-3.47 0-4.24 0.99-0.49 1.42-1.03 2.31 0.39s2.19-0.26 2.19-1.28 0.9-2.44 1.8-2.44 3.6 1.03 4.63 2.7c1.03 1.67 1.54 4.5 3.08 4.88C204.21 71.61 207.81 73.92 207.03 74.82M186.6 76.88c-2.31-0.9-1.03 3.6-3.98 1.93 -2.96-1.67-3.08-2.44-3.21-3.98 -0.13-1.54-4.63-1.67-0.26-3.85 1.16-0.58 3.86-0.77 3.73 0.51 -0.13 1.26-3.6 2.17 0.26 2.44 3.6 0.26-2.18 1.8 5.4 1.28C189.56 75.14 188.92 77.78 186.6 76.88M179.41 87.68c-1.42 0.51-1.93 1.28-2.44 0.64 0 0 2.06-2.95 2.83-2.7C180.56 85.87 180.82 87.16 179.41 87.68M176.32 91.53c-1.67 1.8-1.28 2.7-0.64 3.85 0.64 1.16-3.85-2.18-1.67-5.14C174.62 89.41 177.99 89.73 176.32 91.53M172.72 71.48c-1.41-0.51-0.13-3.21 0.64-4.88 0.58-1.25 0.77-3.34 2.06-1.67 1.29 1.67 0.64 3.47-0.13 4.5C174.52 70.45 175.63 72.54 172.72 71.48M170.67 69.34c-0.9 0-1.64-0.65-1.64-1.45 0-0.8 0.73-1.45 1.64-1.45 0.9 0 1.64 0.65 1.64 1.46C172.3 68.69 171.57 69.34 170.67 69.34M170.54 95.38c-0.51 0.64-0.9-1.67-2.44-1.54 -1.54 0.13-3.21-0.64-2.31-2.31 0 0 2.7-0.9 3.73 0.64C170.54 93.71 171.05 94.74 170.54 95.38M165.4 68.78c-0.9 0.64-0.9-0.9-3.6 0.64 -2.7 1.54-2.83-0.51-2.31-1.41 1-1.75 1.67-2.31 3.21-2.31s4.5-1.29 5.01 1.16c0.52 2.44 3.18 5.62 1.93 6.04C166.56 73.92 166.3 68.14 165.4 68.78M162.02 112.04c-1.99-1.52 0.13-1.82 0.13-1.82s1.07 0.1 1.44 0.57C164.43 111.83 164.02 113.56 162.02 112.04M163.04 124.87c-0.96 0.69-3.07 0.49-1.9-1.09 1.17-1.59 2.13-0.02 2.13-0.02S163.46 124.56 163.04 124.87M158.85 108.49c-0.64-0.13-3.08-1.8-4.88-1.8 -1.8 0-3.08 1.16-3.47-0.51 -0.2-0.89 1.8-2.06 2.7-2.44 0.9-0.38 2.7-1.41 3.08-2.44s1.67-1.41 2.06 0.64c0.39 2.06 5.14 3.6 4.63 5.01C162.44 108.36 159.49 108.62 158.85 108.49M160.15 123.91c0 0-0.64 0.51-1.1 0.26 -1.03-0.57-1.75-2.57 0.18-2.18C161.16 122.37 160.15 123.91 160.15 123.91M156.28 112.48c-1.03-0.64-2.7-0.39-3.08 0.64 -0.39 1.03-1.93 2.32-3.21 0.9 -1.29-1.41-0.51-4.62 1.8-3.21 1.19 0.72 5.4-2.31 5.91-1.54C158.2 110.03 157.3 113.12 156.28 112.48M156.84 121.2c-0.11 1.18 0.09 2.27-0.82 1.55 -0.77-0.6-0.63-4.07 0.49-3.42S156.95 120.02 156.84 121.2M149.08 54.78c-1.8 1.16-2.57 1.03-3.47 0.9 -0.9-0.13-1.16 2.06-2.06 0.13 -0.4-0.85 3.34-2.18 4.63-2.18 1.28 0 2.31-2.19 3.08-1.03 0.77 1.16 0.77 3.6-0.52 4.76C148.68 59.21 150.38 53.94 149.08 54.78M144.16 108.56c-2.01-0.59-5.42 0.65-3.34-1.81 1.58-1.86 2.12-4.57 3.76-2.24C145.29 105.51 147.58 109.56 144.16 108.56M144.07 118.39c-1.29-0.13-3.35-3.01-2.7-3.08 1.16-0.13 2.44-0.9 3.34 0.13C145.61 116.46 145.35 118.52 144.07 118.39M138.8 124.55c-2.44 3.86-4.76 1.93-5.27 1.41 -0.51-0.51-2.31-4.11-0.26-5.52 1.27-0.88 1.41-3.47 3.47-1.8C138.8 120.31 141.24 120.7 138.8 124.55M128.9 104.38c1.13-1.05 0.13-3.08 2.57-1.41 2.44 1.67 1.67 3.73 0.65 3.85C131.09 106.95 126.98 106.18 128.9 104.38M125.95 100.91c-0.39-1.54-0.77-2.57 0-3.6 0.34-0.46 2.31-0.9 2.7-0.26 0.39 0.64 2.31 0.77 2.44 1.93 0.13 1.16-2.18 1.16-2.7 1.67C127.88 101.17 126.34 102.45 125.95 100.91M126.59 116.46c-1.8 1.29-3.85 2.44-4.88 1.16 -1.03-1.28-2.18-2.05-3.47-2.57 -1.28-0.51-0.9-4.11-0.38-4.5 0.66-0.49 2.06-0.64 3.21-0.51 1.16 0.13 4.63 0.26 5.78 2.57C128 114.92 128.39 115.17 126.59 116.46M113.35 97.06c-0.64-1.8 1.42-3.73 1.67-4.24 0.26-0.51 2.06-2.95 3.6-1.67 1.55 1.29-0.77 2.44-0.9 3.47 -0.13 1.03 1.41-0.38 2.32 3.22 0.9 3.6-2.52 1.56-3.47 2.57C114.64 102.45 114 98.85 113.35 97.06M112.09 68.36c-1.01-0.43-0.63-1.49-0.19-2.26 0.44-0.77 1.3-0.19 1.3-0.19 0.05 0.24 1.4 1.69 1.01 2.17C113.82 68.56 113.1 68.8 112.09 68.36M108.99 51.56c-1.41 0.26-1.8-2.18 0-2.31 1.8-0.13 2.7 2.96 2.57 3.34C111.21 53.64 110.4 51.31 108.99 51.56M110.91 64.03c0 1.8-0.51 2.96-1.54 2.96 -1.03 0-3.34 1.2-4.24 1.28 -1.28 0.13-0.13 0.51-2.06-0.9 -1.92-1.41-0.9-0.51 0.39-2.44 1.28-1.93 2.06-0.64 5.01-1.93C111.43 61.72 110.91 62.23 110.91 64.03M106.16 119.16c-1.03 0.13-2.96-2.06-4.11-1.93s-2.06 2.31-3.98 1.8c-1.93-0.52-3.09-2.06-2.95-3.47 0.13-1.41-1.16-2.31 0.13-3.34 1.17-0.94 3.08 2.7 4.5 1.41 1.41-1.29 2.7-1.03 4.11-1.03 1.42 0 6.43 0.77 6.17 2.96C109.76 117.74 107.19 119.03 106.16 119.16M93.69 101.94c-1.44-0.58-2.44-2.57 0.26-2.19 2.7 0.39 1.29 1.93 1.29 1.93S94.34 102.19 93.69 101.94M95.89 102.21c0.98-1.2 2.87 0.05 2.87 0.05 0.55 0.95 0.88 2.98-0.24 2.51C97.4 104.3 94.91 103.41 95.89 102.21M109.5 79.83c0.65 1.03 0.65 2.19-0.51 1.8 -1.16-0.39-1.8 0.39-2.7 0.64 -0.9 0.26-2.82-0.45-2.7-1.54C103.85 78.42 108.86 78.81 109.5 79.83M106.93 97.31c0.39 1.8-0.13 2.57-1.28 2.31 -1.16-0.26-1.54 1.41-3.73 1.67s-4.05-3.15-4.05-4.18c0.77-1.29 4.05-1.35 5.46-2.25C104.75 93.97 106.54 95.51 106.93 97.31M96.91 81.25c0.26-2.57 1.03-0.64 2.44 0 1.42 0.64 4.24 1.54 0.26 2.44C98.35 83.98 96.65 83.82 96.91 81.25M99.35 31.39c1.31-1.31 1.03 1.16 3.34 1.29 2.31 0.13 6.03 0 5.91 1.54 -0.26 3.34 5.04 2.57 4.88 4.24 -0.26 2.83-3.47 3.34-3.85 4.11 -0.38 0.77-2.96 0.26-2.7 2.96 0.26 2.7-2.06-0.45-2.44-1.54 -0.77-2.18 2.32-3.34 1.8-4.5 -0.51-1.16-2.57 2.06-3.73 0.77 -1.16-1.29-2.57-0.26-1.54-2.83 1.03-2.57 0.39-2.18-0.9-2.7C98.84 34.22 98.84 31.9 99.35 31.39M104.1 26.25c1.67 0.39 4.88 1.03 4.5 2.83 -0.38 1.8-1.67 2.31-2.31 1.03 -0.64-1.29-0.13-2.19-2.44-2.19 -2.31 0-2.7 0.52-2.7-0.51C101.15 26.59 102.43 25.86 104.1 26.25M116.95 46.17c-0.98 1.43-1.45 1.84-1.63 1.94 0.16 0.03 0.5 0.3 0.73 1.79 0.38 2.44-0.51 3.85-0.9 3.47 -0.38-0.39-2.44-1.54-2.31-3.6 0.13-2.06 2.31-3.34 0.39-3.73 -1.93-0.38-2.18 0.9-2.44-1.03 -0.16-1.17-0.13-1.67 2.7-1.54C116.31 43.6 118.62 43.73 116.95 46.17M119.4 68.14c2.06 1.54 2.44-1.03 3.34 0 0.9 1.03 0.39 2.57-0.77 3.09 -1.16 0.51-2.31-0.39-3.73-0.39s-1.41-0.26-1.28-1.03C117.08 69.05 117.34 66.6 119.4 68.14M121.45 43.47c1.03-1.41 0.39-2.57 2.19-2.18 1.8 0.39 1.28 3.21 1.16 4.24 -0.13 1.03-1.93 0.9-2.57 1.67 -0.64 0.77-1.67 0.77-1.93-0.26C120.04 45.93 120.42 44.88 121.45 43.47M125.56 75.21c-0.64 1.29-1.67 3.22-2.44 3.22 -0.77 0-1.03-1.41-2.19-2.06 -1.16-0.64-1.67 0-1.54-1.67 0.05-0.64 0.77-1.41 2.96-1.16C124.53 73.8 126.2 73.92 125.56 75.21M126.08 68.01c0.77 0.06 4.76 0.26 4.24 2.44 -0.52 2.19-1.67 2.57-2.7 2.57 -1.03 0-1.41-2.31-2.31-2.83C124.41 69.68 124.28 67.88 126.08 68.01M128.52 43.08c0.73-0.18-0.13-4.5 0.77-4.24 0.9 0.26 2.57 2.06 4.24 2.31 1.67 0.26 2.18 1.03 0.77 2.06 -1.41 1.03-1.92 1.16-2.06 2.44 -0.13 1.28-1.67 1.54-1.93 0.51 -0.26-1.03-1.03-1.93-1.8-0.9C127.75 46.3 125.95 43.73 128.52 43.08M133.53 78.29c-0.26 0.9-0.26 2.19-1.93 2.06 -1.67-0.13-5.01 1.16-1.8-2.31C130.56 77.23 133.79 77.39 133.53 78.29M137.26 63.52c1.28-0.64 1.67 3.34 0.51 3.47 -1.16 0.13-4.37 1.41-4.76 2.06 -0.38 0.64-2.06 0.51-2.06-0.13 0-3.08 1.8-1.54 2.7-1.54C134.56 67.37 135.97 64.16 137.26 63.52M137.9 57.09c0.77-0.51 4.76-1.03 4.5 0.26 -0.26 1.28-2.96 3.34-3.85 2.96C137.64 59.92 137.13 57.6 137.9 57.09M144.16 58.6c1-1.77 1.69-0.37 1.69-0.37s0.11 0.76-0.24 1.14C144.82 60.21 143.16 60.37 144.16 58.6M144.58 82.15c0 1.54-1.29 1.54-2.19 0.9 -0.9-0.64-1.8-2.31-3.98-2.06s-6.42 1.03-2.95-2.95c0.94-1.08 2.44-1.93 3.47-1.16 1.03 0.77 1.93 3.73 2.96 2.96C142.91 79.06 144.58 80.61 144.58 82.15M143.69 51.95c1.15 1.03-1.67 4.37-2.83 2.96C140.85 54.91 142.53 50.92 143.69 51.95M153.29 45.72c1.07 0.41 0.56 1.75-0.28 2.36 -0.85 0.6-1.77 0.43-1.77 0.43C150.31 46.92 152.22 45.31 153.29 45.72M153.45 33.45c-0.38-1.41 1.42-2.18 2.06-1.41 0.64 0.77 2.31 3.21 1.16 3.73 -1.16 0.51-3.6 3.08-4.75 1.93C150.81 36.59 153.83 34.86 153.45 33.45M160.13 47.07c0.77-0.64 2.31 0 0.52 0.77 -1.8 0.77 0.9 1.8 1.8 2.44 0.9 0.64 1.54 1.67 0.51 1.67 -1.03 0-2.05 1.16-3.34 1.41 -1.28 0.26-3.21-1.28-3.6-4.24C155.63 46.17 159.54 47.56 160.13 47.07M159.62 28.82c1.67-0.51 2.19 0.77 2.57 1.41 0.39 0.64-3.08 3.09-3.73 1.54C158.11 30.94 157.95 29.33 159.62 28.82M164.11 56.83c-0.51 0.64-3.21 0.52-3.86 1.42 -0.64 0.9-3.47 0.9-3.6 0.26 -0.13-0.64-0.64-1.16-0.26-1.67 0.44-0.58 4.63 0.39 5.4-0.64C162.57 55.16 164.63 56.19 164.11 56.83M162.57 45.27c0.13-0.51 1.67-1.29 1.54 0 -0.13 1.28-0.77 1.41-1.93 1.03C161.03 45.91 162.41 45.94 162.57 45.27M164.72 58.98c0.83-1.17 1.4-0.24 1.4-0.24s0.1 0.5-0.2 0.75C165.26 60.05 163.89 60.15 164.72 58.98M174.52 44.37c0.49-0.91 3.22-0.13 2.83 0.77 -0.38 0.9-0.38 3.34-1.67 1.67C174.39 45.14 173.5 46.3 174.52 44.37M178.4 66.67c0.83-1.17 1.4-0.24 1.4-0.24s0.1 0.51-0.2 0.76C178.95 67.74 177.58 67.84 178.4 66.67M179.79 45.91c0.93-0.6 2.19-2.7 1.67-0.51 -0.52 2.18 2.83 0.51 1.54 2.83 -1.28 2.31-2.31 2.44-2.31 2.06 0-0.38 1.67-2.18-0.38-2.7C178.25 47.07 177.22 47.58 179.79 45.91M184.12 49.25c0.83-1.17 1.4-0.24 1.4-0.24s0.09 0.51-0.2 0.76C184.66 50.32 183.29 50.43 184.12 49.25M185.94 70.3c0 0 0.09 0.51-0.2 0.76 -0.65 0.56-2.02 0.66-1.19-0.51C185.37 69.37 185.94 70.3 185.94 70.3M199.67 63.65c0.82-1.17 1.4-0.24 1.4-0.24s0.1 0.5-0.2 0.76C200.21 64.72 198.84 64.82 199.67 63.65M185.76 113.8c1.39-0.07 4.42-0.37 4.01 1.27s-3 1.31-3 1.31C185.72 115.7 184.37 113.87 185.76 113.8M191.36 105.54c0.54-0.62 2.06-0.9 2.7 0.13 0.64 1.03 1.16 1.16 2.06 1.16 0.9 0 0.9 1.16 0.39 2.19 -0.52 1.03 0.77 1.8-0.9 2.44 -1.67 0.64-1.28 2.31-2.57-0.13 -1.29-2.44 0-3.21-1.15-4.24C190.71 106.05 190.46 106.56 191.36 105.54M198.94 102.97c0.87-2 1.8-1.93 2.18-0.9 0.38 1.03 2.19 4.24 0.64 4.37 -1.54 0.13-0.9 2.7-2.44 1.54s-2.31-1.03-2.57-2.57C196.5 103.87 198.04 105.02 198.94 102.97M216.88 111.9c0.73 0.37 0.38 1.6-0.19 2.14 -0.57 0.55-1.2 0.4-1.2 0.4C214.85 112.99 216.15 111.53 216.88 111.9M90.23 113.5c-2.06-0.51-3.47-1.28-3.73-3.21 -0.26-1.93-2.57-4.5-2.06-5.27 0.51-0.77 1.16-1.03 1.41-1.54 0.57-1.14 1.8-2.44 2.83-0.64 1.03 1.8 2.57 2.7 2.7 4.11C91.51 108.36 92.28 114.02 90.23 113.5M84.06 120.19c-1.41 0.26-3.69-0.8-1.54-1.54 3.34-1.16 0-3.73-1.29-4.11 -1.28-0.38-3.47-0.38-4.24-2.05 -0.77-1.67-3.08 0.13-3.21 0.77 -0.13 0.64-0.9 2.32-2.31 2.06 -1.41-0.26-1.8 0.52-1.28-0.9 0.22-0.6 2.19-0.26 2.31-1.29 0.13-1.03 0.64-2.31 1.67-2.31s2.44-1.8 3.98-1.41c1.54 0.38 3.47 3.47 4.24 4.37 0.77 0.9 4.63 3.21 6.17 4.63 1.54 1.42 2.31 0.52 2.31 1.67S85.47 119.93 84.06 120.19M69.54 94.48c-0.64-1.54-0.51 1.42-1.54 0.9 -1.03-0.51-1.16-0.38-1.03-1.28 0.08-0.53 0.77-1.16 2.44-1.29 1.67-0.13 3.99 2.57 3.47 3.08C72.36 96.41 70.18 96.03 69.54 94.48M66.45 118.52c0.13 1.8-2.83 1.93-3.21 1.41 -0.45-0.6-0.77-2.57 0.51-3.86 1.28-1.28 5.4-1.8 5.14-0.9C68.64 116.07 66.32 116.72 66.45 118.52M62.6 89.6c0.13-0.64-1.16-2.31-0.39-2.95 0.7-0.58 3.86 1.29 2.7 2.19C63.75 89.73 62.47 90.24 62.6 89.6M61.7 93.59c-0.9-0.26-1.54-1.16-1.15-1.93 0.37-0.74 1.41-0.9 1.93 0C62.98 92.56 62.6 93.84 61.7 93.59M61.57 117.23c-1.8 2.31-3.34 1.93-2.06-0.38C60.14 115.72 63.37 114.92 61.57 117.23M61.31 122.24c-1.8 2.31-3.34 1.93-2.06-0.38C59.88 120.73 63.11 119.93 61.31 122.24M57.97 97.83c-0.51-0.9-0.26-1.8-0.26-1.8 1.67-0.77 3.08 1.29 2.57 2.31C59.77 99.37 58.48 98.73 57.97 97.83M59.51 56.7c-0.77-1.8-2.05-3.34-0.77-4.5 0.61-0.55 3.09 0 3.34 0.64 0.26 0.64 1.93 3.85 1.29 4.62C62.73 58.25 60.28 58.5 59.51 56.7M56.17 37.43c0.37-0.73 3.34 1.8 2.44 2.96C57.71 41.54 55.53 38.71 56.17 37.43M69.92 90.24c-0.64 0.26-3.98 0.77-4.24-0.64 0.02 0.11 3.47-3.22 4.24-3.08C71.33 86.77 70.56 89.99 69.92 90.24M69.92 73.8c0 0.77 0.39 2.18-1.54 1.93 -1.93-0.26-3.47-0.77-3.34-1.93 0.13-1.16 1.42-1.54 2.57-1.54 1.15 0 2.57-2.06 3.21-1.16C71.46 72 69.92 73.02 69.92 73.8M74.03 50.54c0.51 1.54 1.29 1.8 0.13 3.08 -1.16 1.28 1.54 3.21-0.64 3.73 -2.18 0.51-2.7-2.19-4.63-2.31 -1.93-0.13-4.88-0.77-4.88-2.18 0-1.41-2.44-2.19-1.67-4.11 0.34-0.84 3.6 0.26 4.11-0.51 0.51-0.77 1.67-0.64 1.93 1.03 0.26 1.67 1.42 1.8 2.44 0.9C71.85 49.25 73.52 49 74.03 50.54M77.38 71.1c1.15-0.13 1.54-2.18 2.96-1.93 1.41 0.26 1.8-3.73 3.47-2.06 1.67 1.67-2.57 2.44-2.7 5.14 -0.13 2.7-3.34 2.06-3.86 1.03 -0.51-1.03-1.28-1.67-2.18-0.38 -0.9 1.29-3.21 1.67-2.57-0.13 0.64-1.8 0.64-2.31 0.64-2.31 0.26-0.77-1.03-2.18 0.39-2.44C74.93 67.76 76.22 71.23 77.38 71.1M76.47 56.83c0.83-1.25 3.34-0.64 4.88-0.51 1.54 0.13 1.67 1.93 0.77 2.7 -0.9 0.77-0.26 4.11-2.31 3.09C77.76 61.07 74.42 59.92 76.47 56.83M73.91 87.03c0.4-0.5 2.57 0.39 3.08 0.26 0.52-0.13 0.26 2.44-0.64 2.96 -0.9 0.51-2.7 0.9-2.7 0.13C73.65 89.6 73.39 87.68 73.91 87.03M74.55 109.01c0 1.16-2.31 0.9-2.7 0.13C71.85 109.14 74.55 107.85 74.55 109.01M74.29 104.64c0-2.19-2.95 1.42-1.93-2.31 0.25-0.89 1.8-0.26 2.7-1.93 0.9-1.67 1.8-1.41 3.08-0.51 1.29 0.9 3.21 2.18 2.7 3.21 -0.51 1.03 1.67 4.5 0.9 5.27 -0.77 0.77-4.11 0-4.63-1.15C76.6 106.05 74.29 106.82 74.29 104.64M84.56 79.02c0 0-0.94 3.55-2.45 2.71C80.6 80.9 83.17 78.84 84.56 79.02M85.85 77.01c0.77-0.51 2.44-1.8 2.57-0.9 0.13 0.9 0 1.8-0.64 2.83 -0.64 1.03-2.18 1.28-2.7 0.39C84.57 78.42 85.85 77.01 85.85 77.01M87.78 66.73c1.03-0.38 3.08-0.38 2.44 0.64 -0.64 1.03-1.93 3.34-2.96 2.18C86.24 68.4 87.78 66.73 87.78 66.73M54.24 93.33c-0.77 0.39-0.77-1.54-0.77-1.54C53.99 91.66 55.01 92.94 54.24 93.33M45.38 80.74c-1.41 0.9-6.42 2.18-6.55-1.16 -0.04-1.1 2.31-1.54 4.5-1.15C45.51 78.81 46.79 79.83 45.38 80.74M38.82 90.24c-0.64 1.67-1.67 2.44-2.7 1.54 -1.03-0.9-1.67-0.64-2.7-1.15 -1.03-0.51 1.41-1.54 1.16-2.19 -0.26-0.64 0.39-1.03 0.39-1.03 1.28-0.38 2.44 0.77 3.47 0.39C39.47 87.42 39.47 88.57 38.82 90.24M237.11 73.67c-0.38-2.19-2.7-3.85-5.27-0.77 -2.57 3.08-1.6 0.03-4.11 1.28 -2.83 1.41-3.34 0.51-5.52-1.16 -1.18-0.9-1.41-5.91-3.31-3.25 -2.67 3.75-1.93-1.8-3.12-2.28 -2.57-1.03-4.37 0.77-5.4 1.93 -1.03 1.16-4.63 0.64-6.17-2.06 -1.54-2.7 1.16-3.47 1.93-2.18 0.77 1.29 3.6-0.13 2.18-2.06 -1.41-1.93 5.14-2.7 7.58-3.6 2.44-0.9 0-2.31-2.06-2.18 -2.06 0.13-3.21 0.39-4.11-2.06 -0.9-2.44-1.93-1.8-2.44-1.28 -0.51 0.51-1.28 2.44-4.11 0.26 -2.83-2.18 1.03-3.34 2.31-2.18 1.28 1.16 1.93-3.21 4.11-3.08 2.18 0.13 5.27 1.28 7.45 1.16 2.19-0.13 3.47 1.41 0.9 1.8 -2.57 0.38-1.93 2.7-0.77 3.34 1.16 0.64 3.08-2.7 4.88-1.41 1.8 1.29 3.73-0.51 6.81 1.03 3.08 1.54 3.08 0.39 4.5-0.26 1.41-0.64 3.34-1.28 3.21-2.95 -0.13-1.67-3.34 0-4.88-2.96 -0.98-1.87-3.21-1.03-5.52-0.64 -2.31 0.39-3.47 2.7-4.37 0.9 -0.9-1.8 5.78-4.11 6.17-5.78 0.39-1.67-1.29 0.51-1.93-1.67 -0.64-2.18-2.06-1.54-4.11-1.41 -2.06 0.13-3.08-1.8-4.62-1.93 -1.54-0.13-2.7 2.7-5.4 2.57 -2.7-0.13-1.8-2.44-3.47-4.11 -1.67-1.67 0.39-4.11 1.93-0.9 1.54 3.21 2.06 1.67 3.47 0.77 1.42-0.9 2.83-2.31 5.27-0.13 2.44 2.18 2.05 0.39 3.6-0.39 1.54-0.77 1.93-2.44 0.9-2.44 -1.03 0-6.04-0.77-3.34-2.06 1.98-0.94 1.54-1.47 0.19-2.61 -0.93-0.78-1.95-0.43-1.73-1.51 0.1-0.48-1.51-2.24-2.68-2.02 -1.17 0.22-3.95 1.04-3.61-2.35 0.26-2.57-0.95-0.35-2.25-0.51 -1.3-0.16-2.44 2.63-3.15 0.13 -0.84-2.99-4.21 0.85-4.38 0.69 -0.27-0.26-0.63 2.18-2.2 1.97 -1.58-0.22-4.05 2.86-3.65 0.84 0.4-2.02-0.88 0.05-1.33 0.1 -2.31 0.26-5.27 1.8-0.9 4.75 4.37 2.96 0.13 2.7-2.44 3.34 -2.57 0.64-1.29 2.7-0.26 3.86 1.03 1.16-0.77 4.11-2.06 1.29 -1.28-2.83-2.06-1.16-3.73 0.13 -1.67 1.28-1.03-1.67-0.26-1.67 0.77 0 1.03 0.13 2.19-3.34 1.16-3.47-5.65-7.58-5.91-9.9 -0.26-2.31-1.67-4.24-3.08-3.08s-2.44 0.64-3.98-1.16c-1.54-1.8-2.06 1.03-2.96 0.77 -0.9-0.26-2.83-0.26-4.88 1.29 -5.38 4.04 1.41 3.21 2.44 4.37 2.32 2.61-0.64 3.6-2.06 1.93 -1.41-1.67-1.8-0.38-2.7-0.26 -0.9 0.13-2.19-0.64-3.08-1.54 -0.9-0.9-2.44-2.31-3.73-0.51 -1.28 1.8-2.69 0.9-5.14-1.54 -2.44-2.44-2.82-0.64-3.21 0.9 -0.38 1.54-3.6 1.28-4.63 1.54 -1.03 0.26-3.47 3.98-5.78-0.77 -2.31-4.75 2.06-4.88 4.88-4.24 2.83 0.64 0.64-3.73 4.63-3.47 3.98 0.26 1.29 1.03 5.01 2.31 3.73 1.29 1.93-2.44 4.76-2.18 2.83 0.26 1.28-2.06 5.01-4.24 2.21-1.29-3.21-3.21-6.04-2.57 -2.83 0.64-3.08-0.64-4.76-1.54 -1.67-0.9-3.73-1.16-5.14 0.26 -3.6 3.6-3.47 0.13-3.47-1.54 0-1.67-5.52-4.75-8.22-5.14 -2.7-0.39-7.45 4.75-8.87 3.08 -1.41-1.67-3.08-0.38-6.55 0 -3.47 0.39-1.8 1.67-0.13 3.09 1.67 1.41-1.03 1.54-2.44 1.28 -1.41-0.26-2.69 1.67 1.03 2.57 3.73 0.9 0.64 2.06-0.77 2.06 -1.41 0-3.47 1.29-5.52 3.86 -2.06 2.57-3.47 1.93-5.78 1.41 -2.31-0.51 0-5.14 1.29-4.88 1.28 0.26 5.01-2.06 4.11-4.5 -0.9-2.44-0.9-1.8 1.93-3.85 2.83-2.06 0-3.73-1.28-4.24 -1.29-0.51-3.6 2.31-4.88 0.77 -1.28-1.54-2.57-1.54-4.11-1.54s-1.37 2.62-3.34 0.77c-0.51-0.48-1.12-0.85-1.8-1.13 -0.68-0.28-1.88-1.33-2.21-0.6 -0.74 1.61-2.79-3.92-3.05 0.06 -0.07 1.1-1.41 0.39-1.93-0.26 -0.73-0.91-2.06 0.77-2.9 0.55 -1.5-0.4-2.39 1.12-3.14 0.87 -1.16-0.39-4.33-3.42-5.78-0.39 -1.41 2.96 2.31 1.03 1.93 2.96 -0.39 1.93 1.8 3.21 0.64 4.5 -1.16 1.29-5.52 2.06-8.35-0.13 -2.83-2.18-4.24 1.93-4.76 4.11 -0.51 2.19 4.11 1.67 4.76 2.96 0.64 1.28 5.4-0.9 8.61 0.51 3.21 1.42-2.7 1.29-2.96 2.44 -0.25 1.16 2.7-0.26 3.47 1.54 0.77 1.8 2.06 0 4.11 1.67 2.06 1.67 3.73 0.39 5.53-0.51 1.8-0.9 4.11 1.28 3.86 2.57 -0.26 1.28-1.67 0.9-2.83 2.18 -1.15 1.29-2.83-2.18-4.63 0.64 -1.8 2.83 3.47 0.13 4.24 1.8 0.77 1.67 2.44 1.41 2.83 2.05 0.39 0.64-2.7 2.7-4.5 3.6 -1.8 0.9-3.21 1.93-6.3 1.41 -3.08-0.51 1.54-4.5-2.31-4.88 -1.16-0.12-3.98-1.03-3.73-2.7 0.26-1.67-5.27-7.32-6.81-8.61 -1.54-1.29 0.39 5.01-1.8 4.88 -2.18-0.13-5.01-4.5-8.87-7.2 -1.82-1.27-3.73-0.39-5.38-0.97 -0.89-0.31-2.4 1.74-2.64 0.78 -0.97-3.93-2.12 1.08-2.77 0.57 -0.99-0.79-1.49 1.53-2.7 0.64 -0.98-0.72-1.09 1.63-1.28 3.6 -0.38 3.86-2.06 1.54-6.04 2.18 -3.98 0.64-3.98 5.01-3.73 6.55 0.26 1.54-0.64 2.83-2.95 1.93 -2.31-0.9 0.13-2.83-1.93-3.6 -2.06-0.77-6.94 5.4-6.94 6.81 0 1.41 3.86-0.77 6.04 2.44 1.29 1.89 5.27-0.39 6.68 1.03 1.41 1.41 5.53-1.67 6.68-3.08 1.16-1.41 3.73-1.67 5.53-1.93 1.8-0.26 2.06 2.96 2.06 3.99 0 1.03 3.34 0.26 2.19 3.34 -0.49 1.29-1.93 1.03-7.32 1.41 -5.4 0.39 1.16 2.06 0.9 3.34 -0.26 1.29-5.01 0.77-6.3 2.31 -1.28 1.54 4.24 4.88 6.17 5.65 1.93 0.77 6.94-3.6 8.1-2.31 1.16 1.29 1.8 3.34 3.85 5.01 2.06 1.67 2.96 2.06 0 5.01C57.2 66.73 52.44 63 52.44 63c-3.08-0.64-4.75-2.31-6.55 0.39 -1.11 1.67-0.51 4.11-2.06 5.27 -1.54 1.16-2.81-2.19-5.14-1.93 -4.34 0.48-4.14-3.56-6.17-4.24 -1.28-0.43-5.56 3.86-5.4-1.07 0.2-5.96-3.16 0.05-4.24-0.85 -2.41-2.02-4.14 2.7-5.29-0.58 -0.45-1.27-2.58 0.56-3.45 1.1 -2.06 1.28 0 5.14-2.18 5.27 -2.18 0.13-1.54 1.28-3.08 2.7 -1.54 1.41 0 3.08-0.9 3.73 -0.9 0.64-0.73 2.64-0.26 2.96 1.16 0.77 1.41-3.85 2.83-0.77 1.42 3.08-3.47 3.86-4.24 2.7 -0.77-1.16-1.8-4.5-2.57-1.16 -0.61 2.66-3.98 3.6-3.73 4.88 0.5 2.5 3.73 0.39 5.91-0.39 2.19-0.77 2.06 3.21 2.06 5.78 0 2.57 2.96 1.8 3.73 2.44 0.77 0.64 1.93 1.54 3.34 1.67 1.41 0.13 2.83-2.44 0.13-2.83 -2.7-0.38 0-2.31-3.08-2.06 -3.08 0.26-1.28-2.7-0.51-1.8 0.77 0.9 3.6 0.26 5.91 0.64 2.31 0.39 2.83 3.73 4.88 3.6 1.03-0.06 2.31-0.26 2.44 1.16 0.13 1.42-1.16 3.6-0.38 3.86 0.5 0.17 0.77-2.31 2.7-2.96 1.93-0.64 1.42 2.83 1.8 4.76 0.38 1.93-1.93 0.26-2.19 2.96 -0.26 2.7 1.42 1.67 2.83 0.64 3.86-2.8 2.7 1.8 4.75 2.06 3.88 0.48 2.95-2.44 5.27-2.96 2.31-0.51 3.6-1.28 4.75-2.31 1.16-1.03 3.47-1.28 5.65 0.77 2.18 2.06 2.96 2.44 4.63 1.67 2.23-1.03 1.8 1.8 0.9 2.83 -0.9 1.03-6.17 0.77-9 0.39 -2.82-0.39-4.88 2.19-3.47 2.44 1.41 0.26 3.47 1.54 1.8 2.31 -1.67 0.77-1.28 2.31-2.95 2.18 -1.67-0.13-3.47-3.85-5.4 0.52 -1.93 4.37 3.34 7.2 7.45 5.65 4.11-1.54 5.4-0.13 5.91 1.41 0.51 1.54 5.4 2.76 5.4 2.76 2.31 5.01-2.12 0.96-3.47 0.58 -1.35-0.38-2.89 2.7-5.78 2.31 -2.89-0.39-3.85 0.97-3.08 1.54 0.77 0.58 2.32 2.12 0 3.08 -2.31 0.96-1.16 3.66-2.31 4.82 -1.16 1.16-0.58 3.09 1.54 3.09 2.12 0 7.33-0.38 8.1 0.96 0.77 1.35 6.17 0 6.17 0 5.21 0-0.38 3.08 0.19 4.63 0.58 1.54 10.99-0.39 13.11 0.96 2.12 1.35-0.38 4.43 0.97 5.2 1.35 0.77 4.24-2.7 2.7-5.4 -1.54-2.7 0.96-1.54 0.39-4.05 -0.58-2.5 5.2-4.05 7.9-3.66 2.7 0.39 4.63-0.58 4.24 2.31s2.89 0.58 4.43 1.16c1.54 0.58 1.54-2.12-0.19-3.28 -1.73-1.15 1.54-2.89 2.51-3.47 0.96-0.58-2.31-1.73 3.28-3.86 5.59-2.12 9.83 0.58 13.88 3.47 4.05 2.89 2.31 10.8 1.16 15.61 -1.16 4.82-3.48 8-4.82 10.41 -2.01 3.6-4.74 5.23-9.55 5.97 -38.51 3.36-53.1 14.08-53.1 14.08s29.1-12.53 79.99-12.53c37.64 0 75.34 12.53 75.34 12.53s-19.07-9.84-53.88-14.15c-1.83-1.28-2.08-1.8-2.31-2.86 -0.26-1.16-2.83-2.65-4.76-5.22 -1.92-2.57-1.41-6.55 0.13-10.02 1.54-3.47 2.7-8.87 6.04-10.28 3.34-1.41 2.44-3.21 3.34-3.98 0.9-0.77 2.96-2.95 4.11-0.39 1.16 2.57-1.67 0.13-3.85 1.93 -2.19 1.8 1.8 1.42 2.44 3.21 0.64 1.8 3.08 1.8 4.24 1.54 1.16-0.26 2.06 0.39 1.29 1.54 -0.77 1.16-1.41 1.8-1.03 3.21 0.39 1.41 2.7 1.03 3.98-0.26s0.77-1.54 2.06-0.39c1.29 1.16 1.03-1.29 2.83-1.8 1.8-0.52 1.03-1.16 1.67-2.19 0.65-1.03 2.44-0.9 3.47-0.13 1.03 0.77 0.26 3.09 0.9 1.42 0.64-1.67 2.19-0.26 2.19-0.26 1.67 2.06 2.06-1.03 4.24-0.64 3.82 0.67 3.47-0.38 5.4-1.15 1.93-0.77 2.06-1.29 3.21 0.77 1.16 2.06 1.03 1.29 4.63 1.42 3.6 0.13 6.3-4.11 7.45-5.65 1.16-1.54 2.44-1.41 1.42-4.76 -1.03-3.34-3.47 0.9-4.5-2.44 -1.03-3.34-3.85-0.9-4.75-3.47 -0.9-2.57 3.09-1.03 4.24-1.67 1.16-0.64 2.31 2.7 3.99 2.57 1.67-0.13 3.85 1.54 5.01 0.26s-1.28-1.93-2.44-3.6c-1.16-1.67 1.67-1.67 2.83-0.64 1.16 1.03 1.67 0.52 3.98 0.64 2.32 0.13 3.08 2.96 3.98 1.93 0.9-1.03-1.8-1.67 0.9-3.47 2.7-1.8 2.57-0.25 4.89-0.13 2.31 0.13 2.57-3.47 3.47-5.27 0.9-1.8 0.51-2.57-1.16-3.34 -1.67-0.77-2.18 0.77-2.96-1.67 -0.77-2.44-2.18-2.83-3.85-2.18 -1.67 0.64-5.4-0.39-5.27-2.19 0.13-1.8-3.21-2.44-5.27-2.7 -2.06-0.26-4.11-0.39-4.5-2.19 -0.38-1.8-1.28-2.18-3.34-2.18 -2.06 0-2.7 0.64-4.24-1.41 -1.54-2.06-3.73-1.16-5.4 0.26 -1.67 1.41-0.77 2.96-2.7 3.47 -1.93 0.52-2.44-2.57-0.64-3.98 1.8-1.41 2.7-0.9 1.67-2.57 -1.03-1.67 0-1.16 0.9-2.83 0.9-1.67 2.7-0.51 2.83 1.41 0.13 1.93 3.21 1.03 4.63 0.9 1.41-0.13 3.34-0.9 3.6 0.77 0.26 1.67 1.93 1.16 4.63 0.13 2.7-1.03 5.53 2.19 6.55 2.44 1.03 0.26 0.64-1.67 2.18-3.21 1.2-1.19-1.15-0.64-1.8-2.57 -0.64-1.93 1.28-2.18 3.86-0.39 2.57 1.8 1.41 3.34 2.83 3.99 1.41 0.64 3.21 2.7 5.91 0 2.7-2.7 2.7-0.51 5.4-2.19 2.7-1.67 5.4 0 6.55-1.67 1.16-1.67 1.29-1.41 4.88 0 3.6 1.41 2.31-1.03 2.19-5.91 -0.13-4.88 2.06-2.7 2.06-4.5S237.49 75.85 237.11 73.67"/>
                        </g>
                                                
                        <clipPath id="clip-path">
                                                    
                            <path class="circle-mask" fill="#E73E0D" d="M232.009,72.205c-2.574,3.095-1.604,0.029-4.117,1.29
                                                                    c-2.828,1.419-3.344,0.516-5.529-1.162c-1.18-0.904-1.416-5.936-3.312-3.263c-2.672,3.768-1.934-1.811-3.119-2.286
                                                                    c-2.57-1.031-4.371,0.774-5.402,1.937c-1.027,1.162-4.629,0.645-6.172-2.066c-1.543-2.71,1.158-3.485,1.932-2.193
                                                                    c0.77,1.292,3.6-0.129,2.186-2.066c-1.416-1.935,5.143-2.707,7.585-3.613c2.444-0.903,0-2.323-2.058-2.193
                                                                    c-2.057,0.127-3.215,0.388-4.113-2.066c-0.9-2.45-1.93-1.805-2.445-1.288c-0.516,0.514-1.285,2.45-4.113,0.257
                                                                    c-2.828-2.193,1.027-3.356,2.314-2.193c1.283,1.161,1.928-3.229,4.115-3.097c2.186,0.127,5.272,1.288,7.457,1.16
                                                                    c2.187-0.129,3.475,1.419,0.9,1.807c-2.57,0.387-1.928,2.709-0.771,3.354c1.158,0.645,3.086-2.71,4.887-1.419
                                                                    c1.804,1.29,3.73-0.516,6.817,1.033c3.086,1.548,3.086,0.386,4.502-0.258c1.412-0.644,3.344-1.29,3.213-2.968
                                                                    c-0.128-1.678-3.345,0-4.888-2.97c-0.976-1.876-3.214-1.031-5.528-0.645c-2.312,0.388-3.472,2.711-4.372,0.905
                                                                    c-0.901-1.809,5.783-4.13,6.172-5.808c0.386-1.679-1.287,0.516-1.928-1.679c-0.643-2.193-2.059-1.547-4.117-1.419
                                                                    c-2.057,0.129-3.086-1.805-4.629-1.936c-1.543-0.128-2.699,2.71-5.4,2.581c-2.701-0.127-1.801-2.45-3.473-4.13
                                                                    c-1.674-1.676,0.387-4.13,1.928-0.902c1.545,3.225,2.059,1.676,3.473,0.774c1.416-0.903,2.83-2.323,5.274-0.129
                                                                    c2.442,2.193,2.055,0.388,3.601-0.389c1.543-0.774,1.929-2.45,0.899-2.45c-1.027,0-6.043-0.774-3.345-2.066
                                                                    c1.985-0.949,1.54-1.479,0.191-2.618c-0.926-0.782-1.95-0.432-1.734-1.512c0.101-0.483-1.508-2.25-2.684-2.028
                                                                    c-1.173,0.223-3.954,1.048-3.617-2.361c0.258-2.581-0.951-0.35-2.251-0.514c-1.3-0.166-2.441,2.646-3.149,0.128
                                                                    c-0.844-3.004-4.214,0.854-4.381,0.69c-0.273-0.26-0.627,2.193-2.205,1.979c-1.582-0.217-4.051,2.871-3.65,0.843
                                                                    c0.398-2.029-0.883,0.051-1.337,0.102c-2.316,0.257-5.275,1.805-0.901,4.773c4.373,2.97,0.129,2.711-2.442,3.356
                                                                    c-2.573,0.646-1.288,2.711-0.258,3.872c1.028,1.162-0.771,4.13-2.058,1.292c-1.285-2.84-2.059-1.161-3.729,0.129
                                                                    c-1.674,1.29-1.028-1.678-0.258-1.678c0.771,0,1.029,0.129,2.187-3.354c1.156-3.485-5.66-7.615-5.916-9.938
                                                                    c-0.258-2.324-1.67-4.261-3.086-3.099c-1.417,1.162-2.444,0.645-3.987-1.163c-1.543-1.805-2.059,1.033-2.959,0.776
                                                                    c-0.899-0.258-2.828-0.258-4.887,1.292c-5.384,4.052,1.416,3.225,2.445,4.387c2.324,2.624-0.644,3.615-2.059,1.935
                                                                    c-1.414-1.678-1.801-0.386-2.699-0.257c-0.9,0.128-2.188-0.647-3.086-1.548c-0.9-0.905-2.445-2.323-3.732-0.518
                                                                    c-1.283,1.805-2.697,0.903-5.144-1.548c-2.44-2.45-2.826-0.645-3.214,0.904c-0.386,1.548-3.601,1.29-4.63,1.548
                                                                    c-1.027,0.259-3.471,4-5.788-0.774c-2.313-4.775,2.06-4.904,4.887-4.259c2.83,0.645,0.643-3.742,4.63-3.485
                                                                    c3.987,0.261,1.289,1.035,5.015,2.324c3.732,1.292,1.932-2.452,4.76-2.193c2.828,0.257,1.285-2.066,5.016-4.26
                                                                    c2.209-1.301-3.215-3.226-6.043-2.581c-2.832,0.645-3.086-0.645-4.76-1.549c-1.671-0.903-3.729-1.162-5.144,0.257
                                                                    c-3.604,3.618-3.474,0.13-3.474-1.549c0-1.676-5.529-4.773-8.228-5.161c-2.702-0.388-7.46,4.775-8.876,3.097
                                                                    c-1.414-1.677-3.086-0.386-6.557,0c-3.475,0.389-1.8,1.678-0.129,3.099c1.672,1.417-1.029,1.549-2.445,1.288
                                                                    c-1.413-0.257-2.698,1.68,1.031,2.582c3.729,0.903,0.643,2.066-0.773,2.066c-1.416,0-3.471,1.292-5.529,3.872
                                                                    c-2.06,2.581-3.472,1.937-5.788,1.419c-2.312-0.516,0-5.162,1.288-4.903c1.285,0.257,5.016-2.067,4.115-4.518
                                                                    c-0.9-2.452-0.9-1.805,1.929-3.871c2.828-2.064,0-3.742-1.285-4.259c-1.288-0.516-3.602,2.322-4.887,0.774
                                                                    s-2.57-1.548-4.114-1.548c-1.543,0-1.375,2.629-3.346,0.774c-0.514-0.485-1.124-0.854-1.803-1.137
                                                                    c-0.679-0.282-1.881-1.332-2.215-0.605c-0.74,1.614-2.797-3.937-3.055,0.063c-0.071,1.101-1.414,0.388-1.928-0.258
                                                                    c-0.732-0.913-2.057,0.774-2.903,0.548c-1.501-0.403-2.389,1.124-3.142,0.873c-1.158-0.388-4.335-3.436-5.788-0.388
                                                                    c-1.414,2.969,2.314,1.033,1.93,2.969c-0.387,1.935,1.801,3.225,0.643,4.516c-1.159,1.292-5.53,2.066-8.358-0.129
                                                                    c-2.83-2.193-4.245,1.935-4.76,4.128c-0.516,2.195,4.116,1.68,4.76,2.971c0.643,1.288,5.399-0.904,8.616,0.514
                                                                    c3.213,1.421-2.701,1.292-2.959,2.454c-0.254,1.161,2.701-0.26,3.471,1.548c0.774,1.805,2.061,0,4.117,1.676
                                                                    c2.057,1.68,3.729,0.388,5.53-0.514c1.8-0.905,4.116,1.288,3.86,2.58c-0.257,1.29-1.674,0.902-2.831,2.193
                                                                    c-1.156,1.292-2.83-2.193-4.63,0.645c-1.799,2.84,3.474,0.129,4.244,1.809c0.771,1.676,2.443,1.417,2.83,2.062
                                                                    c0.387,0.646-2.701,2.71-4.5,3.616c-1.801,0.902-3.217,1.935-6.303,1.419c-3.085-0.517,1.543-4.518-2.316-4.904
                                                                    c-1.158-0.118-3.984-1.033-3.728-2.711c0.257-1.68-5.272-7.356-6.815-8.646c-1.543-1.292,0.386,5.034-1.801,4.904
                                                                    c-2.186-0.131-5.014-4.518-8.874-7.227c-1.82-1.281-3.729-0.389-5.388-0.971c-0.893-0.315-2.405,1.75-2.643,0.787
                                                                    c-0.971-3.946-2.127,1.088-2.77,0.571c-0.991-0.794-1.496,1.534-2.702,0.645c-0.984-0.723-1.089,1.632-1.285,3.615
                                                                    c-0.384,3.872-2.056,1.548-6.044,2.193c-3.987,0.645-3.987,5.034-3.729,6.582s-0.643,2.838-2.958,1.935
                                                                    c-2.316-0.902,0.13-2.838-1.93-3.612c-2.058-0.774-6.945,5.421-6.945,6.841c0,1.417,3.859-0.774,6.045,2.452
                                                                    c1.287,1.898,5.272-0.388,6.688,1.031c1.414,1.419,5.529-1.678,6.688-3.098c1.156-1.419,3.729-1.678,5.529-1.937
                                                                    c1.802-0.257,2.057,2.968,2.057,4.002c0,1.031,3.346,0.257,2.188,3.356c-0.488,1.299-1.932,1.031-7.331,1.419
                                                                    c-5.402,0.387,1.159,2.064,0.901,3.354c-0.258,1.292-5.018,0.774-6.303,2.323c-1.286,1.55,4.244,4.904,6.174,5.678
                                                                    c1.926,0.774,6.944-3.613,8.102-2.323c1.158,1.292,1.801,3.355,3.857,5.034c2.057,1.68,2.958,2.064,0,5.033
                                                                    c-2.958,2.968-7.717-0.774-7.717-0.774c-3.085-0.647-4.758-2.323-6.557,0.388c-1.114,1.676-0.515,4.128-2.058,5.291
                                                                    c-1.543,1.162-2.812-2.196-5.143-1.937c-4.34,0.485-4.147-3.579-6.174-4.259c-1.281-0.428-5.569,3.878-5.406-1.079
                                                                    c0.198-5.986-3.159,0.055-4.241-0.856c-2.411-2.033-4.146,2.711-5.29-0.584c-0.447-1.279-2.585,0.558-3.453,1.1
                                                                    c-2.058,1.29,0,5.163-2.186,5.292c-2.185,0.13-1.543,1.289-3.086,2.711c-1.543,1.418,0,3.097-0.903,3.742
                                                                    c-0.898,0.645-0.735,2.647-0.256,2.968c1.159,0.774,1.415-3.872,2.829-0.774c1.416,3.097-3.471,3.872-4.244,2.711
                                                                    c-0.77-1.163-1.797-4.518-2.571-1.163c-0.614,2.667-3.986,3.615-3.731,4.904c0.503,2.511,3.731,0.387,5.917-0.388
                                                                    c2.187-0.774,2.057,3.229,2.057,5.808c0,2.582,2.961,1.807,3.73,2.452c0.771,0.646,1.928,1.548,3.344,1.679
                                                                    c1.412,0.129,2.828-2.453,0.127-2.841c-2.699-0.384,0-2.321-3.086-2.064c-3.086,0.258-1.285-2.709-0.512-1.806
                                                                    c0.77,0.902,3.598,0.257,5.914,0.645c2.315,0.386,2.829,3.742,4.887,3.613c1.035-0.064,2.315-0.26,2.444,1.16
                                                                    c0.127,1.422-1.159,3.614-0.385,3.873c0.501,0.168,0.77-2.324,2.698-2.969c1.932-0.644,1.416,2.84,1.803,4.775
                                                                    c0.383,1.936-1.93,0.26-2.188,2.969c-0.256,2.711,1.416,1.678,2.83,0.645c3.861-2.816,2.701,1.808,4.758,2.066
                                                                    c3.881,0.486,2.955-2.453,5.272-2.97c2.316-0.516,3.601-1.29,4.758-2.323c1.158-1.033,3.473-1.289,5.658,0.775
                                                                    c2.186,2.064,2.958,2.451,4.632,1.678c2.23-1.033,1.798,1.807,0.898,2.84c-0.898,1.033-6.171,0.772-9.002,0.387
                                                                    c-2.826-0.387-4.885,2.194-3.469,2.451c1.412,0.26,3.469,1.549,1.797,2.324c-1.67,0.773-1.285,2.321-2.956,2.192
                                                                    c-1.672-0.13-3.475-3.872-5.402,0.517c-1.927,4.388,3.344,7.228,7.459,5.68c4.116-1.549,5.401-0.131,5.917,1.418
                                                                    c0.514,1.549,5.4,2.775,5.4,2.775c2.315,5.033-2.122,0.967-3.473,0.579c-1.351-0.387-2.894,2.713-5.787,2.325
                                                                    c-2.894-0.389-3.858,0.969-3.086,1.549c0.773,0.58,2.317,2.127,0,3.097c-2.314,0.967-1.156,3.678-2.314,4.839
                                                                    c-1.156,1.162-0.579,3.099,1.542,3.099c2.122,0,1.351,41.234,1.351,41.234h155.449c0,0-3.379-42.976-2.225-44.524
                                                                    c1.158-1.549,2.445-1.422,1.416-4.777c-1.028-3.355-3.473,0.904-4.502-2.451c-1.028-3.354-3.859-0.904-4.759-3.483
                                                                    c-0.899-2.582,3.088-1.03,4.244-1.679c1.157-0.645,2.316,2.709,3.988,2.582c1.67-0.129,3.856,1.547,5.015,0.258
                                                                    c1.157-1.291-1.286-1.936-2.443-3.615c-1.159-1.676,1.672-1.676,2.829-0.645c1.157,1.033,1.673,0.518,3.985,0.645
                                                                    c2.316,0.131,3.086,2.969,3.986,1.936c0.9-1.03-1.799-1.675,0.9-3.484c2.701-1.806,2.572-0.256,4.889-0.127
                                                                    c2.314,0.127,2.57-3.484,3.473-5.291c0.9-1.809,0.512-2.584-1.158-3.355c-1.674-0.774-2.186,0.771-2.959-1.678
                                                                    c-0.77-2.455-2.186-2.84-3.856-2.193c-1.673,0.645-5.401-0.389-5.274-2.195c0.13-1.808-3.214-2.453-5.271-2.709
                                                                    c-2.058-0.259-4.115-0.389-4.502-2.195c-0.387-1.808-1.285-2.193-3.342-2.193c-2.059,0-2.7,0.645-4.244-1.42
                                                                    c-1.543-2.065-3.732-1.162-5.402,0.258c-1.672,1.419-0.771,2.968-2.701,3.484c-1.928,0.518-2.443-2.582-0.642-4
                                                                    c1.8-1.421,2.7-0.903,1.671-2.582c-1.029-1.678,0-1.162,0.9-2.838c0.898-1.677,2.699-0.517,2.83,1.419
                                                                    c0.128,1.935,3.215,1.031,4.63,0.903c1.412-0.129,3.344-0.903,3.602,0.774c0.256,1.678,1.928,1.162,4.63,0.128
                                                                    c2.699-1.031,5.529,2.195,6.557,2.453c1.031,0.258,0.643-1.679,2.186-3.228c1.199-1.199-1.155-0.646-1.799-2.58
                                                                    c-0.645-1.937,1.283-2.194,3.857-0.388c2.572,1.807,1.414,3.355,2.828,4.002c1.416,0.645,3.217,2.709,5.914,0
                                                                    c2.701-2.71,2.701-0.518,5.402-2.195c2.701-1.678,5.402,0,6.559-1.678c1.158-1.678,1.288-1.419,4.888,0s2.314-1.031,2.188-5.937
                                                                    c-0.129-4.904,2.058-2.709,2.058-4.516s-1.672-0.515-2.057-2.708C236.896,70.784,234.58,69.108,232.009,72.205z"/>
                                                    
                        </clipPath>
                    
                    </svg>
                    <h3 class="text-center" style="color: #b8c8d8ed; font-weight: 600;"> Please Wait! Images Are Loading! <div class="spinner-border spbb" role="status" style="color: #b8c8d8ed;"><span class="sr-only">Loading...</span></div></h3>
                </div>
            </div>
        </div>
    </div>
    <!----------------------Footer Section---------------------------------------------------->
    <?php
        include('../pages/include/footer.php')
    ?>

    <!----------------------report popup start--------------------------------------->


    <div class="modal fade" id="reportimg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportimgLabel">Report Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/">
                        <div class="form-row">
                            <div class="form-group col-12" style="padding: 5px; text-align: center">
                                <img src="../upload/images/96fbc5671e.jpg" alt="" style="height:250px; object-fit:contain;">
                            </div>
                            <div class="form-group col-12">
                                <label for="Imagename" style="color:seagreen; font-weight:500; "><i class="fad fa-file-signature"></i> Image Name</label>
                                <input type="text" class="form-control" id="Imagename" placeholder="Image Name" style="border-radius: 1.25rem;" disabled>
                            </div>
                            <div class="form-group col-12 pl-2">
                                <div class="form-check pb-1">
                                    <input class="form-check-input position-static" type="radio" name="blankRadio" id="blankRadio1" value="option1" aria-label="...">
                                    <label class="form-check-label" for="blankRadio1" style="color:#f34f32; font-weight: 500;"><i class="fad fa-engine-warning"></i> Normal Report</label>
                                </div>
                                <div class="form-check pt-1">
                                    <input class="form-check-input position-static" type="radio" name="blankRadio" id="blankRadio2" value="option2" aria-label="">
                                    <label class="form-check-label" for="blankRadio2" style="color:#6b3c96; font-weight:500;"><i class="fad fa-file-certificate"></i> License Report</label>                                
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" style="border-radius: 1.25rem"><i class="fad fa-exclamation-triangle"></i> Report</button>                                            
                    </form>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary bt" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>                                                        



    <!----------------------report popup end--------------------------------------->
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
            <div class="modal-body">
                        <div class="col-12" style="padding: 5px; text-align: center;">
                            <img class="img-fluid" src="<?php echo $site_url,$row_img['image_location']; ?>" alt="" style="height:250px; object-fit:contain;">
                        </div>
                        <hr class="mb-3">
                        <div class="col-12">
                            <ul class="nav nav-tabs" id="mytab" role="tablist" style="justify-content: center;  border-bottom: none;">
                                <li class="nav-item" role="presentation" style="margin-right:5px;">
                                    <a class="nav-link active rounded-pill badge badge-secondary" id="sharelink-tab" data-toggle="tab" href="#sharelink" role="tab" aria-controls="sharelink" aria-selected="true"><i class="fad fa-link"></i> Link</a>
                                </li>
                                <li class="nav-item" role="presentation" style="margin-left: 5px;">
                                    <a class="nav-link rounded-pill badge badge-secondary" id="embed-tab" data-toggle="tab" href="#embed" role="tab" aria-controls="embed" aria-selected="false"><i class="fad fa-code"></i> Embed</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="sharelink" role="tabpanel" aria-labelledby="sharelink-tab">
                                    <div class="col-12" style="margin-top: 15px;">
                                        <div class="row">
                                            <input type="text" class="form-control col-10" id="shrtxt" value="<?php $img_url=$site_url."/pages/image.php?id=".$img_id; echo $img_url; ?>" style="border-radius: 1.25rem;" readonly>
                                            <div class="col-2">
                                                <button type="button" class="btn btn-light bt" id="shrbtn" data-container="body" data-toggle="popover" data-placement="right" data-content="✔ Copied" style="background-color: #e2e6ea;"><i class="fad fa-clipboard-list-check" style="color:#004498ed;"></i></button><span></span>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="embed" role="tabpanel" aria-labelledby="embed-tab">
                                    <div class="col-12" style="margin-top: 15px;">
                                        <div class="row">
                                            <textarea class="form-control col-10" id="shrtxtt" readonly><?php echo '<iframe src="'.$img_url.'" style="border:none;" width="100%" height="500" title="'.$row_img['title'].'"></iframe>'; ?></textarea>
                                            <div class="col-2">
                                                <button type="button" class="btn btn-light bt" id="shrbtnn" data-container="body" data-toggle="popover" data-placement="right" data-content="✔ Copied" style="background-color: #e2e6ea;"><i class="fad fa-clipboard-list-check" style="color:#004498ed;"></i></button>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="margin-top: 25px;">
                            <div class="row">
                                <a class="col-2 text-center" onclick="sharecount()" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $img_url; ?>" target="_blank"><i class="fab fa-facebook" style="font-size: 40px;color:#4267B2;"></i></a>
                                <a class="col-2 text-center" onclick="sharecount()" href="https://twitter.com/intent/tweet?text=<?php echo $img_url; ?>" target="_blank"><i class="fab fa-twitter" style="font-size: 40px;color:#1DA1F2;"></i></a>
                                <a class="col-2 text-center" onclick="sharecount()" href="https://www.reddit.com/submit?url=<?php echo $img_url; ?>&title=<?php echo $row_img['title']; ?>" target="_blank"><i class="fab fa-reddit" style="font-size: 40px;color:orangered;"></i></a>
                                <a class="col-2 text-center" onclick="sharecount()" href="https://in.pinterest.com/pin/create/button/?url=<?php echo $img_url; ?>" target="_blank"><i class="fab fa-pinterest" style="font-size: 40px;color:#E60023;"></i></a>
                                <a class="col-2 text-center" onclick="sharecount()" href="https://wa.me/?text=<?php echo $img_url; ?>" target="_blank"><i class="fab fa-whatsapp" style="font-size: 40px;color:#075E54;"></i></a>
                                <a class="col-2 text-center"><button type="button" onclick="share()" class="btn btn-light bt" style="background-color: #e2e6ea;"><i class="fad fa-ellipsis-h" style="color:#738885ed;"></i></button></a>
                            </div>    
                        </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bt" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>                           


    <!----------------------Share popup end--------------------------------------->
    <script type="text/javascript">
        const shrtxt = document.getElementById('shrtxt');
        const shrbtn = document.getElementById('shrbtn');

        shrbtn.onclick = function () {
            shrtxt.select();
            document.execCommand("copy")
        }
    </script>
    <script type="text/javascript">
        const shrtxtt = document.getElementById('shrtxtt');
        const shrbtnn = document.getElementById('shrbtnn');

        shrbtnn.onclick = function () {
            shrtxtt.select();
            document.execCommand("copy")
        }
    </script>

    <script>
            $(function () {
                $('[data-toggle="popover"]').popover()
                })
    </script>

    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
     <?php if ($login==1) { ?>
        <script>
        //AJAX Like
            function mylike(id){
                $(document).ready(function(){
                    //Send AJAX request
                    $.ajax({
                        url: 'like.php',
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
        <script>
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
         <script>
        //Count Download
        function countDownload(id){
            $(document).ready(function(){
                $.ajax({
                    url: 'download.php',
                    type: 'POST',
                    data: 'id='+id,
                    success: function(result){
                        $('#countDown').append(result);
                    }
                });
            });
        }
        </script>
        <script>
  $(document).ready(function(){
    // Load Data from Database with Ajax
    function loadTable(page){
      $.ajax({
        url: "related-pagination.php",
        type: "POST",
        data : { page_no : page, category:<?php echo $category_id; ?>, img_id:<?php echo $row_img['id']; ?>},
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
  //share script
  function share(){
      if (navigator.share) {
      navigator.share({
        title: '<?php echo $row_img['title']; ?>',
        text: '<?php echo $row_img['title']." by ".$row_img_user['name']; ?>',
        url: document.location.href,
      })
        .then(() => sharecount())
        .catch((error) => console.log('Error sharing', error));
    }
  }
//Count Share
function sharecount(){
            $(document).ready(function(){
                    $.ajax({
                        url: 'share-count.php',
                        type: 'POST',
                        data: 'shareid='+<?php echo $row_img['id']; ?>,
                        success: function(result){
                            $('#sharecount').html(result);
                        }
                    });
            });
}
$(document).on("click","#shrbtn",function(){
    sharecount();
});
$(document).on("click","#shrbtnn",function(){
    sharecount();
});
</script>
</body>
</html>

