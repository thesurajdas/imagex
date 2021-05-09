<?php
//Hide All Error Reporting
// error_reporting(0);
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
    if ($user_id==$row['id']) {
        $user_name=$row['username'];
        $user_email=$row['email'];
        $user_city=$row['city'];
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