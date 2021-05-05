<?php
        //Create Database Connection
        $db_host="localhost";
        $db_user="root";
        $db_password="";
        $db_name="imagex";
        $connect= new mysqli($db_host,$db_user,$db_password,$db_name);

        //Check Database Connection
        if ($connect->connect_error) {
            die ("Failed to connect!");
        }
?>