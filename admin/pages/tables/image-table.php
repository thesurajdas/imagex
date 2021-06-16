<?php
    //Add database connection
    require('../../auth.php');
    //Retrive Data from database
    $sql="SELECT * FROM images;";
    $img_result=$connect->query($sql);
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
//Delete Images
if (isset($_REQUEST['delete'])) {
  $i_id=$_REQUEST['id'];
  $sql="DELETE FROM images WHERE id='$i_id';";
  if ($connect->query($sql)===TRUE) {
    echo "<script>alert('Image Deleted Successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to Delete the Image!');</script>";
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
  <link rel="stylesheet" href="../../../css/imagetable.css">
  <script src="../../../js/fontawesome.js"></script>
  <style>
    .table td img, .jsgrid .jsgrid-table td img {
        width: 114px;
        height: auto;
        border-radius: 0;
        object-fit: contain;
        transition: 0.25s;
        }
   
  </style>

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
                        <li class="nav-item"> <a class="nav-link" href="../../pages/tables/data-table.php">Users</a></li>
                    </ul>
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="../../pages/tables/image-table.php">Images</a></li>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Uploader</th>
                            <th>Visibility</th>
                            <th>Time</th>
                            <th>View</th>
                            <th>Like</th>
                            <th>Action</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <?php while($row=$img_result->fetch_assoc()): ?>
                            <td><?php echo $row['id']; ?></td>
                            <td><img class="timg" src="../../..<?php echo $row['image_location']; ?>" alt=""></td>
                            <th><?php echo $row['title'];
                            echo "<a class='text-decoration-none' href='".$site_url."/pages/image.php?id=".$row['image_id']."' target='_blank'> <i class='fad fa-external-link-alt' style='margin-left: 3px; font-size: 12px;'></i></a>";
                            ?>
                            </th>
                            <td><?php
                              $up_id=$row['user_id'];
                              $sql2="SELECT * FROM users WHERE id='$up_id'";
                              $up_result=$connect->query($sql2);
                              $row_up=$up_result->fetch_assoc();
                              echo "<a class='text-decoration-none' style='font-weight: 550; font-size: 14px;' href='".$site_url."/pages/profile.php?u=".$row_up['username']."' target='_blank'>".$row_up['name']."  </a>";
                            ?></td>
                            <td>
                              <?php
                                if($row['visibility']==0){echo "<label class='badge badge-success'>public</label>";}
                                elseif($row['visibility']==1){echo "<label class='badge badge-danger'>private</label>";}
                                else{echo "Unkown";}
                              ?>
                            </td>
                            <td><?php $date=date_create($row['time']); echo date_format($date,"d F, Y h:i A"); ?></td>
                            <td><?php echo $row['views']; ?></td>
                            <td><?php echo $row['likes']; ?></td>
                            <td>
                              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#usersModal"><i class="bi bi-pencil-square"></i></button>
                              <button class="btn btn-outline-primary" onclick="showSwal('success-message')"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
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
                                        <div class="form-group col-md-12">
                                        <label for="jd"> Image Id</label>
                                        <input type="text" class="form-control" placeholder="Register Date" value="1" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="vew">View</label>
                                        <input type="text" class="form-control" placeholder="Last Active" value="25" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="hrts">Hearts</label>
                                            <input type="text" class="form-control" value="25" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="dlod">Downloads</label>
                                            <input type="text" class="form-control" value="25" readonly>
                                        </div>
                                    </div>
                                </form>
                                <hr class="mb-4">
                                <h4 class="col-12 ntxt">Image Description</h4>
                                <hr class="mb-4">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="fname">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Full Name" value="Iamge name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ctgry">Category</label>
                                            <input type="text" class="form-control" name="email" placeholder="example@email.com" value="Nature" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone">Visibility</label>
                                            <select class="form-control" name="country" required>
                                                <option value="Unkown">Choose...</option>
                                                    <option value="Albania" >Public</option>
                                                    <option value="Algeria">Private</option>
                                            </select>    
                                        </div>
                                    </div>
                                    <button type="submit" name="psave" class="btn btn-primary">Save Changes</button>
                                        
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color: #fff;">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>
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
