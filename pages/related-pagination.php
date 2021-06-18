<?php

require_once('../auth.php');

$limit = 3;
if(isset($_POST['page_no'])){
  $page = $_POST['page_no'];
}else{
  $page = 0;
}
if(isset($_POST['category'])){
  $category_id = $_POST['category'];
}else{
  $category_id = 0;
}
if(isset($_POST['img_id'])){
  $img_id = $_POST['img_id'];
}
else{
    $img_id=0;
}
$last_id = $page+$limit;
	                            //Get Image Data from Database
	                                                    $sql="SELECT * FROM images WHERE visibility=0 AND category={$category_id} ORDER BY views DESC, likes DESC, downloads DESC LIMIT {$page},$limit";
                                                        $result_img=$connect->query($sql);
                                                        if ($result_img->num_rows>1) {
                                                        while($row=$result_img->fetch_assoc()):
                                                        if(($row['id']!=$img_id)){
                                                    ?>           
                                                        <div class="col-lg-4 col-md-6 col-sm-12 sglry">
                                                                <div class="card cds">
                                                                    <img class="im" src="<?php echo $site_url,$row['image_location']; ?>" alt="Card image cap">
                                                                    <div class="card-text cds-txt">
                                                                        <div class="container" style="padding-left: 0">
                                                                            <div class="row">
                                                                                <h4 class="col-10 inm"><a class="card-link il" href="<?php echo $site_url; ?>/pages/image.php?id=<?php echo $row['image_id']; ?>"><?php echo $row['title']; ?></a></h4>
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
                                                                        $avatar=$row_img_user['avatar'];
                                                                        echo $site_url.'/pages/profile.php?u='.$username; ?>" class=" text-decoration-none text-white"><img class="upimg" src="<?php echo $site_url."/".$row_img_user['avatar']; ?>" alt=""> <?php echo $username; ?></a>
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
                                                                                                $icon="far";
                                                                                                $like_color="";
                                                                                            }
                                                                                        }
                                                                                        else{
                                                                                            $icon="far";
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
                                    <?php }endwhile;?>
                                <div class="col-12 text-center" id="pagination"> <button type="button" id="ajaxbtn" data-id="<?php echo $last_id; ?>" class="btn btn-info mt-4 mb-2" style="border-radius: 1.25rem;"><i class="fad fa-plus-circle"></i> Load More</button></div>
                                <?php
                                }else{
                                    echo "";
                                    } ?>