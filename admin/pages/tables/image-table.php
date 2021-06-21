<?php
    //Add database connection
    require('../../auth.php');
    //Retrive Data from database
    $sql="SELECT * FROM images;";
    $img_result=$connect->query($sql);
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
  <script src="../../../js/jquery.min.js"></script>
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
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <?php
                 $user_username=$row['username'];
                 $user_avatar=$row['avatar'];
              ?>
              <img src="<?php echo $site_url."/".$user_avatar; ?>" alt="<?php echo $user_username; ?>"/>
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
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="../../pages/tables/report-table.php">Reports</a></li>
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
              <h4 class="card-title">Image table</h4>
              <div id="deletestatus"></div>
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
                              <button type="button" onclick="editimg(<?php echo $row['id'] ?>)" class="btn btn-outline-primary" data-toggle="modal" data-target="#usersModal"><i class="bi bi-pencil-square"></i></button>
                              <button class="btn btn-outline-primary" onclick="mydel(<?php echo $row['id']; ?>)"><i class="bi bi-trash"></i></button>
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
                                  <div id="loadEdit" class="modal-body">
                                  <!-- edit image modal -->
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
  <script>
        //Edit Image Details
        function editimg(id){
            $(document).ready(function(){
                $.ajax({
                    url: 'edit-image-admin.php',
                    type: 'POST',
                    data: 'id='+id,
                    success: function(result){
                        $('#loadEdit').html(result);
                    }
                });
            });
        }
        //AJAX Delete
        function mydel(id){
                $(document).ready(function(){
                    var r = confirm("Are you sure to delete this image?");
                     if (r == true) {
                        //Send AJAX request
                        $.ajax({
                            url: 'delete-admin.php',
                            type: 'POST',
                            data: 'image_id='+id,
                                success: function(result){
                                  $('#deletestatus').html(result);
                                location.reload();
                            }
                        });
                    }
                });
            }
        </script>
  <!-- End custom js for this page-->
</body>

</html>
