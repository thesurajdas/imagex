<?php
//create connection
 require('../connect.php');
//Check only non-login users and redirect them to login page.
if(isset($_COOKIE['user_id'])){
    //Decode login cookie
    $user_id=$_COOKIE['user_id'];
    $user_id=convert_uudecode($user_id);
    //Get Data from SQL
    $sql="SELECT * FROM users WHERE id='".$user_id."';";
    $result=$connect->query($sql);
    $row=$result->fetch_assoc();
    //Check cookie id with database id with === operator
    if ($user_id===$row['id']) {
        $id=$row['id'];
        $user_username=$row['username'];
        $user_name=$row['name'];
        $user_email=$row['email'];
        //Add last active date
        $last_active=date("Y-m-d");
        $sql2="UPDATE users SET last_active='$last_active' WHERE id='$id';";
        $connect->query($sql2);
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