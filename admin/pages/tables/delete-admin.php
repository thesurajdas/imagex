<?php
    //Add database connection
    require_once('../../../connect.php');
        if (isset($_POST['image_id'])) {
            $image_id=$_POST['image_id'];
            //Check liked or not
            $sql="SELECT * FROM images WHERE id='$image_id'";
            $result_del=$connect->query($sql);
            $row_img_del=$result_del->fetch_assoc();
            if($result_del->num_rows==1){
                $sql="DELETE FROM images WHERE id='$image_id'";
                $sql2="DELETE FROM likes WHERE image_id='$image_id'";
                if(($connect->query($sql)===TRUE)&&($connect->query($sql2)===TRUE)){
                    echo "<script>alert('Image deleted successfully!');</script>";
                    $fl="../../..".$row_img_del['image_location'];
                    unlink($fl);
                }
                else{
                    echo "<script>alert('Image not Found!');</script>";
                }
            }
            else{
                echo "<script>alert('You are not owner of the image!');</script>";
            }
            
        }
?>