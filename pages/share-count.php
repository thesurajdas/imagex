<?php
    require('../connect.php');
    if(isset($_POST['shareid'])){
    $shareid=$_POST['shareid'];
    $sql="UPDATE images SET shares=shares+1 WHERE id='$shareid'";
    if($connect->query($sql)){
        $sql="SELECT * FROM images WHERE id='$shareid'";
        $r_s=$connect->query($sql);
        $row_share=$r_s->fetch_assoc();
        echo $row_share['shares'];
    }
}
    else{
        echo "<script>alert('Something went wrong when share count!');</script>";
    }
?>