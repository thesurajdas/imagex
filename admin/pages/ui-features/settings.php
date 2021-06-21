<?php
    //Add database connection
    require('../../auth.php');
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
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet"/>
    </head>
<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.php -->
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
                            <li class="nav-item"> <a class="nav-link" href="../../pages/tables/data-table.php">Data table</a></li>
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
    <!----Main Panel starts-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome <span>User First Name</span></h3>
                            <h6 class="font-weight-normal mb-0">Everything Allright?</h6>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">User Settings:</p>
                            <div class="d-flex justify-content-between">
                                <p>Maintenance Mode:</p>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="m_m" checked>
                                    <label class="custom-control-label" for="m_m">Toggle for Enabel</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Registration:</p>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="u_r" checked>
                                    <label class="custom-control-label" for="u_r">Toggle for Enabel</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>E-mail Verification:</p>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="u_e_v" checked>
                                    <label class="custom-control-label" for="u_e_v">Toggle for Enabel</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Upload:</p>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="upload" checked>
                                    <label class="custom-control-label" for="upload">Toggle for Enabel</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">WebSite Detailes</h4>
                            <p class="card-description">
                                Edit Detailes
                            </p>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="sitetitle">Site Title</label>
                                    <input type="text" class="form-control" id="sitetitle" placeholder="ImageX">
                                </div>
                                <div class="form-group">
                                    <label for="sitename">Site Name</label>
                                    <input type="text" class="form-control" id="sitename" placeholder="ImageX">
                                </div>
                                <div class="form-group">
                                    <label for="siteemail">Site Email</label>
                                    <input type="text" class="form-control" id="siteemail" placeholder="something@xyz.com">
                                </div>
                                <div class="form-group">
                                    <label for="sitedescp">Site Description</label>
                                    <input type="text" class="form-control" id="sitedescp" placeholder="type something">
                                </div>
                                
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Site Email Settings:</p>
                            <form class="forms-sample">
                                <p>Server Type (Choose One):</p>
                                <div class="d-flex justify-content-start">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="mailserver" name="mail_s" mdbInput>
                                        <label class="form-check-label" for="mailserver">SMTP</label>
                                    </div>
                                    
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="m_s" name="mail_s" mdbInput>
                                        <label class="form-check-label" for="mailserver">Server Mail(Default)</label>
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top: 20px;">
                                    <label for="smtphost">SMTP Host</label>
                                    <input type="text" class="form-control" id="smtphost">
                                </div>
                                <div class="form-group">
                                    <label for="smtpusername">SMTP Username</label>
                                    <input type="text" class="form-control" id="smtpusername">
                                </div>
                                <div class="form-group">
                                    <label for="smtppassword">SMTP Username</label>
                                    <input type="text" class="form-control" id="smtpupassword">
                                </div>
                                <div class="form-group" style="padding-bottom: 20PX;">
                                    <label for="smtpport">SMTP Port</label>
                                    <input type="text" class="form-control" id="smtpport">
                                </div>
                                <p>SMTP Encryption (Choose One):</p>
                                <div class="d-flex justify-content-start" style="padding-bottom: 20PX;">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="smtpencryption" name="site_e" mdbInput>
                                        <label class="form-check-label" for="smtpencryption">TLS</label>
                                    </div>
                                    
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="smtpencryption" name="site_e" mdbInput>
                                        <label class="form-check-label" for="smtpencryption">SSL</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <button class="btn btn-light">Test E-Mail Server</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Custom Image Design</p>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>FavIcon</label>
                                    <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Home Page Header Image</label>
                                    <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">carousel Image[3]</p>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label>Image One</label>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control"  placeholder="Image Name eg. 6b3ecf9326">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary" type="button">Save</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image Two</label>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control"  placeholder="Image Name eg. 6b3ecf9326">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary" type="button">Save</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image Three</label>
                                    <div class="input-group col-xs-12" >
                                        <input type="text" class="form-control"  placeholder="Image Name eg. 6b3ecf9326">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary" type="button">Save</button>
                                        </span>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.php -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. <a href="#" target="_blank">Gallery Name</a>. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>


      <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
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
  <script src="../../js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>
</html>