<?php
    require('../connect.php');
    $sql = "SELECT * FROM users";
    $result = $connect->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
            <script src="../js/jquery-3.5.1.slim.min.js"></script>
            <script src="../js/jquery.min.js"></script>
            <script src="../js/bootstrap.bundle.min.js"></script>
            <link href="../css/aboutus.css" rel="stylesheet">

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
        <?php require_once('include/header.php'); ?>
        <div class="container shadow-lg p-3 mb-5 bg-white glry" style="border-radius: 1.25rem;">
            <div  class="col-md-12 pb-3 pt-2"><h1 class="text-center" style="color: rgb(23 109 222 / 72%);"><i class="fad fa-users"></i> Users</h1></div>
            <div class="container bg-light shadow-lg p-3" style="border-radius: 1.25rem;">
                <div class="row text-center">
                    <!-- Team item-->
                    <?php
                        while($ru = $result->fetch_assoc()):
                    ?>
                    <div class="col-xl-4 col-sm-6 mb-5" >
                        <div class="bg-white shadow-sm py-5 px-4" style="border-radius: 1.25rem;"><img src="../<?php if(!empty($ru['avatar'])){echo $ru['avatar']; } else {echo 'img/avatar.png';}  ?>" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm cthhumb">
                            <h5 class="mb-0"><a href="profile.php?u=<?php echo $ru['username']; ?>" target="_blank"><?php echo $ru['name']; ?></a></h5><span class="small text-uppercase text-muted"><?php echo $ru['role']; ?></span>
                            <ul class="social mb-0 list-inline mt-3 mb-2">
                                <li class="list-inline-item"><a href="#" class="btn fbb" style="border-radius: 1.25rem;" disabled><i class="fad fa-cloud-download-alt"></i> <span>500</span></a></li>
                                <li class="list-inline-item"><a href="#" class="btn tww"  style="border-radius: 1.25rem;" disabled><i class="fad fa-smile-plus"></i> <span>500</span></a></li>
                            </ul>
                            <button type="button" class="btn btn-outline-warning" style="border-radius: 1.25rem;"><i class="fad fa-user-plus"></i> Follow</button>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <?php require_once('include/footer.php'); ?>
    </body>
</html>