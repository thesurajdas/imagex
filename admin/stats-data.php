<?php
    require('../connect.php');
    if((isset($_GET['id'])) && ($_GET['id']=='i_chart')){        
        for($i=0;$i<=12;$i++){
            $num = $i;
            $n = sprintf("%02d", $num);
            // echo $n;
            $sql="SELECT * FROM images WHERE time LIKE '2021-$n%'";
            $result=$connect->query($sql);
            $data = array();
                if((!empty($result->num_rows)) && ($result->num_rows!=0)){
                    $data[] = $result->num_rows;
                    $result->close();
                    foreach($data as $value){
                        echo $value . ",";
                    }
                }
        }
    }
    elseif((isset($_GET['id'])) && ($_GET['id']=='u_chart')){        
        for($i=0;$i<=12;$i++){
            $num = $i;
            $n = sprintf("%02d", $num);
            // echo $n;
            $sql="SELECT * FROM users WHERE register_date LIKE '2021-$n%'";
            $result=$connect->query($sql);
            $data = array();
                if((!empty($result->num_rows)) && ($result->num_rows!=0)){
                    $data[] = $result->num_rows;
                    $result->close();
                    foreach($data as $value){
                        echo $value . ",";
                    }
                }
        }
    }
    else{
        for($i=0;$i<=12;$i++){
            $num = $i;
            $n = sprintf("%02d", $num);
            // echo $n;
            $sql="SELECT * FROM users WHERE register_date LIKE '2021-$n%'";
            $result=$connect->query($sql);
            $data = array();
                if((!empty($result->num_rows)) && ($result->num_rows!=0)){
                    $data[] = $result->num_rows;
                    $result->close();
                    foreach($data as $value){
                        echo $value . ",";
                    }
                }
        }
    }
?>