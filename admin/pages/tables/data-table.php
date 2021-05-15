<?php
    //Add database connection
    require('../../auth.php');
    //Retrive Data from database
    $sql1="SELECT * FROM users;";
    $ur=$connect->query($sql1);
//Save Personal Details
if (isset($_REQUEST['psave'])) {
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    //Check Empty String
    if (($_REQUEST['username']=="")||($_REQUEST['email']=="")||($_REQUEST['name']=="")||($_REQUEST['gender']=="")||($_REQUEST['birth_date']=="")||($_REQUEST['active']=="")||($_REQUEST['country']=="")||($_REQUEST['city']=="")||($_REQUEST['role']=="")) {
      echo "<script>alert('All fields are required!');</script>";
    }
    else{
      //Take Form Input Securely
      $u_id=$connect->real_escape_string($_REQUEST['id']);
      $username=$connect->real_escape_string($_REQUEST['username']);
      $email=$connect->real_escape_string($_REQUEST['email']);
      $email=filter_var($email, FILTER_SANITIZE_EMAIL);
      $phone_no=$connect->real_escape_string($_REQUEST['phone_no']);
      $name=$connect->real_escape_string($_REQUEST['name']);
      $gender=$connect->real_escape_string($_REQUEST['gender']);
      $birth_date=$connect->real_escape_string($_REQUEST['birth_date']);
      $active=$connect->real_escape_string($_REQUEST['active']);
      $country=$connect->real_escape_string($_REQUEST['country']);
      $city=$connect->real_escape_string($_REQUEST['city']);
      $zip_code=$connect->real_escape_string($_REQUEST['zip_code']);
      $role=$connect->real_escape_string($_REQUEST['role']);

      //Update Data into table
      $sql="UPDATE users SET username='$username', email='$email', phone_no='$phone_no', name='$name', gender='$gender', birth_date='$birth_date', active='$active', country='$country', city='$city', zip_code='$zip_code', role='$role' WHERE id='$u_id';";
      if ($connect->query($sql)===TRUE) {
          echo "<script>alert('Profile Updated Successfully!');</script>";
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
 //Save Device Details
 if (isset($_REQUEST['dsave'])) {
  if ($_SERVER['REQUEST_METHOD']=='POST') {
      //Take Form Input Securely
      $u_id=$connect->real_escape_string($_REQUEST['id']);
      $device_name=$connect->real_escape_string($_REQUEST['device_name']);
      $device_model=$connect->real_escape_string($_REQUEST['device_model']);
      $apertures=$connect->real_escape_string($_REQUEST['apertures']);
      $resolution=$connect->real_escape_string($_REQUEST['resolution']);
      $focal_length=$connect->real_escape_string($_REQUEST['focal_length']);
      //Update Data into table
      $sql="UPDATE users SET device_name='$device_name', device_model='$device_model', apertures='$apertures', resolution='$resolution', focal_length='$focal_length' WHERE id='$u_id';";
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
//Delete User
if (isset($_REQUEST['delete'])) {
  $u_id=$_REQUEST['id'];
  $sql="DELETE FROM users WHERE id='$u_id';";
  if ($connect->query($sql)===TRUE) {
    echo "<script>alert('User Deleted Successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to Delete the User!');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.php -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../../index.php"><img src="../../images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="../../../pages/profile.php">
                <i class="ti-user text-primary"></i>
                 My Proflie
                </a>
              <a class="dropdown-item" href="../../../pages/logout.php">
                <i class="ti-power-off text-primary"></i>
                 Logout
                </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <!-- page-body-wrapper ends -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.php -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.php -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
            <a class="nav-link" href="../../index.php">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="tables">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="../../pages/tables/data-table.php">Data table</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../pages/ui-features/settings.php">
                    <i class="icon-cog menu-icon"></i>
                    <span class="menu-title">Settings</span>
                </a>
                </li>
        </ul>
    </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data table</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Status</th>
                            <th>Last Active</th>
                            <th>Actions</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($rd=mysqli_fetch_array($ur)): ?>
                        <tr>
                            <th><?php if (isset($rd['id'])) { echo $rd['id']; } ?></th>
                            <td><?php if (isset($rd['username'])) { echo $rd['username']; } ?></td>
                            <td><?php if (isset($rd['name'])) { echo $rd['name']; } ?></td>
                            <td><?php if (isset($rd['email'])) { echo $rd['email']; } ?></td>
                            <td><?php if (isset($rd['country'])) { echo $rd['country']; } ?></td>
                            <td><?php if (isset($rd['active'])) { if($rd['active']==0){ $active="Active"; $badge="badge-success"; }else{ $active="Blocked"; $badge="badge-danger"; } echo "<label class='badge ".$badge."'>".$active."</lable>"; } ?></td>
                            <td><?php if (isset($rd['last_active'])) { echo $rd['last_active']; } ?></td>
                            <td>
                              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#usersModal<?php if (isset($rd['id'])) { echo $rd['id']; } ?>"><i class="bi bi-pencil-square"></i></button>
                              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"><input type="hidden" name="id" value="<?php if (isset($rd['id'])) { echo $rd['id']; } ?>"><button type="submit" class="btn btn-outline-primary" name="delete"><i class="bi bi-trash"></i></button></form>
                            </td>
                        </tr>
  <!-- Modal -->
  <div class="modal fade" id="usersModal<?php if (isset($rd['id'])) { echo $rd['id']; } ?>" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4 class="col-12 ntxt">Besic Info</h4>
          <hr class="mb-4">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="jd">Register Date</label>
                  <input type="date" class="form-control" placeholder="Register Date" value="<?php if (isset($rd['register_date'])) { echo $rd['register_date']; } ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="jd">Last Active</label>
                  <input type="date" class="form-control" placeholder="Last Active" value="<?php if (isset($rd['last_active'])) { echo $rd['last_active']; } ?>" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label for="ipaddress">IP Address</label>
                    <input type="ip" class="form-control" value="<?php if (isset($rd['ip_address'])) { echo $rd['ip_address']; } ?>" readonly>
                </div>
              </div>
          </form>
          <hr class="mb-4">
          <h4 class="col-12 ntxt">Personal Details</h4>
          <hr class="mb-4">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="uname">ID</label>
                <input type="text" class="form-control" placeholder="ID" value="<?php if (isset($rd['id'])) { echo $rd['id']; } ?>" readonly>
                <input type="hidden" name="id" value="<?php if (isset($rd['id'])) { echo $rd['id']; } ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="uname">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php if (isset($rd['username'])) { echo $rd['username']; } ?>" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="fname">Full Name</label>
                <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?php if (isset($rd['name'])) { echo $rd['name']; } ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" placeholder="example@email.com" value="<?php if (isset($rd['email'])) { echo $rd['email']; } ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" name="phone_no" placeholder="0123456789" value="<?php if (isset($rd['phone_no'])) { echo $rd['phone_no']; } ?>" required>
              </div>
              <div class="form-group dates col-md-6">
                <label for="picker"><i class="far fa-calendar-alt"></i> Date Of Birth</label>
                <input type="date" autocomplete="off" class="form-control" name="birth_date" placeholder="yyyy-mm-dd" value="<?php if (isset($rd['birth_date'])) { echo $rd['birth_date']; } ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">Gender</label>
                              <select class="form-control" name="gender" required>
                                  <option value="Male" <?php $select="Male"; if(isset($select) && $select!=""){ if($rd['gender']==$select){ echo "selected"; }} ?>>Male</option>
                                  <option value="Female" <?php $select="Female"; if(isset($select) && $select!=""){ if($rd['gender']==$select){ echo "selected"; }} ?>>Female</option>
                                  <option value="Others" <?php $select="Others"; if(isset($select) && $select!=""){ if($rd['gender']==$select){ echo "selected"; }} ?>>Others</option>
                              </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputCity"><i class="fas fa-city"></i> City</label>
                <input type="text" class="form-control" name="city" maxlength="20" placeholder="Florida" value="<?php if (isset($rd['city'])) { echo $rd['city']; } ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputZip"><i class="fa fa-address-card" aria-hidden="true"></i> Zip Code</label>
                <input type="text" class="form-control" name="zip_code" placeholder="700001" maxlength="10" value="<?php if (isset($rd['zip_code'])) { echo $rd['zip_code']; } ?>">
              </div>        
              <div class="form-group col-md-6">
                <label for="inputState">Country <i class="bi bi-geo-alt"></i></label>
                              <select class="form-control" name="country" required>
                              <?php $user_country=$rd['country']; ?>
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
              <div class="form-group col-md-6">
                <label for="inputState">Account Type</label>
                              <select class="form-control" name="role" required>
                                  <option value="Viewer" <?php $select="Viewer"; if(isset($select) && $select!=""){ if($rd['role']==$select){ echo "selected"; }} ?>>Viewer</option>
                                  <option value="Uploader" <?php $select="Uploader"; if(isset($select) && $select!=""){ if($rd['role']==$select){ echo "selected"; }} ?>>Uploader</option>
                                  <option value="Photographer & Uploader" <?php $select="Photographer & Uploader"; if(isset($select) && $select!=""){ if($rd['role']==$select){ echo "selected"; }} ?>>Photographer & Uploader</option>
                              </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">Upload</label>
                    <select class="form-control" name="active" required>
                     <option value="0" <?php $select=0; if(isset($select) && $select!=""){ if($rd['active']==$select){ echo "selected"; }} ?>>Active</option>
                     <option value="1" <?php $select=1; if(isset($select) && $select!=""){ if($rd['active']==$select){ echo "selected"; }} ?>>Blocked</option>
                     </select>
              </div>
            </div>
            <button type="submit" name="psave" class="btn btn-primary">Save Changes</button>
          </form>
            <hr class="mb-4">
            <h4 class="col-12 ntxt">Device Details</h4>
                <hr class="mb-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="mobileName"><i class="fas fa-mobile-alt"></i> Device Name</label>
                            <input type="hidden" name="id" value="<?php if (isset($rd['id'])) { echo $rd['id']; } ?>">
                            <input type="text" name="device_name" class="form-control" maxlength="25" placeholder="Pixel 2" value="<?php if (isset($rd['device_name'])) { echo $rd['device_name']; } ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobileModel">Device Model</label>
                            <input type="text" name="device_model" class="form-control" maxlength="25" placeholder="G011A" value="<?php if (isset($rd['device_model'])) { echo $rd['device_model']; } ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobileApertures"><b>ƒ</b> Apertures </label>
                            <input type="text" name="apertures" class="form-control" maxlength="4" placeholder="1.7" value="<?php if (isset($rd['apertures'])) { echo $rd['apertures']; } ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobileMp"><i class="fas fa-camera-retro"></i> Resolution</label>
                            <input type="text" name="resolution" class="form-control" maxlength="4" placeholder="64" value="<?php if (isset($rd['resolution'])) { echo $rd['resolution']; } ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobileFocalLength"><i class="fas fa-question-circle"></i> Focal Length</label>
                            <input type="text" name="focal_length" class="form-control" maxlength="4" placeholder="3.61" value="<?php if (isset($rd['focal_length'])) { echo $rd['focal_length']; } ?>">
                        </div>
                    </div>
                    <div class="form-row smit">
                        <button type="submit" name="dsave" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color: #fff;">Close</button>
        </div>
      </div>
    </div>
  </div>
                      <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.php -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. <a href="#" target="_blank">our_gallery_name</a> All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- Modal -->
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../vendors/sweetalert/sweetalert.min.js"></script>
  <script src="../../vendors/jquery.avgrund/jquery.avgrund.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/data-table.js"></script>
  <script src="../../js/alerts.js"></script>
  <script src="../../js/avgrund.js"></script>
  <!-- End custom js for this page-->

  
</body>

</html>
