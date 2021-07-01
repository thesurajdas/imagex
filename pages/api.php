<?php
    // header('Content-Type: image/jpeg');
    // if(stripos($_GET['image'],'.png')){
    //     $img=imagecreatefrompng($_GET['image']);
    // }
    // elseif((stripos($_GET['image'],'.jpg')) or (stripos($_GET['image'],'.jpeg'))){
    //     $img=imagecreatefromjpeg($_GET['image']);
    // }
    // else{
    //     $img=imagecreatefromgif($_GET['image']);
    // }
    // $imageresize=imagescale($img,$_GET['w'],$_GET['h'],IMG_BICUBIC_FIXED);
    // imagejpeg($imageresize);
    // imagedestroy($img);
    // imagedestroy($imageresize);

    header('Content-Type: image/jpeg');
    $file=$_GET['image'];
    list($width,$height)=getimagesize($file);
    // $nwidth=$_GET['w'];
    // $nhieght=$_GET['h'];
    $nwidth=$width/4;
    $nhieght=$height/4;
    $newimage=imagecreatetruecolor($nwidth,$nhieght);
    $source=imagecreatefromjpeg($file);
    imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nhieght,$width,$height);
    imagejpeg($newimage);
?>