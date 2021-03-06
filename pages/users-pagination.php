<?php
sleep(0);
require_once('../auth.php');
$trend_date=date('Y-m');
$limit = 9;
if(isset($_POST['page_no'])){
  $page = $_POST['page_no'];
}else{
  $page = 0;
}
$last_id = $page+$limit;
	                            //Get Image Data from Database
	                            $sql="SELECT * FROM users ORDER BY total_views+total_likes DESC LIMIT {$page},$limit";
	                            $result_user=$connect->query($sql);
	                            if ($result_user->num_rows>0) {
                                while($ru=$result_user->fetch_assoc()):
                                  $u_id=$ru['id'];
                                  $user_total_views=0;
            $user_total_likes=0;
            //Get users uploaded images data
            $sql="SELECT * FROM images WHERE user_id='$u_id'";
            $result_img=$connect->query($sql);
            //total views
            while($row_img=$result_img->fetch_assoc()){
                $user_total_views=$user_total_views+$row_img['views'];
                $user_total_likes=$user_total_likes+$row_img['likes'];
            }
            //Update total views and likes in user
            $sql="UPDATE users SET total_views = '$user_total_views', total_likes = $user_total_likes WHERE id='$u_id';";
            $connect->query($sql);
                    ?>
                    <div class="col-md-4 col-xl-4 col-lg-4 col-sm-12 mb-5">
                        <div class="bg-white shadow-sm py-5 px-4" style="border-radius: 1.25rem;"><img src="../<?php if(!empty($ru['avatar'])){echo $ru['avatar']; } else {echo 'img/avatar.png';}  ?>" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm cthhumb">
                            <h5 class="mb-0 "><a class="text-decoration-none" href="profile.php?u=<?php echo $ru['username']; ?>" target="_blank"><?php echo $ru['name']; ?></a></h5><span class="small text-uppercase text-muted"><?php echo $ru['role']; ?></span>
                            <ul class="social mb-0 list-inline mt-3 mb-2">
                                <li class="list-inline-item" style="border-radius: 1.25rem;" disabled><i class="fad fa-eye" style="color: #212529bf;"></i> <span><?php echo $user_total_views; ?></span></a></li>
                                <li class="list-inline-item" style="border-radius: 1.25rem;" disabled><i class="fad fa-heart" style="color: #ff0000c2;"></i> <span><?php echo $user_total_likes; ?></span></a></li>
                            </ul>
                            <!-- <button type="button" class="btn btn-outline-warning" style="border-radius: 1.25rem;"><i class="fad fa-user-plus"></i> Follow</button> -->
                        </div>
                    </div>
                    <?php endwhile; ?>
                                <div class="col-12 text-center" id="pagination"> <button type="button" id="ajaxbtn" data-id="<?php echo $last_id; ?>" class="btn btn-info mt-4 mb-2" style="border-radius: 1.25rem;"><i class="fad fa-plus-circle"></i> Load More</button></div>
                                <?php
                                }else{
                                    echo "";
                                    } ?>