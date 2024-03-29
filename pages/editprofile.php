<?php
    //Add databse connection
    require('../auth.php');
    $user_gender=$row['gender'];
    $user_phone_no=$row['phone_no'];
    $user_country=$row['country'];
    $user_city=$row['city'];
    $user_device_name=$row['device_name'];
    $user_device_model=$row['device_model'];
    $user_apertures=$row['apertures'];
    $user_resolution=$row['resolution'];
    $user_focal_length=$row['focal_length'];
    $user_role=$row['role'];
    $user_birth_date=$row['birth_date'];
    $user_zip_code=$row['zip_code'];
    $user_avatar=$row['avatar'];

    //Save Personal Details
    if (isset($_REQUEST['psave'])) {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
          //Check Empty String
          if (($_REQUEST['name']=="")||($_REQUEST['gender']=="")||($_REQUEST['birth_date']=="")||($_REQUEST['country']=="")||($_REQUEST['city']=="")||($_REQUEST['role']=="")) {
            echo "<script>alert('All fields are required!');</script>";
          }
          else{
            //Take Form Input Securely
            // $username=$connect->real_escape_string($_REQUEST['username']);
            // $email=$connect->real_escape_string($_REQUEST['email']);
            // $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $phone_no=$connect->real_escape_string($_REQUEST['phone_no']);
            $name=$connect->real_escape_string($_REQUEST['name']);
            $gender=$connect->real_escape_string($_REQUEST['gender']);
            $birth_date=$connect->real_escape_string($_REQUEST['birth_date']);
            $country=$connect->real_escape_string($_REQUEST['country']);
            $city=$connect->real_escape_string($_REQUEST['city']);
            $zip_code=$connect->real_escape_string($_REQUEST['zip_code']);
            $role=$connect->real_escape_string($_REQUEST['role']);
  
            //Update Data into table
            $sql="UPDATE users SET phone_no='$phone_no', name='$name', gender='$gender', birth_date='$birth_date', country='$country', city='$city', zip_code='$zip_code', role='$role' WHERE id='$id';";
            if ($connect->query($sql)===TRUE) {
                header("Location:editprofile.php?success=1#pd");
            }
            else{
                header("Location:editprofile.php?success=0#pd");
            }
          }
        }
        else{
          echo "<script>alert('Wrong Submit Method!');</script>";
        }
      }
    //Save Device Details
    if (isset($_REQUEST['dsave'])) {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //Take Form Input Securely
            $device_name=$connect->real_escape_string($_REQUEST['device_name']);
            $device_model=$connect->real_escape_string($_REQUEST['device_model']);
            $apertures=$connect->real_escape_string($_REQUEST['apertures']);
            $resolution=$connect->real_escape_string($_REQUEST['resolution']);
            $focal_length=$connect->real_escape_string($_REQUEST['focal_length']);
            //Update Data into table
            $sql="UPDATE users SET device_name='$device_name', device_model='$device_model', apertures='$apertures', resolution='$resolution', focal_length='$focal_length' WHERE id='$id';";
            if ($connect->query($sql)===TRUE) {
                echo "<script>alert('Device Details Updated Successfully!');</script>";
            }
            else{
                echo "<script>alert('Unable to update the details!');</script>";
            }
        }
        else{
          echo "<script>alert('Wrong Submit Method!');</script>";
        }
      }
      //Change Old Password
      if (isset($_REQUEST['pwsave'])) {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
          //Check Empty String
          if (($_REQUEST['opassword']=="")||($_REQUEST['npassword']=="")) {
            echo "<script>alert('All fields are required!');</script>";
          }
          else{
            //Take Form Input Securely
            $opassword=$connect->real_escape_string($_REQUEST['opassword']);
            $temp_password=$connect->real_escape_string($_REQUEST['npassword']);
            $sqli="SELECT password FROM users WHERE id='$id'";
            $result=$connect->query($sqli);
            $row=$result->fetch_assoc();
            $password=base64_decode($row['password']);     
            if ($password===$opassword) {
                //Insert Password into table
                $npassword=base64_encode($temp_password); 
                $sql="UPDATE users SET password='$npassword' WHERE id='$id'";
                if ($connect->query($sql)===TRUE){
                    echo "<script>alert('Password Changed Successfully!');</script>";
                }
                else{
                    echo "<script>alert('Unable to change the password!');</script>";
                }
            }
            else{
                echo "<script>alert('Old password does not matching!');</script>";
                }
            }
        }
        else{
          echo "<script>alert('Wrong Submit Method!');</script>";
        }
      }

