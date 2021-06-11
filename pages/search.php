<?php
    //Add database connection
    require_once('../auth.php');
    //Check category id available or not
    if (isset($_GET['q'])) {
        $q=$_GET['q'];
    }
    else{
        header("Location:404.php");
        exit();
    }
    //Check category Name
    $sql="SELECT * FROM categories WHERE id='$q'";
    $result_cat_name=$connect->query($sql);
    $row_cat_name=$result_cat_name->fetch_assoc();
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
        <link href="../css/allimg.css" rel="stylesheet">

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
        <!-----------------------------------------------image-section-------------------------------------------->

        <div class="container shadow-lg p-3 mb-5 bg-white glry" style="border-radius: 1.25rem;">
            <div class="col-12 text-center font-weight-bolder"><h2>Search Results For: <?php echo $q; ?></h2></div>
            <div class="container shadow-lg pl-3 pr-3 pt-1 mt-4" style="border-radius: 1.25rem;">
                    <div class="row pl-3 pr-3 pt-3">
                        <div class="text-right col-12">
                            <div class="btn-group btn-group-sm" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 1.25rem;"><i class="fad fa-caret-circle-down"></i> Short By</button>
                                <div class="dropdown-menu" style="min-width: auto;" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item " style="text-align: start; color: rgba(99, 96, 96, 0.856); font-size: 80%; font-weight: 700;" href="#"><i class="fad fa-eye"></i> View</a>
                                <a class="dropdown-item " style="text-align: start; color: rgba(220, 20, 60, 0.842); font-size: 80%; font-weight: 700;" href="#"><i class="fad fa-heart-circle"></i> Like</a>
                                <a class="dropdown-item " style="text-align: start; color: rgba(0, 128, 0, 0.815); font-size: 80%; font-weight: 700;" href="#"><i class="fad fa-download"></i> Download</a>
                                <a class="dropdown-item " style="text-align: start; color: rgba(28, 102, 177, 0.863); font-size: 80%; font-weight: 700;" href="#"><i class="fad fa-share-square"></i> Share</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <!--User Upoaded image start-->
                       <?php
	                            //Get Image Data from Database
	                            $sql="SELECT * FROM images WHERE title='$q'";
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
                                <?php endwhile;}
                                else{
                                    echo "<center><b>No Image Found!</b></center>";
                                    } ?>
                                <!--user uploaded image end-->
                    </div>        
            </div>
                <!----------------------------page options starts here---------------------------------->

                <!----------------------------page options ends here---------------------------------->
            </div>    
        </div>
        <!----------------------Footer Section---------------------------------------------------->
        <?php require_once('include/footer.php'); ?>
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