<?php
//create connection
 require('../../../connect.php');
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
    if ($user_id===$row['id'] && $row['admin']==1) {
        $id=$row['id'];
        $user_username=$row['username'];
        $user_name=$row['name'];
        $user_email=$row['email'];
        $last_active=$row['last_active'];
        
    }
    else{
        header("Location: $site_url/pages/login.php");
        exit();
    }
}
else{
    header("Location: $site_url/pages/login.php");
    exit();
}
?>