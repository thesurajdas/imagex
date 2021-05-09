<?php
    setcookie("user_id", "", time() - 3600);
    header('location: pages/login.php');
    exit();
?>