<?php
    require('../connect.php');
    if(isset($_POST['id'])){
        $img_count_id=$_POST['id'];
        $sql="UPDATE images SET downloads=downloads+1 WHERE id='$img_count_id'";
        if($connect->query($sql)!=TRUE){
            echo "<script>alert('Unable to count download!');</script>";
        }
    }
?>