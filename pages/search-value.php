<?php
    require('../connect.php');
    if (isset($_GET['q'])) {
        $query=$_GET['q'];
        $output="";
        $output.='<a href="'.$site_url.'/pages/search.php?q='.strtolower($query).'" class="dropdown-item" "><i class="fad fa-search"></i> '.strtolower($query)."</a>";
        $sql="SELECT DISTINCT(title) FROM images WHERE visibility=0 AND title LIKE '%{$query}%' LIMIT 7";
        $result=$connect->query($sql);
        $output.='';
        if ($result->num_rows>0) {
            while ($row=$result->fetch_assoc()) {
        $output.='<a href="'.$site_url.'/pages/search.php?q='.strtolower($row['title']).'" class="dropdown-item" "><i class="fad fa-search" style="color: #3654a9; font-size: 13px"></i> '.strtolower($row['title'])."</a>";
    }
    $output.='<div class="dropdown-divider"></div><a class="dropdown-item" style="color: green; font-weight: 600;" href="'.$site_url.'/pages/search.php?q='.strtolower($query).'"><i class="fad fa-search-plus"></i> More Results</a>';
}
echo $output;
}
?>