<?php
  require('../connect.php');
//IP Address Function with 
  function user_ip(){
    //whether ip is from share internet
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   
    {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
    {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from remote address
    else
    {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    return $ip_address;
}
    //Get aata from Geoplugin.net
    $ipdata = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip_address));
    if(!empty($ipdata)){
    $country=$ipdata->geoplugin_countryName;
    $city=$ipdata->geoplugin_city;
    }
    else{
      $country="Unkown";
      $city="Unkown";
    }
//Check only non-login users and redirect them to login page.
if(isset($_COOKIE['user_id'])){
  //Decode login cookie
  $user_id=$_COOKIE['user_id'];
  $user_id=convert_uudecode($user_id);
  //Get Data from SQL
  $sql="SELECT * FROM users WHERE id='".$user_id."'";
  $result=$connect->query($sql);
  $row=$result->fetch_assoc();
  //Check cookie id with database id with === operator
  if ($user_id===$row['id']) {
      header("Location:profile.php");
      exit();
  }
}

//Check Login Information
if (isset($_REQUEST['login'])) {
  if (($_SERVER['REQUEST_METHOD']=='POST')){
  $userid=$connect->real_escape_string($_REQUEST['userid']);
  $tmp_password=$connect->real_escape_string($_REQUEST['password']);
  $password=base64_encode($tmp_password);
  $sql="SELECT id,username,email,password FROM users WHERE (username='".$userid."' OR email='".$userid."') AND password='".$password."' LIMIT 1";
  $result=$connect->query($sql);
  $row=$result->fetch_assoc();
  $user_id=$row['id'];
  //Encode Cookie Value
  $user_id=convert_uuencode($user_id);
  //Check Row Exist or Not
      if ($result->num_rows==1) {
          //Add cookies
          $cookie_time=time()+60*60*24*365;
          setcookie("user_id",$user_id,$cookie_time,"/");
          header("Location:profile.php");
          exit();
      }
      else{
          echo "<script>alert('Invalid username or email or password!');</script>";
      }
  }
  else{
      echo "<script>alert('Wrong Login Method!');</script>";
  }
}

    //Check Signup Input
    if (isset($_REQUEST['register'])) {
      if ($_SERVER['REQUEST_METHOD']=='POST') {
        //Check Empty String
        if (($_REQUEST['username']=="")||($_REQUEST['email']=="")||($_REQUEST['name']=="")||($_REQUEST['password']=="")) {
          echo "<script>alert('All fields are required!');</script>";
        }
        else{
          //Take Form Input Securely
          $username=$connect->real_escape_string($_REQUEST['username']);
          $email=$connect->real_escape_string($_REQUEST['email']);
          $name=$connect->real_escape_string($_REQUEST['name']);
          $role="Viewer";
          $phone_no="N/A";
          // Remove all illegal characters from email
          $email = filter_var($email, FILTER_SANITIZE_EMAIL);
          $temp_password=$connect->real_escape_string($_REQUEST['password']);
          $password=base64_encode($temp_password);
          $ip=filter_var(user_ip(), FILTER_VALIDATE_IP);
          $register_date=date("Y-m-d");

          //Check Username and Email Exist or Not
          $usql="SELECT username FROM users WHERE username='$username'";
          $esql="SELECT email FROM users WHERE email='$email'";
          $u_result=$connect->query($usql);
          $e_result=$connect->query($esql);
          if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo "<script>alert('This is not a Vaild Email!');</script>";
          }
          elseif ($u_result->num_rows==1 && $e_result->num_rows==1) {
            echo "<script>alert('Username and Email Already Registered!');</script>";
          }
          elseif ($u_result->num_rows==1) {
            echo "<script>alert('Username Already Registered!');</script>";
          }
          elseif($e_result->num_rows==1){
            echo "<script>alert('Email Already Registered!');</script>";
          }
          else{
            //Insert Data into table
            $sql="INSERT INTO users (username,email,phone_no,password,name,register_date,country,city,role,ip_address) VALUES ('$username','$email','$password','$name','$register_date','$country','$city','$role','$ip')";
            if ($connect->query($sql)===TRUE) {
              echo "<script>alert('Account Created Successfully!');</script>";
              //Add cookies
              $cookie_time=time()+60*60*24*365;
              setcookie("user_id",$user_id,$cookie_time,"/");
              header("Location:profile.php");
              exit();
            }
            else{
              echo "<script>alert('Unable to create the account!');</script>";
            }
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="assets/js/fontawesomekit.js"></script>
    <link rel="stylesheet" href="../css/logsign.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="username" name="userid" placeholder="Username or Email" minlength="3" maxlength="60" onkeypress="return AvoidSpace(event)" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" id="password" minlength="5" maxlength="60" onkeypress="return AvoidSpace(event)" required/>
            </div>
            <input type="submit" name="login" value="Login" class="btn solid" />
            <!--<p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>-->
          </form>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="username" name="username" placeholder="Username" minlength="3" maxlength="32" onkeypress="return AvoidSpace(event)" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-user-tie"></i>
              <input type="text" name="name" placeholder="Full Name" minlength="5" maxlength="60" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" id="password" minlength="5" maxlength="60" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="cpassword" placeholder="Confirm Password" id="confirm_password" required/>
            </div>
            <input type="submit" name="register" class="btn" value="Sign up" />
            <!--<p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>-->
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
            <a href="../index.html"><button class="btn transparent">
              Home</a>
          </div>
          <img src="../uploads/website_images/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
            <a href="../index.html"><button class="btn transparent">
              Home</a>
            </button>
          </div>
          <img src="../uploads/website_images/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

<!-- Custom Javascript Functions -->
<script>
// Retype Password Checker
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
    <script src="../js/logsign.js"></script>
  </body>
</html>
