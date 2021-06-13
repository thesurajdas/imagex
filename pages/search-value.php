<?php
    require('../connect.php');
    if (isset($_GET['q'])) {
        $query=$_GET['q'];
        $output="";
        $sql="SELECT DISTINCT(title) FROM images WHERE title LIKE '%{$query}%' LIMIT 5";
        $result=$connect->query($sql);
        $output.='';
        if ($result->num_rows>0) {
            while ($row=$result->fetch_assoc()) {
        $output.='<a href="?q='.$row['title'].'" class="list-group-item list-group-item-action border-1">'.$row['title']."</a>";
            }
        }
        else{
            $output.="<p class='list-group-item list-group-item-action border-1'>No Data Found!</p>";
        }
        $output.="";
        echo $output;
    }
?>