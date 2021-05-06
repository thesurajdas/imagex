<?php
  include('../connect.php');
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
    $state=$ipdata->geoplugin_region;
    $city=$ipdata->geoplugin_city;
    }
    else{
      $country="";
      $state="";
      $city="";
    }

    //Check Signup Input
    if (isset($_REQUEST['register'])) {
      if (($_SERVER['REQUEST_METHOD']=='POST')) {
        //Check Empty String
        if (($_REQUEST['username']=="")||($_REQUEST['email']=="")||($_REQUEST['password']=="")) {
          echo "All fields are required!";
        }
        else{
          //Take Form Input Securely
          $username=$connect->real_escape_string($_REQUEST['username']);
          $email=$connect->real_escape_string($_REQUEST['email']);
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
            echo "This is not a Vaild Email!";
          }
          elseif ($u_result->num_rows==1 && $e_result->num_rows==1) {
            echo "Username and Email Already Registered!";
          }
          elseif ($u_result->num_rows==1) {
            echo "Username Already Registered!";
          }
          elseif($e_result->num_rows==1){
            echo "Email Already Registered!";
          }
          else{
            //Insert Data into table
            $sql="INSERT INTO users (username,email,password,register_date,country,state,city,ip_address) VALUES ('$username','$email','$password','$register_date','$country','$state','$city','$ip')";
            if ($connect->query($sql)===TRUE) {
              echo "<script>alert('Account Created Successfully!');</script>";
            }
            else{
              echo "Unable to create the account!";
            }
          }
        }
      }
      else{
        echo "Wrong Submit Method!";
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
          <form action="#" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" required/>
            </div>
            <input type="submit" value="Login" class="btn solid" />
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
              <input type="username" name="username" placeholder="Username" minlength="3" maxlength="32" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required/>
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

<!-- Password Retype Password Checker -->
<script>
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
</script>
    <script src="../js/logsign.js"></script>
  </body>
</html>
