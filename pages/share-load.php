<?php
    require('../connect.php');
    if(isset($_POST['img_id'])):
        $img_id=$_POST['img_id'];
        $sql="SELECT * FROM images WHERE id='$img_id'";
        $r_i=$connect->query($sql);
        $row_img=$r_i->fetch_assoc();
                                    $img_user_id=$row_img['user_id'];
                                    $sql="SELECT * FROM users WHERE id='$img_user_id'";
                                    $result_img=$connect->query($sql);
                                    $row_img_user=$result_img->fetch_assoc();
?>

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
                                            <input type="text" class="form-control col-10" id="shrtxt" value="<?php $img_url=$site_url."/pages/image.php?id=".$row_img['image_id']; echo $img_url; ?>" style="border-radius: 1.25rem;" readonly>
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
                            <div class="row" style="justify-content: space-around">
                                <a class=" text-center" onclick="sharecount()" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $img_url; ?>" target="_blank"><i class="fab fa-facebook" style="font-size: 40px;color:#4267B2;"></i></a>
                                <a class=" text-center" onclick="sharecount()" href="https://twitter.com/intent/tweet?text=<?php echo $img_url; ?>" target="_blank"><i class="fab fa-twitter" style="font-size: 40px;color:#1DA1F2;"></i></a>
                                <!-- <a class="col-2 text-center" onclick="sharecount()" href="https://www.reddit.com/submit?url=<?php echo $img_url; ?>&title=<?php echo $row_img['title']; ?>" target="_blank"><i class="fab fa-reddit" style="font-size: 40px;color:orangered;"></i></a> -->
                                <a class=" text-center" onclick="sharecount()" href="https://in.pinterest.com/pin/create/button/?url=<?php echo $img_url; ?>" target="_blank"><i class="fab fa-pinterest" style="font-size: 40px;color:#E60023;"></i></a>
                                <a class=" text-center" onclick="sharecount()" href="https://wa.me/?text=<?php echo $img_url; ?>" target="_blank"><i class="fab fa-whatsapp" style="font-size: 40px;color:#1ead1e;"></i></a>
                                <a class=" text-center"><button type="button" onclick="share()" class="btn btn-light bt" style="background-color: #e2e6ea;"><i class="fad fa-ellipsis-h" style="color:#738885ed;"></i></button></a>
                            </div>    
                        </div>        
            </div>
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
                        url: '<?php echo $site_url; ?>/pages/share-count.php',
                        type: 'POST',
                        data: 'shareid='+<?php echo $row_img['id']; ?>,
                        success: function(result){}
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
<?php endif; ?>