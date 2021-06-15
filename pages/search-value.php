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
        $output.='<a href="'.$site_url.'/pages/search.php?q='.strtolower($row['title']).'" class="dropdown-item" "><i class="far fa-search"></i> '.strtolower($row['title'])."</a>";
            }
        }
        else{
            $output.="<p class='dropdown-item''>No Data Found!</p>";
        }
        $output.="";
        echo $output;
    }
?>