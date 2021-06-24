<?php
    //Add database connection
    require_once('../../../connect.php');
        if (isset($_POST['report_id'])) {
            $report_id=$_POST['report_id'];
            //Check liked or not
            $sql="SELECT * FROM reports WHERE id='$report_id'";
            $result_del=$connect->query($sql);
            $row_img_del=$result_del->fetch_assoc();
            if($result_del->num_rows==1){
                $sql="DELETE FROM reports WHERE id='$report_id'";
                if($connect->query($sql)===TRUE){
                    echo "<script>alert('Report deleted successfully!');</script>";
                }
                else{
                    echo "<script>alert('Report not Found!');</script>";
                }
            }
            else{
                echo "<script>alert('You are not owner of the Report!');</script>";
            }
            
        }
?>