<?php
    require('../connect.php');
    if (($_POST['name']!="") && ($_POST['email']!="") && ($_POST['msg']!="")) {
        $to=$_POST['name'];
        $subject=$_POST['email'];
        $body=$_POST['msg'];
        $headers="From: imagex@localhost";
        if (mail($to,$subject,$body,$headers)) {
           echo "Message sent successfully!";
        }
        else{
            echo "Unable to send Message!";
        }
    }
?>