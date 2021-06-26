<?php
    require('../auth.php');
	if (isset($_POST['upload'])) {
        if (($_FILES['file']=="")||($_POST['title']=="")||($_POST['filetype']=="")||($_POST['visibility']=="")) {
            echo "<script>alert('All fields are required!');</script>";
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
                $image_size=$file['size'];
                $title=$_POST['title'];
                $visibility=0;
                if ($_POST['visibility']=='Private') {
                    $visibility=1;
                }
                $category=$_POST['filetype'];
                //check file size
                if (($file['size']>=100000) && ($file['size']<=5242880)) {
                    //Check file extention and upload
                    if (in_array($file_ext_check,$vaild_file_ext)) {
                        $sql="INSERT INTO images (user_id, image_id, image_size, title, visibility, time, image_location, category) VALUES('$id','$image_id', '$image_size','$title','$visibility','$time','$image_location','$category')";
                        if(($connect->query($sql)==1) && (move_uploaded_file($_FILES['file']['tmp_name'],$upload_location)==1)){
                                echo "<script>alert('Uploaded Successfully!')</script>";
                        }
                        else{
                            echo "<script>alert('Unable to store the file!')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Invaild file extention!')</script>";
                    }
                }
                else{
                    echo "<script>alert('We allow only 100KB to 5MB Files!')</script>";
                }
            }
            else{
                echo "<script>alert('Something went wrong!')</script>";
            }
        }
	}
?>