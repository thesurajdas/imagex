<?php
    require('../auth.php');
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
    if (isset($_REQUEST['psave'])) {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            # code...
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
                        <div class="form-group col-md-6">
                            <label for="inputFyllName"><i class="fas fa-signature"></i> Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter Full Name" minlength="3" maxlength="30" value="<?php echo $user_name; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputFyllName"><i class="fas fa-user"></i> Username</label>
                            <input type="text" class="form-control" placeholder="Username" minlength="5" maxlength="60" value="<?php echo $user_username; ?>" onkeypress="return AvoidSpace(event)" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email"><i class="fas fa-at"></i> Email</label>
                            <input type="text" id="email" class="form-control" placeholder="example@mail.com" value="<?php echo $user_email; ?>" maxlength="30" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState"><i class="fas fa-user-cog"></i> Account Type</label>
                            <select id="inputState" class="form-control" required>
                                <option value="Viewer" <?php $select="Viewer"; if(isset($select) && $select!=""){ if($user_role==$select){ echo "selected"; }} ?>>Viewer</option>
                                <option value="Uploader" <?php $select="Uploader"; if(isset($select) && $select!=""){ if($user_role==$select){ echo "selected"; }} ?>>Uploader</option>
                                <option value="Photographer & Uploader" <?php $select="Photographer & Uploader"; if(isset($select) && $select!=""){ if($user_role==$select){ echo "selected"; }} ?>>Photographer & Uploader</option>
                            </select>
                        </div>        
                        <!--<div class="form-group col-md-6">
                            <label for="inputPassword6">Password <i class="bi bi-file-lock2"></i></label>
                            <input type="password" class="form-control" id="inputPassword6" placeholder="********">
                        </div>-->
                    </div>
                    <!--<div class="form-group">
                        <label for="inputAddress">Address <i class="bi bi-house"></i></label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="City Name Eg. St Petersburg" required>
                    </div>-->
                    <!--<div class="form-group">
                        <label for="inputAddress2">Address 2 <small>(Optional)</small></label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor (Optional)">
                    </div>-->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone"><i class="fas fa-phone-volume"></i> Phone Number (Optional)</label>
                            <input type="tel" id="phone" class="form-control" placeholder="1234567890" value="<?php echo $user_phone_no; ?>">
                        </div>
                        <div class="form-group dates col-md-4">
                            <label for="picker"><i class="far fa-calendar-alt"></i> Date Of Birth</label>
                            <input type="date" autocomplete="off" class="form-control" id="user1" placeholder="yyyy-mm-dd" value="<?php echo $user_birth_date; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="inputCity"><i class="fas fa-city"></i> City</label>
                            <input type="text" class="form-control" id="inputCity" maxlength="15" placeholder="Florida" value="<?php echo $user_city; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState"><i class="far fa-flag"></i> Country</label>
                            <select id="inputState" class="form-control" required>
                                <option value="Unkown" <?php $select="Unkown"; if($user_country==$select){ echo "selected"; } ?>>Choose...</option>
                                <option value="Afganistan" <?php $select="Afganistan"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Afghanistan</option>
                                <option value="Albania" <?php $select="Albania"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bonaire">Bonaire</option>
                                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Canary Islands">Canary Islands</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Channel Islands">Channel Islands</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Island">Cocos Island</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote DIvoire">Cote DIvoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curaco">Curacao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="East Timor">East Timor</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Ter">French Southern Ter</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Great Britain">Great Britain</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="India" <?php $select="India"; if(isset($select) && $select!=""){ if($user_country==$select){ echo "selected"; }} ?>>India</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea North">Korea North</option>
                                <option value="Korea Sout">Korea South</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Midway Islands">Midway Islands</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Nambia">Nambia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherland Antilles">Netherland Antilles</option>
                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                <option value="Nevis">Nevis</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau Island">Palau Island</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Phillipines">Philippines</option>
                                <option value="Pitcairn Island">Pitcairn Island</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                <option value="Republic of Serbia">Republic of Serbia</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="St Barthelemy">St Barthelemy</option>
                                <option value="St Eustatius">St Eustatius</option>
                                <option value="St Helena">St Helena</option>
                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                <option value="St Lucia">St Lucia</option>
                                <option value="St Maarten">St Maarten</option>
                                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                <option value="Saipan">Saipan</option>
                                <option value="Samoa">Samoa</option>
                                <option value="Samoa American">Samoa American</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Tahiti">Tahiti</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Erimates">United Arab Emirates</option>
                                <option value="United States of America">United States of America</option>
                                <option value="Uraguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City State">Vatican City State</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                <option value="Wake Island">Wake Island</option>
                                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zaire">Zaire</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip"><i class="fa fa-address-card" aria-hidden="true"></i> Zip Code</label>
                            <input type="text" class="form-control" placeholder="700001" maxlength="6" id="inputZip" value="<?php echo $user_zip_code; ?>">
                        </div>
                    </div>
                    <div class="form-row smit justify-content-between">
                        <button type="submit" class="btn btn-primary" name="psave">Save Changes</button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>    

        <!------------------------------------------device description-------------------------------------->

        <div class="container sndcon">
            <div class="card shadow">
                <h4 class="col-12 ntxt">Camera Details <small>(Optional)</small></h4>
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