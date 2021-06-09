<?php
    //Add database connection
    require_once('../auth.php');
    //update image information
    if (isset($_POST['update'])) {
        if (($_REQUEST['img_id']=="")||($_REQUEST['title']=="")||($_REQUEST['filetype']=="")||($_REQUEST['visibility']=="")){
            $img_id=$_REQUEST['img_id'];
            $title=$_REQUEST['title'];
            $filetype=$_REQUEST['filetype'];
            $visibility=$_REQUEST['visibility'];
            $sql="UPDATE images SET title='$title', category='$filetype', visibility='$visibility' WHERE id='$img_id'";
            if ($connect->query($sql)) {
                echo "<script>alert('Image Updated Successfully!')</script>";
            }
            else{
                echo "<script>alert('Something Went Wrong!')</script>";
            }
        }
    }
    //Dynamic user profile id
    if (isset($_GET['u'])) {
        $username=$_GET['u'];
        //Get Data from SQL
        $sql="SELECT * FROM users WHERE username='$username'";
        $result_log=$connect->query($sql);
        if ($result_log->num_rows==1) {
            $u_id=$_GET['u'];
            $sql="SELECT * FROM users WHERE username='$u_id'";
            $result=$connect->query($sql);
            $row=$result->fetch_assoc();
            $id=$row['id'];
        }
        else{
            header("Location:404.php");
            exit();
        }
    }
    else {
        //Check Login
        if ($login!=1) {
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
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/jquery-3.5.1.slim.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <link href="../css/profile.css" rel="stylesheet">

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
        <!--------------------------------------nav Section--------------------------------------------------------->
        <?php require_once('include/header.php');
            //Add data into variables
            $user_username=$row['username'];
            $user_name=$row['name'];
            $user_email=$row['email'];
            $user_gender=$row['gender'];
            $user_phone_no=$row['phone_no'];
            $user_country=$row['country'];
            $user_device_name=$row['device_name'];
            $user_device_model=$row['device_model'];
            $user_apertures=$row['apertures'];
            $user_resolution=$row['resolution'];
            $user_focal_length=$row['focal_length'];
            $user_role=$row['role'];
            $user_total_views=$row['total_views'];
            $user_total_likes=$row['total_likes'];
            $user_total_downloads=$row['total_downloads'];
        ?>

        <!-----------------------------------------Profile section------------------------------------------------------>

        <div class="container shadow-lg p-3 mb-5 bg-white emp-profile" style="border-radius: 1.25rem;">

            <form method="post">
                <div class="row" style="padding-top: 25px;">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img class="rounded-circle pix" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                <h1 class="col-md-12 d-none d-md-block d-lg-block d-xl-block">
                                    <?php echo $user_name; ?>
                                </h1>
                                <h1 class="col-sm-12 text-center d-md-none d-lg-none d-lg-none d-lx-none">
                                    <?php echo $user_name; ?>
                                </h1>
                                <h6 class="col-md-12 d-none d-md-block d-lg-block d-xl-block">
                                    <?php echo $user_role; ?>
                                </h6>
                                <h6 class="col-sm-12 text-center d-md-none d-lg-none d-lg-none d-lx-none">
                                    <?php echo $user_role; ?>
                                </h6>
                                    <div class="container col-md-12 d-none d-md-block d-lg-block d-xl-block">
                                        <div class="row">
                                            <p class="col-4 "><i class="fad fa-eye" style="color: #212529bf;"></i> <span><?php echo $user_total_views; ?></span></p>
                                            <p class="col-4"><i class="fad fa-heart" style="color: #ff0000c2;"></i> <span><?php echo $user_total_likes; ?></span></p>
                                            <p class="col-4"><i class="fad fa-download" style="color: #008e00d1;"></i> <span><?php echo $user_total_downloads; ?></span></p>
                                        </div>
                                    </div>
                                    <div class="container col-sm-12 text-center text-center d-md-none d-lg-none d-lg-none d-lx-none">
                                        <div class="row">
                                            <p class="col-4 "><i class="fad fa-eye" style="color: #212529bf;"></i> <span><?php echo $user_total_views; ?></span></p>
                                            <p class="col-4"><i class="fad fa-heart" style="color: #ff0000c2;"></i> <span><?php echo $user_total_likes; ?></span></p>
                                            <p class="col-4"><i class="fad fa-download" style="color: #008e00d1;"></i> <span><?php echo $user_total_downloads; ?></span></p>
                                        </div>
                                    </div>
                            <ul class="nav nav-tabs justify-content-center justify-content-md-start" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fad fa-address-card"></i> About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fad fa-mobile-android"></i> Camera</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 d-none d-xl-block d-lg-block d-xl-none">
                        <a href="editprofile.php" class="btn btn-outline-warning profile-edit-btn">Edit Profile</a>
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
                            <div class="tab-pane text-md-left text-center fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-5">
                                                <label><i class="fad fa-at" style="color: rgb(255, 0, 0);"></i> Username</label>
                                            </div>
                                            <div class="col-6">
                                                <p class="badge" style="color: #fff; background-color: rgb(255, 0, 0);"><?php echo $user_username; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label><i class="fad fa-male" style="color: rgb(255, 165, 0);"></i> Name</label>
                                            </div>
                                            <div class="col-6">
                                                <p class="badge" style="color: #fff; background-color: rgb(255, 165, 0);"><?php echo $user_name; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label><i class="fad fa-venus-mars" style="color:rgb(238, 130, 238);"></i> Gender</label>
                                            </div>
                                            <div class="col-6">
                                                <p class="badge"style="color: #fff; background-color: rgb(238, 130, 238);"><?php echo $user_gender; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label><i class="fad fa-envelope" style="color: rgb(0, 128, 0);"></i> Email</label>
                                            </div>
                                            <div class="col-6">
                                                <p class="badge"style="color: #fff; background-color: rgb(0, 128, 0);"><?php echo $user_email; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label><i class="fad fa-phone-volume" style="color: rgb(0, 0, 255);"></i> Phone</label>
                                            </div>
                                            <div class="col-6">
                                                <p class="badge"style="color: #fff; background-color: rgb(0, 0, 255);"><?php echo $user_phone_no; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label><i class="far fa-globe-asia" style="color: rgb(75, 0, 130);"></i> Country</label>
                                            </div>
                                            <div class="col-6">
                                                <p class="badge" style="color: #fff; background-color: rgb(75, 0, 130);"><?php echo $user_country; ?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade text-md-left text-center" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-5">
                                                <label><i class="fad fa-mobile-android" style="color: rgb(0, 128, 0);"></i> Device</label>
                                            </div>
                                            <div class="col-6">
                                                <p class="badge" style="color: #fff; background-color: rgb(0, 128, 0);"><?php echo $user_device_name; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label><i class="fad fa-tablet-rugged" style="color: rgb(75, 0, 130);"></i> Model</label>
                                            </div>
                                            <div class="col-6">
                                                <p class="badge" style="color: #fff; background-color: rgb(75, 0, 130);"><?php echo $user_device_model; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label><i class="fad fa-border-none" style="color:rgb(238, 130, 238);"></i> Resolution</label>
                                            </div>
                                            <div class="col-6">
                                                <p class="badge"style="color: #fff; background-color: rgb(238, 130, 238);"><?php echo $user_resolution." MP (Mega Pixel)"; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label><i class="fad fa-question-circle" style="color: rgb(255, 165, 0);"></i> Focal Length</label>
                                            </div>
                                            <div class="col-6">
                                                <p class="badge" style="color: #fff; background-color: rgb(255, 165, 0);"><?php echo $user_focal_length; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label><i class="fad fa-info-circle"  style="color: rgb(255, 0, 0);"></i> Apperture</label>
                                            </div>
                                            <div class="col-6">
                                                <p class="badge" style="color: #fff; background-color: rgb(255, 0, 0);"><?php echo $user_apertures; ?></p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <hr class="mb-4">
            <!-------------------------------------------------Uploaded Images main body------------------------------------------>
            <div class="container shadow-lg p-3 mb-5 bg-white my-3 glry" style="border-radius: 1.25rem">
                <div class="profile-hd">
                    <ul class="nav nav-tabs justify-content-center justify-content-md-start" id="myiTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="uimg-tab" data-toggle="tab" href="#uimg" role="tab" aria-controls="uimg" aria-selected="true"><i class="fad fa-folder-upload"></i> Uploads</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="simg-tab" data-toggle="tab" href="#simg" role="tab" aria-controls="simg" aria-selected="false"><i class="fad fa-bookmark" style="color: red;"></i> Saved</a>
                        </li>
                    </ul>
                </div>    
                    <div class="tab-content" id="myiTabContent">
                        <div class="tab-pane fade show active" id="uimg" role="tabpanel" aria-labelledby="uimg-tab">
                            <div class="row">
                                <!--User Upoaded image start-->
                                <?php
	                            //Get Image Data from Database
	                            $sql="SELECT * FROM images WHERE user_id='$id'";
	                            $result_img=$connect->query($sql);
	                            if ($result_img->num_rows>0) {
                                while($row=$result_img->fetch_assoc()): ?>
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
                                                <a href="<?php echo $site_url.'/pages/profile.php?u='.$user_username; ?>" class=" text-decoration-none text-white"><img class="upimg" src="https://picsum.photos/id/237/200/300" alt=""> <?php echo $user_name; ?></a>
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
                                <?php endwhile;}
                                else{
                                    echo " <div class='container text-center'><img style='height: 150px; width: 150px; object-fit: contain;' src='../img/notfound.svg' alt=''><h2 style='padding-top: 20px; padding-bottom: 25px; color: #6c757dd4;'>You Haven't Uploaded Any Images Yet. <a href='upload.php' class='btn btn-success rounded-pill shadow-sm'><i class='fad fa-cloud-upload'></i> Upload Now</a></h2></div> ";
                                    } ?>

                                <!--user uploaded image end-->
                            </div> 
                        </div>
                        <div class="tab-pane fade" id="simg" role="tabpanel" aria-labelledby="simg-tab">
                            <!-----------saved mimages starts hare-->
                                <div class="row">
                                    
                                </div>
                            <!-----------saved mimages end hare-->
                        </div>
                    </div>    
            </div>           
        </div>
        <!---------------------------footer section--------------------------------->
        <?php
            include('../pages/include/footer.php')
        ?>
        <!-------------------------------------------------------------edit image description----------------------------->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="#staticBackdropLabel">Image Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="far fa-times-circle"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/">
                        <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="title"><i class="fad fa-file-signature"></i> Image Name</label>
                                        <input type="text" name="title" class="fc form-control" id="title" placeholder="Beautiful Nature" minlength="5" maxlength="15" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputimgtype"><i class="fad fa-grip-horizontal"></i> Image Type</label>
                                        <select id="inputimgtype" name="filetype" class="fc form-control" aria-placeholder="Moun" required>
                                            <option selected></option>
                                            <option value="Abstract">Abstract</option>
                                            <option value="Animals">Animals</option>
                                            <option value="Anime">Anime</option>
                                            <option value="Art">Art</option>
                                            <option value="Astro">Astro</option>
                                            <option value="Black">Black</option>
                                            <option value="Bridge">Bridge</option>
                                            <option value="Cars">Cars</option>
                                            <option value="City">City</option>
                                            <option value="Cloud">Cloud</option>
                                            <option value="Dark">Dark</option>
                                            <option value="fadhion">fadhion</option>
                                            <option value="Flowers">Flowers</option>
                                            <option value="Food">Food</option>
                                            <option value="Macro">Macro</option>
                                            <option value="Motorcycles">Motorcycles</option>
                                            <option value="Motion">Motion</option>
                                            <option value="Mountain">Mountain</option>
                                            <option value="Music">Music</option>
                                            <option value="Nature">Nature</option>
                                            <option value="Other">Other</option>
                                            <option value="People">people</option>
                                            <option value="Sky">Sky</option>
                                            <option value="Sport">Sport</option>
                                            <option value="Street">Street</option>
                                            <option value="Technologie">Technologie</option>
                                            <option value="Textures">Texture</option>
                                            <option value="Travel">Travel</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="title"><i class="fad fa-globe-americas"></i> Image Visibility</label>
                                        <select id="inputimgtype" name="visibility" class="fc form-control" required>
                                            <option value="Public" selected>Public</option>
                                            <option value="Private">Private</option>
                                        </select>    
                                    </div>
                                </div>
                                <button type="submit" name="update" class="fc btn btn-success col-12"><i class="fad fa-check-circle"></i> Save changes</button>    
                        </div>
                        
                    </from>    
                <div class="modal-footer">
                    <button type="button" class="fc btn btn-danger col-12" data-dismiss="modal"><i class="fad fa-times-circle"></i> Close</button>
                </div>
                </div>
            </div>
        </div>
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
    </body>
</html>