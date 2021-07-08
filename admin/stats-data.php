<?php
    require('../connect.php');
    $sql="SELECT * FROM chart;";
    $result=$connect->query($sql);
    $data = array();
    foreach ($result as $row) {
        $data[] = $row['up_data'];
    }
    $result->close();
    // print json_encode($data);
    foreach($data as $value){
        echo $value . ",";
    }
?>