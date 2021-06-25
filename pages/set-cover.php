<?php
    require('../connect.php');
    if(isset($_POST['img_id'])){
        $user_id=$_POST['user_id'];
        $img_id=$_POST['img_id'];
        $sql="SELECT * FROM images WHERE id='$img_id'";
        $r_c=$connect->query($sql);
        $row_c=$r_c->fetch_assoc();
        $cover=$row_c['image_location'];
        $sql="UPDATE users SET cover='$cover' WHERE id='$user_id'";
        if ($connect->query($sql)==TRUE) {
            echo "<script>alert('Cover Photo Updated Sucessfully!');</script>";
        }
        else{
            echo "<script>alert('Something went wrong!');</script>";
        }
    }
?>