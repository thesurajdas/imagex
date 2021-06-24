<?php
    //Add database connection
    require_once('../../../connect.php');
        if (isset($_POST['img_id'])) {
            $img_id=$_POST['img_id'];
                $sql="UPDATE images set visibility=1 WHERE id='$img_id'";
                if($connect->query($sql)===TRUE){
                    echo "<script>alert('Report Private successfully!');</script>";
                }
                else{
                    echo "<script>alert('Something went wrong!');</script>";
                }
        }
?>