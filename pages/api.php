<?php
    if(stripos($_GET['image'],'.png')){
        $img=imagecreatefrompng($_GET['image']);
    }
    elseif((stripos($_GET['image'],'.jpg')) or (stripos($_GET['image'],'.jpeg'))){
        $img=imagecreatefromjpeg($_GET['image']);
    }
    else{
        $img=imagecreatefromgif($_GET['image']);
    }
    $imageresize=imagescale($img,$_GET['w'],$_GET['h'],IMG_BICUBIC_FIXED);
    header('Content-Type: image/jpeg');
    imagejpeg($imageresize);
    imagedestroy($img);
    imagedestroy($imageresize);
?>