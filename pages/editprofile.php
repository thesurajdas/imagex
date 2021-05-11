<?php
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

    //Save Personal Details
    //Check Signup Input
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
            $phone_no="N\A";
            $phone_no=$connect->real_escape_string($_REQUEST['phone_no']);
            $name=$connect->real_escape_string($_REQUEST['name']);
            $gender=$connect->real_escape_string($_REQUEST['gender']);
            $birth_date=$connect->real_escape_string($_REQUEST['birth_date']);
            $country=$connect->real_escape_string($_REQUEST['country']);
            $city=$connect->real_escape_string($_REQUEST['city']);
            $zip_code="N/A";
            $zip_code=$connect->real_escape_string($_REQUEST['zip_code']);
            $role=$connect->real_escape_string($_REQUEST['role']);
  
            //Update Data into table
            $sql="UPDATE users SET phone_no='$phone_no', name='$name', gender='$gender', birth_date='$birth_date', country='$country', city='$city', zip_code='$zip_code', role='$role' WHERE id='$id';";
            if ($connect->query($sql)===TRUE) {
                echo "<script>alert('Profile Details Updated Successfully!');</script>";
            }
            else{
                echo "<script>alert('Unable to update the details!');</script>";
            }
          }
        }
        else{
          echo "<script>alert('Wrong Submit Method!');</script>";
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Personal Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!---<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>-->
        <link href="../css/editprofile.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/datepicker.css">
        <script src="js/datetimepicker.js"></script>

            <!-------bootstrap css custom styling -> (OVERRIDE) <- --------------------->
        <style>
            .dropleft .dropdown-toggle::before{
                border-right: 0;
            }
        </style>
        <script>

			$(function() {
			    $('.dates #user1').datepicker({
                    'format': 'yyyy-mm-dd',
                    'autoclose': true
			    });


		    });
		</script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    </head>
    <body>

        <!----------------------------------------------header/ nav section ------------------------------>

        <header>
            <nav class="navbar shadow-lg p-1 mb-5 bg-white rounded fixed-top navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">Gallery</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php" tabindex="-1" aria-disabled="true">Home</a>
                        </li>
                        <li class="nav-item dropdown border-right-0">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="nature.php">Nature</a>
                                <a class="dropdown-item" href="potrait.php">Potraite</a>
                                <a class="dropdown-item" href="landscape.php">Landscape</a>
                                <a class="dropdown-item" href="astro.php">Astro</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="trendings.php" tabindex="-1" aria-disabled="true">Trending</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="logsign.php"><button type="button" class="btn btn-outline-warning">LogIn/SignUP</button></a>
                        </li> -->
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn btn-outline-info my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="upload.php" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-outline-success"><i class="bi bi-cloud-arrow-up"></i></button></a>
                        </li>
                        <li class="nav-item dropleft text-decoration-none">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning"><img class="logp rounded-circle" src="https://picsum.photos/id/237/200/300" alt=""></button></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php">Account</a>
                                <a class="dropdown-item" href="editprofile.php">Edit Profile</a>
                                <a class="dropdown-item" href="favimg.php">Saved Images</a>
                                <a class="dropdown-item" href="usruploadimg.php">Your Uploads</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">SignOff</a>
                            </div>
                        </li>
                        <li class="nav-item dropleft text-decoration-none">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-outline-warning"><i class="bi bi-emoji-expressionless-fill"></button></i></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="logsign.php">Sign In</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logsign.php">Sign UP</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <!-------------------------------------------Form section--------------------------->

        <div class="container fstcon">
            <div class="card shadow">
                <h4 class="mtxt">Personal Details</h4>
                <hr class="mb-4">
                <form class="mfrm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputFyllName"><i class="fas fa-signature"></i> Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Full Name" minlength="3" maxlength="30" value="<?php echo $user_name; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputFyllName"><i class="fas fa-user"></i> Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" minlength="5" maxlength="60" value="<?php echo $user_username; ?>" onkeypress="return AvoidSpace(event)" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email"><i class="fas fa-at"></i> Email</label>
                            <input type="text" name="email" class="form-control" placeholder="example@mail.com" value="<?php echo $user_email; ?>" maxlength="30" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState"><i class="fas fa-user-cog"></i> Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="Male" <?php $select="Male"; if(isset($select) && $select!=""){ if($user_gender==$select){ echo "selected"; }} ?>>Male</option>
                                <option value="Female" <?php $select="Female"; if(isset($select) && $select!=""){ if($user_gender==$select){ echo "selected"; }} ?>>Female</option>
                                <option value="Others" <?php $select="Others"; if(isset($select) && $select!=""){ if($user_gender==$select){ echo "selected"; }} ?>>Others</option>
                            </select>
                        </div>      
                        <!--<div class="form-group col-md-6">
                            <label for="inputPassword6">Password <i class="bi bi-file-lock2"></i></label>
                            <input type="password" class="form-control" id="inputPassword6" placeholder="********">
                        </div>-->
                        <div class="form-group col-md-4">
                            <label for="phone"><i class="fas fa-phone-volume"></i> Phone Number (Optional)</label>
                            <input type="tel" name="phone_no" class="form-control" placeholder="1234567890" value="<?php echo $user_phone_no; ?>">
                        </div>
                        <div class="form-group dates col-md-4">
                            <label for="picker"><i class="far fa-calendar-alt"></i> Date Of Birth</label>
                            <input type="date" name="birth_date" autocomplete="off" class="form-control" placeholder="yyyy-mm-dd" value="<?php echo $user_birth_date; ?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState"><i class="far fa-flag"></i> Country</label>
                            <select name="country" class="form-control" required>
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
                            <label for="inputCity"><i class="fas fa-city"></i> City</label>
                            <input type="text" name="city" class="form-control" maxlength="15" placeholder="Florida" value="<?php echo $user_city; ?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip"><i class="fa fa-address-card" aria-hidden="true"></i> Zip Code (Optional)</label>
                            <input type="text" name="zip_code" class="form-control" placeholder="700001" maxlength="6" id="inputZip" value="<?php echo $user_zip_code; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState"><i class="fas fa-user-cog"></i> Account Type</label>
                            <select name="role" class="form-control" required>
                                <option value="Viewer" <?php $select="Viewer"; if(isset($select) && $select!=""){ if($user_role==$select){ echo "selected"; }} ?>>Viewer</option>
                                <option value="Uploader" <?php $select="Uploader"; if(isset($select) && $select!=""){ if($user_role==$select){ echo "selected"; }} ?>>Uploader</option>
                                <option value="Photographer & Uploader" <?php $select="Photographer & Uploader"; if(isset($select) && $select!=""){ if($user_role==$select){ echo "selected"; }} ?>>Photographer & Uploader</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row smit justify-content-between">
                        <button type="submit" class="btn btn-primary" name="psave">Save Changes</button>
                    </form>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Change Password</button>
                    </div>
                
            </div>
        </div>    

        <!------------------------------------------device description-------------------------------------->

        <div class="container sndcon">
            <div class="card shadow">
            <h4 class="col-12 ntxt">Device Detailes <small>(Device Use for Capturing Pictures)</small></h4>
                <hr class="mb-4">
                <form class="mfrm" action="/">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="mobileName"><i class="fas fa-mobile-alt"></i> Device Name</label>
                            <input type="text" id="mobileName" class="form-control" maxlength="25" placeholder="Pixel 2">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobileModel">Device Model <small class="badge badge-primary text-wrap">(Check About Device Section)</small></label>
                            <input type="text" class="form-control" id="mobileModel" maxlength="25" placeholder="G011A">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="mobileApertures"><b>ƒ</b> Apertures </label>
                            <input type="text" id="mobileApertures" class="form-control" maxlength="4" placeholder="1.7" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobileMp"><i class="fas fa-camera-retro"></i> Resolution <small>MP (Megapixel) </small></label>
                            <input type="text" class="form-control" id="mobileMp" maxlength="4" placeholder="64">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobileFocalLength"><i class="fas fa-question-circle"></i> Focal Length <small>(mm)</small></label>
                            <input type="text" class="form-control" id="mobileFocalLength" maxlength="4" placeholder="3.61">
                        </div>
                    </div>
                    <div class="form-row smit">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>       
        <!-----------------------------------footer--------------------------------------->
        <footer>
            <div class="bg-light text-dark pt-5 pt-4">
                <div class="container">
                    <div class="row text-center text-md-left ">
                        <div class="col-md-3 col-lg-3 col-lx-3 mx-auto mt-3">
                            <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">About Us</h5>
                            <hrc class="mb-4">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro ipsum ipsam quibusdam molestias, vero perspiciatis ea cum sapiente in nesciunt tempore blanditiis beatae corrupti et suscipit commodi animi iste molestiae!</p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-lx-2 mx-auto mt-3">
                            <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">Quick Links</h5>
                            <hrc class="mb-4">
                                <p>
                                    <a href="#" class="text-dark" style="text-decoration: none;" >Your Account</a>
                                </p>
                                <p>
                                    <a href="#" class="text-dark" style="text-decoration: none;" >Favorites</a>
                                </p>
                                <p>
                                    <a href="#" class="text-dark" style="text-decoration: none;" >Uploads</a>
                                </p>
                                <p>
                                    <a href="#" class="text-dark" style="text-decoration: none;" >Trending</a>
                                </p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-lx-3 mx-auto mt-3">
                            <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">Connect With Us</h5>
                            <hrc class="mb-4">
                            <p>
                                <i class="bi bi-house mr-3" ></i>Short Address,pin-0000000
                                    
                            </p>
                            <p>
                                <i class="bi bi-envelope mr-3"></i>abc@xyz.com
                                    
                            </p>
                            <p>
                                <i class="bi bi-telephone-plus mr-3"></i>1234567890
                                    
                            </p>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="row d-flex justify-content-center">
                        <div>
                            <p>
                                Copyright © 2021 <strong class="text-info text-dark" style="text-decoration: none;">Gallery Name</strong> - All rights reserved
                            </p>
                        </div>
                    </div>
                    <!--<div class="row d-flex justify-content-center">
                        <div class="text-center ">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-dark" ><i class="bi bi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class= "text-dark" ><i class="bi bi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class=" text-dark" ><i class="fab bi bi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class=" text-dark" ><i class="bi bi-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>-->
                </div>
            <div>    
        </footer>
        
        <!----------------------------------------------------------------------------------------------------->

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
                    <form action="/">
                        <div class="form-group">
                            <label for="oldpassword">Old Password</label>
                            <input type="password" class="form-control" id="oldpassword" required>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Custom Javascript Functions -->
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