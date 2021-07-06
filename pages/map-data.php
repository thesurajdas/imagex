<?php
function get_image_location($image = ''){
    $exif = exif_read_data($image, 0, true);
    if($exif && isset($exif['GPS'])){
        $GPSLatitudeRef = $exif['GPS']['GPSLatitudeRef'];
        $GPSLatitude    = $exif['GPS']['GPSLatitude'];
        $GPSLongitudeRef= $exif['GPS']['GPSLongitudeRef'];
        $GPSLongitude   = $exif['GPS']['GPSLongitude'];
        
        $lat_degrees = count($GPSLatitude) > 0 ? gps2Num($GPSLatitude[0]) : 0;
        $lat_minutes = count($GPSLatitude) > 1 ? gps2Num($GPSLatitude[1]) : 0;
        $lat_seconds = count($GPSLatitude) > 2 ? gps2Num($GPSLatitude[2]) : 0;
        
        $lon_degrees = count($GPSLongitude) > 0 ? gps2Num($GPSLongitude[0]) : 0;
        $lon_minutes = count($GPSLongitude) > 1 ? gps2Num($GPSLongitude[1]) : 0;
        $lon_seconds = count($GPSLongitude) > 2 ? gps2Num($GPSLongitude[2]) : 0;
        
        $lat_direction = ($GPSLatitudeRef == 'W' or $GPSLatitudeRef == 'S') ? -1 : 1;
        $lon_direction = ($GPSLongitudeRef == 'W' or $GPSLongitudeRef == 'S') ? -1 : 1;
        
        $latitude = $lat_direction * ($lat_degrees + ($lat_minutes / 60) + ($lat_seconds / (60*60)));
        $longitude = $lon_direction * ($lon_degrees + ($lon_minutes / 60) + ($lon_seconds / (60*60)));

        return array('latitude'=>$latitude, 'longitude'=>$longitude);
    }else{
        return false;
    }
}

function gps2Num($coordPart){
    $parts = explode('/', $coordPart);
    if(count($parts) <= 0)
    return 0;
    if(count($parts) == 1)
    return $parts[0];
    return floatval($parts[0]) / floatval($parts[1]);
}

require('../connect.php');
$sql = "SELECT * FROM images WHERE visibility=0";
$result = $connect->query($sql);

echo "const imgList=[";
$data=array();
if($result->num_rows>0){
    while ($row = $result->fetch_assoc()) {
        $id = $row['image_id'];
        $iurl = $site_url."/pages/image.php?id=".$id;
        $title = $row['title'];
        $url = $row['image_location'];
        $img_url = $site_url.$url;
        $imgLocation = get_image_location($img_url);
        if(!empty($imgLocation)){
            $imgLat = $imgLocation['latitude'];
            $imgLng = $imgLocation['longitude'];
            echo '{
                "type": "Feature",
                "geometry": {
                  "type": "Point",
                  "coordinates": ['.$imgLng.', '.$imgLat.']
                },
                "properties": {
                  "iurl": "'.$iurl.'",
                  "title": "'.$title.'",
                  "url": "'.$img_url.'"
                }
              },';
        }
    }
}
echo "];";
?>