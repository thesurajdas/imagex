<?php
//create connection
 require('../connect.php');
//Check only non-login users and redirect them to login page.
if(isset($_COOKIE['user_id'])){
    //Decode login cookie
    $user_id=$_COOKIE['user_id'];
    $user_id=convert_uudecode($user_id);
    //Get Data from SQL
    $sql="SELECT * FROM users WHERE id='".$user_id."'";
    $result=$connect->query($sql);
    $row=$result->fetch_assoc();
    //Check cookie id with database id with === operator
    if ($user_id===$row['id']) {
        $user_username=$row['username'];
        $user_name=$row['name'];
        $user_email=$row['email'];
        $user_phone_no=$row['phone_no'];
        $user_country=$row['country'];
        $user_device_name=$row['device_name'];
        $user_device_model=$row['device_model'];
        $user_apertures=$row['apertures'];
        $user_resolution=$row['resolution'];
        $user_focal_length=$row['focal_length'];
    }
    else{
        header("Location:login.php");
        exit();
    }
}
else{
    header("Location:login.php");
    exit();
}
?>