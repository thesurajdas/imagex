<?php
    require('../connect.php');
    if (($_POST['name']!="") && ($_POST['email']!="") && ($_POST['msg']!="")) {
        $to="contact@localhost.com";
        $subject=$_POST['name'];
        $body=$_POST['msg']."<br><br> <b>Sending Details:</b><br>Name: ".$_POST['name']."<br>From: ".$_POST['email']." <br>Website: ".$site_url;
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .="From: contact@localhost.com";
        if (mail($to,$subject,$body,$headers)) {
           echo '<div class="alert alert-success">Message sent successfully!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button></div>
           </button>';
        }
        else{
            echo '<div class="alert alert-danger">Unable to send Message!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>';
        }
    }
?>