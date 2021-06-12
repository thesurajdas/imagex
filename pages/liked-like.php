<?php
    //Add database connection
    require_once('../connect.php');
        if ((isset($_POST['image_id'])) && (isset($_POST['user_id']))) {
            $image_id=$_POST['image_id'];
            $user_id=$_POST['user_id'];
            //Check liked or not
            $sql="SELECT * FROM likes WHERE image_id='$image_id' AND user_id='$user_id'";
            $result_like=$connect->query($sql);
            if($result_like->num_rows==1){
                $input_type="dislike";
            }
            elseif($result_like->num_rows==0){
                $input_type="like";
                $like_color="color:red;";
            }
            //Like Processs Start
            if ($input_type=='like') {
                //insert like
                $sql="INSERT INTO likes (image_id,user_id) VALUES('$image_id','$user_id')";
                $connect->query($sql);
                //Update like
                $sql="UPDATE images SET likes=likes+1 WHERE id='$image_id'";
                $connect->query($sql);
                //Display like
                $sql="SELECT * FROM images WHERE id='$image_id'";
                $result=$connect->query($sql);
                $row=$result->fetch_assoc();
                echo "<span style='".$like_color."'><i class='fad fa-heart'></i></span> ".$row['likes'];
            }
            elseif($input_type=='dislike'){
                //delete like
                $sql="DELETE FROM likes WHERE image_id='$image_id' AND user_id='$user_id'";
                $connect->query($sql);
                //Update like
                $sql="UPDATE images SET likes=likes-1 WHERE id='$image_id'";
                $connect->query($sql);
                //Display like
                $sql="SELECT * FROM images WHERE id='$image_id'";
                $result=$connect->query($sql);
                $row=$result->fetch_assoc();
                echo "<i class='far fa-heart'></i> ".$row['likes'];
            }
            else{
                //Display like
                $sql="SELECT * FROM images WHERE id='$image_id'";
                $result=$connect->query($sql);
                $row=$result->fetch_assoc();
                echo "<i class='far fa-heart'></i> (".$row['likes'].")<script>alert('You need to login to like this post!');</script>";
            }
        }
?>