<?php
    //Add database connection
    require_once('../connect.php');
        if ((isset($_POST['imgID'])) && (isset($_POST['rpID']))) {
            $image_id=$_POST['imgID'];
            $report_type=$_POST['reportType'];
            $reporter_id=$_POST['rpID'];
            $uploader_id=$_POST['upID'];
            $time=$_POST['time'];
            $description=$connect->real_escape_string($_POST['description']);
            //Run SQL query
            $sql="INSERT INTO reports (image_id,report_type,reporter_id,uploader_id,time,description) VALUES ('$image_id','$report_type','$reporter_id','$uploader_id','$time','$description');";
            if($result_rp=$connect->query($sql)){
                echo '<div class="alert alert-success">Image Reported Successfully!</div>';
            }
            else{
                echo "<script>alert('Something Went Wrong!');</script>";
            }
        }
?>