<?php
    require('../connect.php');
    if((isset($_GET['id'])) && ($_GET['id']=='i_chart')){        
        $sql="SELECT * FROM i_chart;";
        $result=$connect->query($sql);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row['i_data'];
        }
        $result->close();
        // print json_encode($data);
        foreach($data as $value){
            echo $value . ",";
        }
    }
    if((isset($_GET['id'])) && ($_GET['id']=='u_chart')){        
        $sql="SELECT * FROM u_chart;";
        $result=$connect->query($sql);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row['u_data'];
        }
        $result->close();
        // print json_encode($data);
        foreach($data as $value){
            echo $value . ",";
        }
    }
?>