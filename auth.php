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
        $last_active=$row['last_active'];
        //Get stats Table data
        $today_date=date('Y-m-d');
        $sql_stats="SELECT * FROM stats WHERE id=1;";
        $result_stats=$connect->query($sql_stats);
        $r_stats=$result_stats->fetch_assoc();
        $stats_date=$r_stats['date'];
        //Today date
        $today_date=date('Y-m-d');
        //check today with stats date
        if ($today_date!=$stats_date) {
            $sql="UPDATE stats SET date='$today_date',today_active_users=0";
            $connect->query($sql);
        }
        //check last active and update
        if ($last_active!=$today_date) {
            $sql1="UPDATE stats SET today_active_users=today_active_users+1 WHERE id=1;";
            $connect->query($sql1);
            //Update last active user
            $sql2="UPDATE users SET last_active='$today_date' WHERE id='$id';";
            $connect->query($sql2);  
        }
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