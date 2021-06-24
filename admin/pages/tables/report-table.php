<?php
    //Add database connection
    require('../../auth.php');
    //Retrive Data from database
    $sql="SELECT * FROM reports";
    $report_result=$connect->query($sql);
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
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../../index.html"><img src="../../images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/logo-mini.svg" alt="logo"/></a>
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
              <img src="../../images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <!--<a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>-->
              <a class="dropdown-item">
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
      <!-- partial:../../partials/_settings-panel.html -->
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
      <!-- partial:../../partials/_sidebar.html -->
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
              <h4 class="card-title">Report table</h4>
              <div id="deletestatus"></div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Image ID</th>
                            <th>Uploader</th>
                            <th>Reporter</th>
                            <th>Report</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        while($row=$report_result->fetch_assoc()):
                          $img_id=$row['image_id'];
                          $sql2="SELECT * FROM images WHERE id='$img_id'";
                          $img_result=$connect->query($sql2);
                        while($row_img=$img_result->fetch_assoc()):
                      ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><img class="timg" src="../../..<?php echo $row_img['image_location']; ?>" alt=""></td>
                            <th><?php echo $row_img['image_id'];
                            echo "<a class='text-decoration-none' href='".$site_url."/pages/image.php?id=".$row_img['image_id']."' target='_blank'> <i class='fad fa-external-link-alt' style='margin-left: 3px; font-size: 12px;'></i></a>";
                            ?></th>
                            <td><?php
                              $up_id=$row['uploader_id'];
                              $sql3="SELECT * FROM users WHERE id='$up_id'";
                              $up_result=$connect->query($sql3);
                              $row_up=$up_result->fetch_assoc();
                              echo "<a class='text-decoration-none' style='font-weight: 550; font-size: 14px;' href='".$site_url."/pages/profile.php?u=".$row_up['username']."' target='_blank'>".$row_up['name']."  </a>";
                            ?></td>
                            <td><?php
                              $rp_id=$row['reporter_id'];
                              $sql4="SELECT * FROM users WHERE id='$rp_id'";
                              $rp_result=$connect->query($sql4);
                              $row_rp=$rp_result->fetch_assoc();
                              echo "<a class='text-decoration-none' style='font-weight: 550; font-size: 14px;' href='".$site_url."/pages/profile.php?u=".$row_rp['username']."' target='_blank'>".$row_rp['name']."  </a>";
                            ?></td>
                            <td><?php if($row['report_type']==0){echo "<label class='badge badge-success'>Normal</label>";}elseif($row['report_type']==1){echo "<label class='badge badge-danger'>Copyright</label>";}else{echo "Unknown!";} ?> <a class="btn" data-toggle="modal" data-target="#usersModal<?php if (isset($row['id'])) { echo $row['id']; } ?>"><i class="fad fa-comment-exclamation"></i></a></td>
                            <td><?php
                                if($row_img['visibility']==0){echo "<label class='badge badge-success'>public</label>";}
                                elseif($row_img['visibility']==1){echo "<label class='badge badge-secondary'>private</label>";}
                                elseif($row_img['visibility']==2){echo "<label class='badge badge-danger'>blocked</label>";}
                                else{echo "Unkown";}
                              ?></td>
                            <td>
                                <div class="row">
                                <div class="dropdown dropleft" style="margin-right: 2px; margin-bottom: 2px">
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fad fa-ban" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" onclick="private(<?php echo $img_id; ?>)">Private</a>
                                        <a class="dropdown-item" onclick="tmp_block(<?php echo $img_id; ?>)">Temporary Blocked</a>
                                    </div>
                                </div>    
                                <button class="btn btn-outline-primary" onclick="mydel(<?php echo $row['id']; ?>)" data-toggle="tooltip" data-placement=top data-custom-class="tooltip-Danger" title="Delete" style="margin-left: 2px"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                              <!-- Modal -->
                              <div class="modal fade" id="usersModal<?php if (isset($row['id'])) { echo $row['id']; } ?>" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Report Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-12">
                                                        <label for="jd">Report Origin Date and Time</label>
                                                        <input type="text" class="form-control" id="jd" value="<?php $date=date_create($row['time']); echo date_format($date,"d F, Y h:i A"); ?>" readonly>
                                                    </div> 
                                                    <div class="form-group col-12">
                                                        <label for="reportmsg">Report Message</label>
                                                        <textarea class="form-control" id="reportmsg" rows="3" readonly><?php echo $row['description']; ?></textarea>
                                                    </div> 
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                              </div>
                        <?php endwhile;endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
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
  <script src="path-to/js/tooltips.js"></script>
  <!-- End custom js for this page-->
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
                });
 //AJAX Delete
 function mydel(id){
                $(document).ready(function(){
                    var r = confirm("Are you sure to delete this report?");
                     if (r == true) {
                        //Send AJAX request
                        $.ajax({
                            url: 'delete-report.php',
                            type: 'POST',
                            data: 'report_id='+id,
                                success: function(result){
                                  $('#deletestatus').html(result);
                                location.reload();
                            }
                        });
                    }
                });
            }
//report action
function private(id){
  $(document).ready(function(){
                        //Send AJAX request
                        $.ajax({
                            url: 'private-report.php',
                            type: 'POST',
                            data: 'img_id='+id,
                                success: function(result){
                                  $('#deletestatus').html(result);
                                location.reload();
                            }
                        });
                });
}
function tmp_block(id){
  $(document).ready(function(){
                        //Send AJAX request
                        $.ajax({
                            url: 'block-report.php',
                            type: 'POST',
                            data: 'img_id='+id,
                                success: function(result){
                                  $('#deletestatus').html(result);
                                location.reload();
                            }
                        });
                });
}
        </script>
</body>>
</html>