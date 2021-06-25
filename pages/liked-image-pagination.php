<?php
require_once('../auth.php');
//Check last page no
$limit = 3;
if(isset($_POST['page_no'])){
  $page = $_POST['page_no'];
}else{
  $page = 0;
}
//Check category id available or not
if (isset($_POST['id'])) {
    $id=$_POST['id'];
}
else{
    $id=$user_id;
}
$last_id = $page+$limit;

    //Get User Liked images
    $sql="SELECT * FROM likes WHERE user_id={$id} ORDER BY id DESC LIMIT {$page},{$limit}";
    $result_liked=$connect->query($sql);
    if ($result_liked->num_rows>0) {
    while($row_liked=$result_liked->fetch_assoc()):
            $img_id=$row_liked['image_id'];
	                            //Get Image Data from Database
	                            $sql="SELECT * FROM images WHERE id={$img_id} AND visibility=0";
	                            $result_img=$connect->query($sql);
	                            if ($result_img->num_rows>0) {
                                while($row=$result_img->fetch_assoc()):?>
                                    <div class="col-lg-4 col-md-6 col-sm-12 sglry">
                                        <div class="card cds">
                                            <img draggable="false" class="im" src="<?php echo $site_url,$row['image_location']; ?>" alt="Card image cap" onContextMenu="return false;">
                                            <div class="card-text cds-txt">
                                                <div class="container" style="padding-left: 0">
                                                    <div class="row">
                                                        <h4 class="col-10 inm"><a class="card-link il" href="<?php echo $site_url; ?>/pages/image.php?id=<?php echo $row['image_id']; ?>"><?php echo $row['title']; ?></a></h4>
                                                    </div>        
                                                </div>
                                                <a href="<?php $image_user_id=$row['user_id'];
                                                $sql="SELECT * FROM users WHERE id='$image_user_id'";
                                                $result_img_r=$connect->query($sql);
                                                $row_img_user=$result_img_r->fetch_assoc();
                                                $username=$row_img_user['username'];
                                                $fullname=$row_img_user['name'];
                                                $user_avatar=$row_img_user['avatar'];
                                                echo $site_url.'/pages/profile.php?u='.$username; ?>" class=" text-decoration-none text-white"><img draggable="false" class="upimg" src="<?php echo $site_url."/".$user_avatar; ?>" alt="" onContextMenu="return false;"> <?php echo $username; ?></a>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="row col-10 chbtn">
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
                                                                            $icon="far";
                                                                            $like_color="";
                                                                        }
                                                                    }
                                                                    else{
                                                                        $icon="far";
                                                                        $like_color="";
                                                                    }
                                                            ?>
                                                            <a class="btn btn-outline-danger cbtn" style="margin-right: 5px;" id="<?php echo 'l'.$image_id; ?>" onclick="myliked(<?php echo $image_id; ?>)" title="Like This Image"><span style="<?php echo $like_color;?>"><i class="<?php echo $icon; ?> fa-heart"></i></span> <span><?php echo $row['likes']; ?></span></a>
                                                            <a href="<?php echo $site_url; ?>/pages/image.php?id=<?php echo $row['image_id']; ?>" class="btn btn btn-outline-light cbtn" title="View Image" style="margin-left: 5px;"><i class="fad fa-eye"></i> <span><?php echo $row['views']; ?></span></a>
                                                        </div>
                                                        <div class="col-2 text-center pr-0 chbtn">
                                                            <button type="button" data-toggle="modal" data-target="#shareimg" onclick="shareimgpop(<?php echo $row['id'];?>);" class="btn  pr-0" style="color:white"><i class="fad fa-share-square"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;}endwhile;
                                ?>
                                <div class="col-12 text-center" id="pagination-like"> <button type="button" id="ajaxbtn-like" data-id="<?php echo $last_id; ?>" class="btn btn-info mt-4 mb-2" style="border-radius: 1.25rem;"><i class="fad fa-plus-circle"></i> Load More</button></div>
                                <?php
                                }else{
                                    echo "";
                                    } ?>