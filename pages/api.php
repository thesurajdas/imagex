<?php
    header('Content-Type: image/jpeg');
    $file=$_GET['image'];
    list($width,$height)=getimagesize($file);
    if(($width>=4000) OR ($height>=4000)){
        $nwidth=$width/10;
        $nhieght=$height/10;
    }
    elseif(($width>=3000) OR ($height>=3000)){
        $nwidth=$width/8;
        $nhieght=$height/8;
    }
    elseif(($width>=2000) OR ($height>=2000)){
        $nwidth=$width/6;
        $nhieght=$height/6;
    }
    elseif(($width>=1000) OR ($height>=1000)){
        $nwidth=$width/4;
        $nhieght=$height/4;
    }
    else{
        $nwidth=$width/2;
        $nhieght=$height/2;
    }
    $newimage=imagecreatetruecolor($nwidth,$nhieght);
    $source=imagecreatefromjpeg($file);
    imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nhieght,$width,$height);
    imagejpeg($newimage);
?>