//Upload Profile Picture
	$time=date('Y-m-d H:i:s');
	//Upload Image
	if (isset($_REQUEST['a-upload'])) {
        if ($_FILES['file']=="") {
            echo "<script>alert('Please select a profile picture!');</script>";
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
                $image_location="upload/profile/".$file_full_name;
                $upload_location="../upload/profile/".$file_full_name;
                //add extra data for database table
                $image_id=$file_name;
                $image_size=$file['size'];
                //check file size
                if (($file['size']>=100000) && ($file['size']<=5242880)) {
                    //Check file extention and upload
                    if (in_array($file_ext_check,$vaild_file_ext)) {
                        $sql="UPDATE users set avatar='$image_location' WHERE id='$id'";
                        if(($connect->query($sql)==1) && (move_uploaded_file($_FILES['file']['tmp_name'],$upload_location)==1)){
                                header("Location:editprofile.php?success-avatar=1#pp");
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
                header("Location:editprofile.php?success-avatar=0#pp");
            }
        }
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Profile</title>
        <!-- Favicon -->
		<link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
        <link rel="icon" href="../img/icon.png" type="image/x-icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/jquery-3.5.1.slim.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <link href="../css/editprofile.css" rel="stylesheet">

            <!-------bootstrap css custom styling -> (OVERRIDE) <- --------------------->
        <style>
            .dropleft .dropdown-toggle::before{
                border-right: 0;
            }
            .dropdown-toggle::after{
                border-top: 0;
            }
        </style>
        <script src="../js/fontawesome.js"></script>
    </head>
    <body>

        <!----------------------------------------------header/ nav section ------------------------------>

        <?php require_once('include/header.php'); ?>
        
        <!-------------------------------------------Form section--------------------------->
        <div class="container fstcon" id="pp">
            <div class="card shadow" style="padding-bottom: 20px; border-radius: 1.25rem; ">
                <h4 class="mtxt">Profile Picture</h4>
                <hr class="mb-4">
                <?php if((isset($_GET['success-avatar'])) && ($_GET['success-avatar']==1)){echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Profile Picture Updated Sueccssfully!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';} elseif((isset($_GET['success-avatar'])) && ($_GET['success-avatar']==0)){echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Something Went Wrong!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';} ?>
                <div class="col-sm-12">
                    <div class="pimg">
                        <img draggable="false" class="pdp" src="<?php echo $site_url."/".$user_avatar; ?>" onContextMenu="return false;">
                    </div>
                </div>
                <form class="mfrm" style="text-align: center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*">
                                    <label class="custom-file-label" style="border-radius: 1.25rem;" for="inputGroupFile01">Choose Profile Picture</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary bt" name="a-upload"><i class="fad fa-upload"></i> upload</button>
                </form>    
            </div>
        </div>    
        <!-- <div class="container sndcon">
            <div class="card shadow" style="padding-bottom: 20px; border-radius: 1.25rem;">
                <h4 class="mtxt">Profile WallPaper</h4>
                <hr class="mb-4">
                <div class="col-sm-12">
                    <div class="pimg">
                        <img draggable="false" class="pwp img-fluid" src="../upload/images/93a3ec6d33.jpg" onContextMenu="return false;">
                    </div>
                </div>
                <form class="mfrm" style="text-align: center" action="" method="POST" >
                    <div class="form-row">
                        <div class="form-group col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*">
                                    <label class="custom-file-label" style="border-radius: 1.25rem;" for="inputGroupFile01">Choose WallPaper</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary bt" name="a-upload"><i class="fad fa-upload"></i> upload</button>
                </form>    
            </div>
        </div>     -->
        <div class="container sndcon" id="pd">
            <div class="card shadow" style="border-radius: 1.25rem;">
                <h4 class="mtxt">Personal Details</h4>
                <hr class="mb-4">
                <?php if((isset($_GET['success'])) && ($_GET['success']==1)){echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Profile Details Updated Sueccssfully!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';} elseif((isset($_GET['success'])) && ($_GET['success']==0)){echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Something Went Wrong!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';} ?>
                <form class="mfrm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputFyllName"><i class="fad fa-signature"></i> Full Name</label>
                            <input type="text" name="name" class="form-control bt" placeholder="Enter Full Name" minlength="3" maxlength="30" value="<?php echo $user_name; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputFyllName"><i class="fad fa-user-tie"></i> Username</label>
                            <input type="text" name="username" class="form-control bt" placeholder="Username" minlength="5" maxlength="60" value="<?php echo $user_username; ?>" onkeypress="return AvoidSpace(event)" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email"><i class="fad fa-at"></i> Email</label>
                            <input type="text" name="email" class="form-control bt" placeholder="example@mail.com" value="<?php echo $user_email; ?>" maxlength="30" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState"><i class="fad fa-venus-mars"></i> Gender</label>
                            <select name="gender" class="form-control bt" required>
                                <option value="Male" <?php $select="Male"; if(isset($select) && $select!=""){ if($user_gender==$select){ echo "selected"; }} ?>>Male</option>
                                <option value="Female" <?php $select="Female"; if(isset($select) && $select!=""){ if($user_gender==$select){ echo "selected"; }} ?>>Female</option>
                                <option value="Others" <?php $select="Others"; if(isset($select) && $select!=""){ if($user_gender==$select){ echo "selected"; }} ?>>Others</option>
                            </select>
                        </div>      
                        <!--<div class="form-group col-md-6">
                            <label for="inputPassword6">Password <i class="bi bi-file-lock2"></i></label>
                            <input type="password" class="form-control bt" id="inputPassword6" placeholder="********">
                        </div>-->
                        <div class="form-group col-md-4">
                            <label for="phone"><i class="fad fa-phone-volume"></i> Phone Number (Optional)</label>
                            <input type="tel" name="phone_no" class="form-control bt" placeholder="1234567890" value="<?php echo $user_phone_no; ?>">
                        </div>
                        <div class="form-group dates col-md-4">
                            <label for="picker"><i class="fad fa-calendar-edit"></i> Date Of Birth</label>
                            <input type="date" name="birth_date" autocomplete="off" class="form-control bt" placeholder="yyyy-mm-dd" value="<?php echo $user_birth_date; ?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState"><i class="fad fa-globe-asia"></i> Country</label>
                            <select name="country" class="form-control bt" required>
                                <option value="Unkown" <?php $select="Unkown"; if($user_country==$select){ echo "selected"; } ?>>Choose...</option>
                                <option value="Afganistan" <?php $select="Afganistan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Afghanistan</option>
                                <option value="Albania" <?php $select="Albania"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Albania</option>
                                <option value="Algeria" <?php $select="Algeria"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Algeria</option>
                                <option value="American Samoa" <?php $select="American Samoa"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>American Samoa</option>
                                <option value="Andorra" <?php $select="Andorra"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Andorra</option>
                                <option value="Angola" <?php $select="Angola"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Angola</option>
                                <option value="Anguilla" <?php $select="Anguilla"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Anguilla</option>
                                <option value="Antigua & Barbuda" <?php $select="Antigua & Barbuda"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Antigua & Barbuda</option>
                                <option value="Argentina" <?php $select="Argentina"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Argentina</option>
                                <option value="Armenia" <?php $select="Armenia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Armenia</option>
                                <option value="Aruba" <?php $select="Aruba"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Aruba</option>
                                <option value="Australia" <?php $select="Australia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Australia</option>
                                <option value="Austria" <?php $select="Austria"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Austria</option>
                                <option value="Azerbaijan" <?php $select="Azerbaijan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Azerbaijan</option>
                                <option value="Bahamas" <?php $select="Bahamas"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Bahamas</option>
                                <option value="Bahrain" <?php $select="Bahrain"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Bahrain</option>
                                <option value="Bangladesh" <?php $select="Bangladesh"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Bangladesh</option>
                                <option value="Barbados" <?php $select="Barbados"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Barbados</option>
                                <option value="Belarus" <?php $select="Belarus"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Belarus</option>
                                <option value="Belgium" <?php $select="Belgium"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Belgium</option>
                                <option value="Belize" <?php $select="Belize"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Belize</option>
                                <option value="Benin" <?php $select="Benin"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Benin</option>
                                <option value="Bermuda" <?php $select="Bermuda"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Bermuda</option>
                                <option value="Bhutan" <?php $select="Bhutan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Bhutan</option>
                                <option value="Bolivia" <?php $select="Bolivia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Bolivia</option>
                                <option value="Bonaire" <?php $select="Bonaire"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Bonaire</option>
                                <option value="Bosnia & Herzegovina" <?php $select="Bosnia & Herzegovina"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Bosnia & Herzegovina</option>
                                <option value="Botswana" <?php $select="Botswana"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Botswana</option>
                                <option value="Brazil" <?php $select="Brazil"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Brazil</option>
                                <option value="British Indian Ocean Ter" <?php $select="British Indian Ocean Ter"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>British Indian Ocean Ter</option>
                                <option value="Brunei" <?php $select="Brunei"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Brunei</option>
                                <option value="Bulgaria" <?php $select="Bulgaria"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Bulgaria</option>
                                <option value="Burkina Faso" <?php $select="Burkina Faso"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Burkina Faso</option>
                                <option value="Burundi" <?php $select="Burundi"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Burundi</option>
                                <option value="Cambodia" <?php $select="Cambodia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Cambodia</option>
                                <option value="Cameroon" <?php $select="Cameroon"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Cameroon</option>
                                <option value="Canada" <?php $select="Canada"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Canada</option>
                                <option value="Canary Islands" <?php $select="Canary Islands"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Canary Islands</option>
                                <option value="Cape Verde" <?php $select="Cape Verde"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Cape Verde</option>
                                <option value="Cayman Islands" <?php $select="Cayman Islands"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Cayman Islands</option>
                                <option value="Central African Republic" <?php $select="Central African Republic"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Central African Republic</option>
                                <option value="Chad" <?php $select="Chad"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Chad</option>
                                <option value="Channel Islands" <?php $select="Channel Islands"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Channel Islands</option>
                                <option value="Chile" <?php $select="Chile"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Chile</option>
                                <option value="China" <?php $select="China"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>China</option>
                                <option value="Christmas Island" <?php $select="Christmas Island"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Christmas Island</option>
                                <option value="Cocos Island" <?php $select="Cocos Island"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Cocos Island</option>
                                <option value="Colombia" <?php $select="Colombia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Colombia</option>
                                <option value="Comoros" <?php $select="Comoros"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Comoros</option>
                                <option value="Congo" <?php $select="Congo"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Congo</option>
                                <option value="Cook Islands" <?php $select="Cook Islands"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Cook Islands</option>
                                <option value="Costa Rica" <?php $select="Costa Rica"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Costa Rica</option>
                                <option value="Cote DIvoire" <?php $select="Cote DIvoire"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Cote DIvoire</option>
                                <option value="Croatia" <?php $select="Croatia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Croatia</option>
                                <option value="Cuba" <?php $select="Cuba"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Cuba</option>
                                <option value="Curaco" <?php $select="Curaco"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Curacao</option>
                                <option value="Cyprus" <?php $select="Cyprus"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Cyprus</option>
                                <option value="Czech Republic" <?php $select="Czech Republic"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Czech Republic</option>
                                <option value="Denmark" <?php $select="Denmark"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Denmark</option>
                                <option value="Djibouti" <?php $select="Djibouti"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Djibouti</option>
                                <option value="Dominica" <?php $select="Dominica"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Dominica</option>
                                <option value="Dominican Republic" <?php $select="Dominican Republic"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Dominican Republic</option>
                                <option value="East Timor" <?php $select="East Timor"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>East Timor</option>
                                <option value="Ecuador" <?php $select="Ecuador"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Ecuador</option>
                                <option value="Egypt" <?php $select="Egypt"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Egypt</option>
                                <option value="El Salvador" <?php $select="El Salvador"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>El Salvador</option>
                                <option value="Equatorial Guinea" <?php $select="Equatorial Guinea"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Equatorial Guinea</option>
                                <option value="Eritrea" <?php $select="Eritrea"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Eritrea</option>
                                <option value="Estonia" <?php $select="Estonia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Estonia</option>
                                <option value="Ethiopia" <?php $select="Ethiopia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Ethiopia</option>
                                <option value="Falkland Islands" <?php $select="Falkland Islands"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Falkland Islands</option>
                                <option value="Faroe Islands" <?php $select="Faroe Islands"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Faroe Islands</option>
                                <option value="Fiji" <?php $select="Fiji"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Fiji</option>
                                <option value="Finland" <?php $select="Finland"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Finland</option>
                                <option value="France" <?php $select="France"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>France</option>
                                <option value="French Guiana" <?php $select="French Guiana"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>French Guiana</option>
                                <option value="French Polynesia" <?php $select="French Polynesia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>French Polynesia</option>
                                <option value="French Southern Ter" <?php $select="French Southern Ter"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>French Southern Ter</option>
                                <option value="Gabon" <?php $select="Gabon"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Gabon</option>
                                <option value="Gambia" <?php $select="Gambia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Gambia</option>
                                <option value="Georgia" <?php $select="Georgia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Georgia</option>
                                <option value="Germany" <?php $select="Germany"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Germany</option>
                                <option value="Ghana" <?php $select="Ghana"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Ghana</option>
                                <option value="Gibraltar" <?php $select="Gibraltar"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Gibraltar</option>
                                <option value="Great Britain" <?php $select="Great Britain"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Great Britain</option>
                                <option value="Greece" <?php $select="Greece"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Greece</option>
                                <option value="Greenland" <?php $select="Greenland"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Greenland</option>
                                <option value="Grenada" <?php $select="Grenada"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Grenada</option>
                                <option value="Guadeloupe" <?php $select="Guadeloupe"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Guadeloupe</option>
                                <option value="Guam" <?php $select="Guam"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Guam</option>
                                <option value="Guatemala" <?php $select="Guatemala"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Guatemala</option>
                                <option value="Guinea" <?php $select="Guinea"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Guinea</option>
                                <option value="Guyana" <?php $select="Guyana"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Guyana</option>
                                <option value="Haiti" <?php $select="Haiti"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Haiti</option>
                                <option value="Hawaii" <?php $select="Hawaii"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Hawaii</option>
                                <option value="Honduras" <?php $select="Honduras"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Honduras</option>
                                <option value="Hong Kong" <?php $select="Hong Kong"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Hong Kong</option>
                                <option value="Hungary" <?php $select="Hungary"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Hungary</option>
                                <option value="Iceland" <?php $select="Iceland"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Iceland</option>
                                <option value="Indonesia" <?php $select="Indonesia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Indonesia</option>
                                <option value="India" <?php $select="India"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>India</option>
                                <option value="Iran" <?php $select="Iran"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Iran</option>
                                <option value="Iraq" <?php $select="Iraq"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Iraq</option>
                                <option value="Ireland" <?php $select="Ireland"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Ireland</option>
                                <option value="Isle of Man" <?php $select="Isle of Man"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Isle of Man</option>
                                <option value="Israel" <?php $select="Israel"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Israel</option>
                                <option value="Italy" <?php $select="Italy"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Italy</option>
                                <option value="Jamaica" <?php $select="Jamaica"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Jamaica</option>
                                <option value="Japan" <?php $select="Japan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Japan</option>
                                <option value="Jordan" <?php $select="Jordan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Jordan</option>
                                <option value="Kazakhstan" <?php $select="Kazakhstan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Kazakhstan</option>
                                <option value="Kenya" <?php $select="Kenya"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Kenya</option>
                                <option value="Kiribati" <?php $select="Kiribati"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Kiribati</option>
                                <option value="Korea North" <?php $select="Korea North"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Korea North</option>
                                <option value="Korea Sout" <?php $select="Korea Sout"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Korea South</option>
                                <option value="Kuwait" <?php $select="Kuwait"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Kuwait</option>
                                <option value="Kyrgyzstan" <?php $select="Kyrgyzstan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Kyrgyzstan</option>
                                <option value="Laos" <?php $select="Laos"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Laos</option>
                                <option value="Latvia" <?php $select="Latvia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Latvia</option>
                                <option value="Lebanon" <?php $select="Lebanon"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Lebanon</option>
                                <option value="Lesotho" <?php $select="Lesotho"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Lesotho</option>
                                <option value="Liberia" <?php $select="Liberia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Liberia</option>
                                <option value="Libya" <?php $select="Libya"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Libya</option>
                                <option value="Liechtenstein" <?php $select="Liechtenstein"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Liechtenstein</option>
                                <option value="Lithuania" <?php $select="Lithuania"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Lithuania</option>
                                <option value="Luxembourg" <?php $select="Luxembourg"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Luxembourg</option>
                                <option value="Macau" <?php $select="Macau"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Macau</option>
                                <option value="Macedonia" <?php $select="Macedonia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Macedonia</option>
                                <option value="Madagascar" <?php $select="Madagascar"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Madagascar</option>
                                <option value="Malaysia" <?php $select="Malaysia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Malaysia</option>
                                <option value="Malawi" <?php $select="Malawi"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Malawi</option>
                                <option value="Maldives" <?php $select="Maldives"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Maldives</option>
                                <option value="Mali" <?php $select="Mali"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Mali</option>
                                <option value="Malta" <?php $select="Malta"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Malta</option>
                                <option value="Marshall Islands" <?php $select="Marshall Islands"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Marshall Islands</option>
                                <option value="Martinique" <?php $select="Martinique"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Martinique</option>
                                <option value="Mauritania" <?php $select="Mauritania"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Mauritania</option>
                                <option value="Mauritius" <?php $select="Mauritius"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Mauritius</option>
                                <option value="Mayotte" <?php $select="Mayotte"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Mayotte</option>
                                <option value="Mexico" <?php $select="Mexico"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Mexico</option>
                                <option value="Midway Islands" <?php $select="Midway Islands"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Midway Islands</option>
                                <option value="Moldova" <?php $select="Moldova"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Moldova</option>
                                <option value="Monaco" <?php $select="Monaco"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Monaco</option>
                                <option value="Mongolia" <?php $select="Mongolia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Mongolia</option>
                                <option value="Montserrat" <?php $select="Montserrat"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Montserrat</option>
                                <option value="Morocco" <?php $select="Morocco"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Morocco</option>
                                <option value="Mozambique" <?php $select="Mozambique"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Mozambique</option>
                                <option value="Myanmar" <?php $select="Myanmar"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Myanmar</option>
                                <option value="Nambia" <?php $select="Nambia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Nambia</option>
                                <option value="Nauru" <?php $select="Nauru"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Nauru</option>
                                <option value="Nepal" <?php $select="Nepal"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Nepal</option>
                                <option value="Netherland Antilles" <?php $select="Netherland Antilles"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Netherland Antilles</option>
                                <option value="Netherlands" <?php $select="Netherlands"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Netherlands (Holland, Europe)</option>
                                <option value="Nevis" <?php $select="Nevis"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Nevis</option>
                                <option value="New Caledonia" <?php $select="New Caledonia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>New Caledonia</option>
                                <option value="New Zealand" <?php $select="New Zealand"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>New Zealand</option>
                                <option value="Nicaragua" <?php $select="Nicaragua"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Nicaragua</option>
                                <option value="Niger" <?php $select="Niger"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Niger</option>
                                <option value="Nigeria" <?php $select="Nigeria"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Nigeria</option>
                                <option value="Niue" <?php $select="Niue"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Niue</option>
                                <option value="Norfolk Island" <?php $select="Norfolk Island"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Norfolk Island</option>
                                <option value="Norway" <?php $select="Norway"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Norway</option>
                                <option value="Oman" <?php $select="Oman"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Oman</option>
                                <option value="Pakistan" <?php $select="Pakistan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Pakistan</option>
                                <option value="Palau Island" <?php $select="Palau Island"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Palau Island</option>
                                <option value="Palestine" <?php $select="Palestine"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Palestine</option>
                                <option value="Panama" <?php $select="Panama"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Panama</option>
                                <option value="Papua New Guinea" <?php $select="Papua New Guinea"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Papua New Guinea</option>
                                <option value="Paraguay" <?php $select="Paraguay"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Paraguay</option>
                                <option value="Peru" <?php $select="Peru"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Peru</option>
                                <option value="Phillipines" <?php $select="Phillipines"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Philippines</option>
                                <option value="Pitcairn Island" <?php $select="Pitcairn Island"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Pitcairn Island</option>
                                <option value="Poland" <?php $select="Poland"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Poland</option>
                                <option value="Portugal" <?php $select="Portugal"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Portugal</option>
                                <option value="Puerto Rico" <?php $select="Puerto Rico"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Puerto Rico</option>
                                <option value="Qatar" <?php $select="Qatar"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Qatar</option>
                                <option value="Republic of Montenegro" <?php $select="Republic of Montenegro"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Republic of Montenegro</option>
                                <option value="Republic of Serbia" <?php $select="Republic of Serbia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Republic of Serbia</option>
                                <option value="Reunion" <?php $select="Reunion"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Reunion</option>
                                <option value="Romania" <?php $select="Romania"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Romania</option>
                                <option value="Russia" <?php $select="Russia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Russia</option>
                                <option value="Rwanda" <?php $select="Rwanda"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Rwanda</option>
                                <option value="St Barthelemy" <?php $select="St Barthelemy"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>St Barthelemy</option>
                                <option value="St Eustatius" <?php $select="St Eustatius"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>St Eustatius</option>
                                <option value="St Helena" <?php $select="St Helena"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>St Helena</option>
                                <option value="St Kitts-Nevis" <?php $select="St Kitts-Nevis"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>St Kitts-Nevis</option>
                                <option value="St Lucia" <?php $select="St Lucia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>St Lucia</option>
                                <option value="St Maarten"<?php $select="St Maarten"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>St Maarten</option>
                                <option value="St Pierre & Miquelon" <?php $select="St Pierre & Miquelon"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>St Pierre & Miquelon</option>
                                <option value="St Vincent & Grenadines" <?php $select="St Vincent & Grenadines"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>St Vincent & Grenadines</option>
                                <option value="Saipan" <?php $select="Saipan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Saipan</option>
                                <option value="Samoa" <?php $select="Samoa"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Samoa</option>
                                <option value="Samoa American" <?php $select="Samoa American"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Samoa American</option>
                                <option value="San Marino" <?php $select="San Marino"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>San Marino</option>
                                <option value="Sao Tome & Principe" <?php $select="Sao Tome & Principe"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Sao Tome & Principe</option>
                                <option value="Saudi Arabia" <?php $select="Saudi Arabia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Saudi Arabia</option>
                                <option value="Senegal" <?php $select="Senegal"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Senegal</option>
                                <option value="Seychelles" <?php $select="Seychelles"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Seychelles</option>
                                <option value="Sierra Leone" <?php $select="Sierra Leone"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Sierra Leone</option>
                                <option value="Singapore" <?php $select="Singapore"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Singapore</option>
                                <option value="Slovakia" <?php $select="Slovakia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Slovakia</option>
                                <option value="Slovenia" <?php $select="Slovenia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Slovenia</option>
                                <option value="Solomon Islands" <?php $select="Solomon Islands"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Solomon Islands</option>
                                <option value="Somalia" <?php $select="Somalia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Somalia</option>
                                <option value="South Africa" <?php $select="South Africa"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>South Africa</option>
                                <option value="Spain" <?php $select="Spain"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Spain</option>
                                <option value="Sri Lanka" <?php $select="Sri Lanka"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Sri Lanka</option>
                                <option value="Sudan" <?php $select="Sudan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Sudan</option>
                                <option value="Suriname" <?php $select="Suriname"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Suriname</option>
                                <option value="Swaziland" <?php $select="Swaziland"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Swaziland</option>
                                <option value="Sweden" <?php $select="Sweden"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Sweden</option>
                                <option value="Switzerland" <?php $select="Switzerland"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Switzerland</option>
                                <option value="Syria" <?php $select="Syria"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Syria</option>
                                <option value="Tahiti" <?php $select="Tahiti"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Tahiti</option>
                                <option value="Taiwan" <?php $select="Taiwan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Taiwan</option>
                                <option value="Tajikistan" <?php $select="Tajikistan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Tajikistan</option>
                                <option value="Tanzania" <?php $select="Tanzania"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Tanzania</option>
                                <option value="Thailand" <?php $select="Thailand"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Thailand</option>
                                <option value="Togo" <?php $select="Togo"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Togo</option>
                                <option value="Tokelau" <?php $select="Tokelau"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Tokelau</option>
                                <option value="Tonga" <?php $select="Tonga"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Tonga</option>
                                <option value="Trinidad & Tobago" <?php $select="Trinidad & Tobago"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Trinidad & Tobago</option>
                                <option value="Tunisia" <?php $select="Tunisia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Tunisia</option>
                                <option value="Turkey" <?php $select="Turkey"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Turkey</option>
                                <option value="Turkmenistan" <?php $select="Turkmenistan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Turkmenistan</option>
                                <option value="Turks & Caicos Is" <?php $select="Turks & Caicos Is"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Turks & Caicos Is</option>
                                <option value="Tuvalu" <?php $select="Tuvalu"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Tuvalu</option>
                                <option value="Uganda" <?php $select="Uganda"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Uganda</option>
                                <option value="United Kingdom" <?php $select="United Kingdom"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>United Kingdom</option>
                                <option value="Ukraine" <?php $select="Ukraine"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Ukraine</option>
                                <option value="United Arab Erimates" <?php $select="United Arab Erimates"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>United Arab Emirates</option>
                                <option value="United States of America" <?php $select="United States of America"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>United States of America</option>
                                <option value="Uraguay" <?php $select="Uraguay"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Uruguay</option>
                                <option value="Uzbekistan" <?php $select="Uzbekistan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Uzbekistan</option>
                                <option value="Vanuatu" <?php $select="Vanuatu"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Vanuatu</option>
                                <option value="Vatican City State" <?php $select="Vatican City State"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Vatican City State</option>
                                <option value="Venezuela" <?php $select="Venezuela"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Venezuela</option>
                                <option value="Vietnam" <?php $select="Vietnam"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Vietnam</option>
                                <option value="Virgin Islands (Brit)" <?php $select="Virgin Islands (Brit)"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Virgin Islands (Brit)</option>
                                <option value="Virgin Islands (USA)" <?php $select="Virgin Islands (USA)"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Virgin Islands (USA)</option>
                                <option value="Wake Island" <?php $select="Wake Island"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Wake Island</option>
                                <option value="Wallis & Futana Is" <?php $select="Wallis & Futana Is"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Wallis & Futana Is</option>
                                <option value="Yemen" <?php $select="Yemen"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Yemen</option>
                                <option value="Zaire" <?php $select="Zaire"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Zaire</option>
                                <option value="Zambia" <?php $select="Zambia"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Zambia</option>
                                <option value="Zimbabwe" <?php $select="Zimbabwe"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Zimbabwe</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCity"><i class="fad fa-city"></i> City</label>
                            <input type="text" name="city" class="form-control bt" maxlength="15" placeholder="Florida" value="<?php echo $user_city; ?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip"><i class="fad fa-map-pin"></i> Zip Code (Optional)</label>
                            <input type="text" name="zip_code" class="form-control bt" placeholder="700001" maxlength="6" id="inputZip" value="<?php echo $user_zip_code; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState"><i class="fad fa-user-cog"></i> Account Type</label>
                            <select name="role" class="form-control bt" required>
                                <option value="Viewer" <?php $select="Viewer"; if(isset($select) && $select!=""){ if($user_role==$select){ echo "selected"; }} ?>>Viewer</option>
                                <option value="Uploader" <?php $select="Uploader"; if(isset($select) && $select!=""){ if($user_role==$select){ echo "selected"; }} ?>>Uploader</option>
                                <option value="Photographer & Uploader" <?php $select="Photographer & Uploader"; if(isset($select) && $select!=""){ if($user_role==$select){ echo "selected"; }} ?>>Photographer & Uploader</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row smit justify-content-between">
                    <button type="submit" class="btn btn-primary bt" name="psave"><i class="fad fa-check-circle"></i> Save Changes</button>
                </form>
                <button type="button" class="btn btn-success bt" data-toggle="modal" data-target="#exampleModal"><i class="fad fa-key"></i> Change Password</button>
            </div>     
            </div>    
        </div>    
        <!------------------------------------------device description-------------------------------------->

        <div class="container sndcon">
            <div class="card shadow" style="border-radius: 1.25rem;">
                <h4 class="col-12 ntxt">Device Details <small>(Device Use for Capturing Pictures)</small></h4>
                <hr class="mb-4">
                <form class="mfrm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="mobileName"><i class="fad fa-mobile-android-alt"></i> Device Name</label>
                            <input type="text" name="device_name" class="form-control bt" maxlength="25" placeholder="Pixel 2" value="<?php echo $user_device_name; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobileModel">Device Model <small class="badge badge-primary text-wrap">(Check About Device Section)</small></label>
                            <input type="text" name="device_model" class="form-control bt" maxlength="25" placeholder="G011A" value="<?php echo $user_device_model; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="mobileApertures"><b>ƒ</b> Apertures </label>
                            <input type="text" name="apertures" class="form-control bt" maxlength="4" placeholder="1.7" value="<?php echo $user_apertures; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobileMp"><i class="fad fa-camera-retro"></i> Resolution <small>MP (Megapixel) </small></label>
                            <input type="text" name="resolution" class="form-control bt" maxlength="4" placeholder="50" value="<?php echo $user_resolution; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobileFocalLength"><i class="fad fa-question-circle"></i> Focal Length <small>(mm)</small></label>
                            <input type="text" name="focal_length" class="form-control bt" maxlength="4" placeholder="3.61" value="<?php echo $user_focal_length; ?>">
                        </div>
                    </div>
                    <div class="form-row smit">
                        <button type="submit" name="dsave" class="btn btn-primary bt"><i class="fad fa-check-circle"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>       
        <!-----------------------------------footer--------------------------------------->
        <?php require_once('include/footer.php'); ?>
        
        <!--Password Change-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="form-group">
                                <label for="oldpassword">Old Password</label>
                                <input type="password" class="form-control bt" name="opassword" required>
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control bt" name="npassword" id="password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm New Password</label>
                                <input type="password" class="form-control bt" id="confirm_password" required>
                            </div>
                            <button type="submit" name="pwsave" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

          <!-- Custom Javascript Functions -->
            <script src="../js/bs-custom-file-input.js"></script>
            <script>
                $(document).ready(function () {
                    bsCustomFileInput.init()
                })
            </script>
            <script>
                    // Password Retype Password Checker
                    var password = document.getElementById("password")
                    , confirm_password = document.getElementById("confirm_password");
                function validatePassword(){
                    if(password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Passwords Don't Match");
                    } else {
                    confirm_password.setCustomValidity('');
                    }
                }
                password.onchange = validatePassword;
                confirm_password.onkeyup = validatePassword;
                //Space Remover from text input
                function AvoidSpace(event) {
                    var k = event ? event.which : window.event.keyCode;
                    if (k == 32) return false;
                }
            </script>
    </body>
</html>