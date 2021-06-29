<?php
    require('../auth.php');
    $upload = 'err';
	if (!empty($_FILES['file'])) {
        if (($_POST['title']=="")||($_POST['filetype']=="")||($_POST['visibility']=="")) {
            $upload = 'allr';
        }
        else{
                $file=$_FILES['file'];
            if ($file['error']==0) {
                $file_ext=explode('.',$file['name']);
                $file_name=strtolower(current($file_ext));
                $file_ext_check=strtolower(end($file_ext));
                $file_name=bin2hex(random_bytes(5));
                $file_full_name=$file_name.".".$file_ext_check;
                $vaild_file_ext=array('png','jpeg','jpg');
                $image_location="/upload/images/".$file_full_name;
                $upload_location="../upload/images/".$file_full_name;
                //add extra data for database table
                $image_id=$file_name;
                $time=$_POST['time'];
                $image_size=$file['size'];
                $title=$_POST['title'];
                $visibility=$_POST['visibility'];
                $category=$_POST['filetype'];
                //check file size
                if (($file['size']>=100000) && ($file['size']<=5242880)) {
                    //Check file extention and upload
                    if (in_array($file_ext_check,$vaild_file_ext)) {
                        $sql="INSERT INTO images (user_id, image_id, image_size, title, visibility, time, image_location, category) VALUES('$id','$image_id', '$image_size','$title','$visibility','$time','$image_location','$category')";
                        if(($connect->query($sql)==1) && (move_uploaded_file($_FILES['file']['tmp_name'],$upload_location)==1)){
                            $upload = 'ok';
                        }
                        else{
                            $upload = 'uper';
                        }
                    }
                    else{
                        $upload = 'fext';
                    }
                }
                else{
                    $upload = 'siz';
                }
            }
            else{
                $upload = 'sww';
            }
        }
	}
    echo $upload;
?>