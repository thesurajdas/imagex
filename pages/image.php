<?php
    //Add database connection
    require_once('../auth.php');
    //Get image id
    if (isset($_GET['id'])) {
        $img_id=$_GET['id'];
        $sql="SELECT * FROM images WHERE image_id='$img_id'";
        $result_img=$connect->query($sql);
        $row_img=$result_img->fetch_assoc();
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
                                    <img class="pimgg ml-4" src="https://dummyimage.com/600x400/000/fff2.jpg" alt="">
                                    <?php
                                    $img_user_id=$row_img['user_id'];
                                    $sql="SELECT * FROM users WHERE id='$img_user_id'";
                                    $result_img=$connect->query($sql);
                                    $row_img_user=$result_img->fetch_assoc();
                                    ?>
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
                    <div class="container">
                        <div class="row justify-content-center">
                        <?php
                                                            $image_id=$row_img['id'];
                                                                if($login==1){
                                                                    //Check liked or not
                                                                    $sql="SELECT * FROM likes WHERE image_id='$image_id' AND user_id='$user_id'";
                                                                    $result_like=$connect->query($sql);
                                                                    if($result_like->num_rows==1){
                                                                        $icon="fad";
                                                                        $like_color="color:red;";
                                                                    }
                                                                    else{
                                                                        $icon="fal";
                                                                        $like_color="";
                                                                    }
                                                                }
                                                                else{
                                                                    $icon="fal";
                                                                    $like_color="";
                                                                }
                                                        ?>
                            <a class="btn btn-danger dg col-md-2 col-sm-12 bt" style="margin-top: 10px" id="<?php echo $image_id; ?>" onclick="mylike(<?php echo $image_id; ?>)"><span style="<?php echo $like_color;?>"><i class="<?php echo $icon; ?> fa-heart"></i></span> <span> <?php echo $row_img['likes']; ?></span></a>
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
                            <?php
	                            //Get Image Data from Database
	                            $sql="SELECT * FROM images WHERE category='$category_id'";
	                            $result_img=$connect->query($sql);
	                            if ($result_img->num_rows>0) {
                                while($row=$result_img->fetch_assoc()):
                                if(($row['image_id']!=$img_id)){
                            ?>           
                                <div class="col-lg-4 col-md-6 col-sm-12 sglry">
                                        <div class="card cds">
                                            <img class="im" src="<?php echo $site_url,$row['image_location']; ?>" alt="Card image cap">
                                            <div class="card-text cds-txt">
                                                <div class="container" style="padding-left: 0">
                                                    <div class="row">
                                                        <h3 class="col-10 inm"><a class="card-link il" href="<?php echo $site_url; ?>/pages/image.php?id=<?php echo $row['image_id']; ?>"><?php echo $row['title']; ?></a></h3>
                                                        <div class="btn-group dropleft col-2">
                                                        <?php if(($login==1) && ($user_id==$row['user_id'])){ ?>
                                                            <button type="button" class="btn text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fad fa-ellipsis-v"></i></button>
                                                        <?php } ?>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">
                                                                    <button type="button" class="btn col-12" data-toggle="modal" data-target="#staticBackdrop"><i class="fad fa-file-edit"></i> Edit</button>
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="<?php echo $site_url,$row['image_location']; ?>" download="<?php echo $row['title']; ?>">
                                                                    <button type="button" class="btn col-12" data-toggle="modal" ><i class="fad fa-cloud-download-alt"></i> Download</button>
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#"><button type="button" class="btn col-12"><i class="fad fa-trash"></i> Delete</button></a>
                                                            </div>
                                                        </div>    
                                                    </div>        
                                                </div>
                                                <a href="<?php $image_user_id=$row['user_id'];
                                                $sql="SELECT * FROM users WHERE id='$image_user_id'";
                                                $result_img_r=$connect->query($sql);
                                                $row_img_user=$result_img_r->fetch_assoc();
                                                $username=$row_img_user['username'];
                                                $fullname=$row_img_user['name'];
                                                echo $site_url.'/pages/profile.php?u='.$username; ?>" class=" text-decoration-none text-white"><img class="upimg" src="https://picsum.photos/id/237/200/300" alt=""> <?php echo $fullname; ?></a>
                                                <div class="container">
                                                    <div class="row chbtn">
                                                        <?php
                                                            $image_id=$row['id'];
                                                                if($login==1){
                                                                    //Check liked or not
                                                                    $sql="SELECT * FROM likes WHERE image_id='$image_id' AND user_id='$user_id'";
                                                                    $result_like=$connect->query($sql);
                                                                    if($result_like->num_rows==1){
                                                                        $icon="fad";
                                                                        $like_color="color:red;";
                                                                    }
                                                                    else{
                                                                        $icon="fal";
                                                                        $like_color="";
                                                                    }
                                                                }
                                                                else{
                                                                    $icon="fal";
                                                                    $like_color="";
                                                                }
                                                        ?>
                                                        <a class="btn btn-outline-danger cbtn" style="margin-right: 5px;" id="<?php echo $image_id; ?>" onclick="mylike(<?php echo $image_id; ?>)" title="Like This Image"><span style="<?php echo $like_color;?>"><i class="<?php echo $icon; ?> fa-heart"></i></span> <span><?php echo $row['likes']; ?></span></a>
                                                        <a href="<?php echo $site_url; ?>/pages/image.php?id=<?php echo $row['image_id']; ?>" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fad fa-eye"></i> <span><?php echo $row['views']; ?></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>              
            <?php }endwhile;}
                            else{
                                echo "<center><b>No Image Found!</b></center>";
                            } ?>
                            <!--user uploaded image end-->
        </div>
    </div>
    <!----------------------Footer Section---------------------------------------------------->
    <?php
        include('../pages/include/footer.php')
    ?>
    <button type="button" class="btn btn-outline-success cbtnn" data-toggle="tooltip" title="Download Now (123)"><i class="fad fa-cloud-download-alt" style="width: 35px; height: 35px"></i></button>

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
</body>
</html>

