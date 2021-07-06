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
        <div class="container-fluid shadow-lg mb-5 glry" style="border-radius: 1.25rem;">
            <div class="row">
                <div class="col-md-2 pt-2 pb-3 d-none d-md-block d-lg-block d-xl-block">
                    <a href="" style="display: flex; align-items: center; text-decoration: none; padding-bottom: 5px;"><button class="btn btn-light rounded-pill"><img src="../img/avatar.png" alt="" style="height: 20px; width: 20px; object-fit: cover; border-radius: 1.25rem;"> Profile</button></a>
                    <a href="" style="display: flex; align-items: center; text-decoration: none; padding-bottom: 5px;"><button class="btn btn-light rounded-pill" style="padding: 0.5rem;"><i class="fad fa-user-edit"></i> Edit Profile</button></a>
                    <a href="" style="display: flex; align-items: center; text-decoration: none; padding-bottom: 5px;"><button class="btn btn-light rounded-pill" style="padding: 0.5rem;"><i class="fad fa-upload"></i> Uploads</button></a>
                    <a href="" style="display: flex; align-items: center; text-decoration: none; padding-bottom: 5px;"><button class="btn btn-light rounded-pill" style="padding: 0.5rem;"><i class="fad fa-upload"></i> More</button></a>
                </div>
                <div class="col-md-2 pt-2 pb-3 d-sm-block d-md-none d-xl-none d-lg-none sticky-top bg-white">
                    <div class="row" style="justify-content: space-around;">
                        <a href="" style="display: flex; align-items: center; text-decoration: none;"><button class="btn btn-light rounded-pill"><img src="../img/avatar.png" alt="" style="height: 20px; width: 20px; object-fit: cover; border-radius: 1.25rem;"></button></a>
                        <a href="" style="display: flex; align-items: center; text-decoration: none;"><button class="btn btn-light rounded-pill"><i class="fad fa-user-edit"></i></button></a>
                        <a href="" style="display: flex; align-items: center; text-decoration: none;"><button class="btn btn-light rounded-pill"><i class="fad fa-upload"></i></button></a>
                        <a href="" style="display: flex; align-items: center; text-decoration: none;"><button class="btn btn-light rounded-pill""><i class="fad fa-upload"></i></button></a>
                    </div>
                </div>
                <div class="col-md-8 pt-3 mb-3 bg-light shadow-lg" style="border-radius: 1.25rem;">
                    <div class="container-fluid mb-3">
                        <div class="card cdll" style="margin-bottom: 5px;">
                            <div class="card-header bg-white" style="padding-top: 0.45rem; padding-bottom: 0.45rem; border-top-left-radius: 1.25rem; border-top-right-radius: 1.25rem;">
                                <div class="row" style="justify-content: space-between; align-items: center; margin-right: 0.5rem; margin-left: 0.5rem;">
                                    <a href="" style="text-decoration: none;">
                                        <div class="row">
                                            <img src="../img/avatar.png" class="fia" alt="">
                                            <p style="margin-bottom: 0px; color: rgb(145, 145, 145);">username</p>
                                        </div>
                                    </a>
                                    <a href="" style="text-decoration: none; margin-left: 1rem; margin-right: 1rem;"><p style="margin-bottom: 0px; color: rgb(59, 54, 54);">Image Name</p></a>
                                    <p style="margin-bottom: 0px;">23day</p>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <img class="img-fluid fcig" src="../upload/images/3eab1ef850.jpg" alt="">
                            </div>
                            <div class="card-footer" style="border-bottom-left-radius: 1.25rem; border-bottom-right-radius: 1.25rem; display: flex; justify-content: space-between;">
                                <button type="button" class="btn btn-outline-danger rounded-pill ml-3"><i class="fad fa-heart"></i> Heart</button>
                                <button type="button" class="btn btn-outline-info rounded-pill mr-3"><i class="fad fa-eye"></i> View</button>
                            </div>
                        </div>
                        <div class="card cdll" style="margin-bottom: 5px;">
                            <div class="card-header bg-white" style="padding-top: 0.45rem; padding-bottom: 0.45rem; border-top-left-radius: 1.25rem; border-top-right-radius: 1.25rem;">
                                <div class="row" style="justify-content: space-between; align-items: center; margin-right: 0.5rem; margin-left: 0.5rem;">
                                    <a href="" style="text-decoration: none;">
                                        <div class="row">
                                            <img src="../img/avatar.png" class="fia" alt="">
                                            <p style="margin-bottom: 0px; color: rgb(145, 145, 145);">username</p>
                                        </div>
                                    </a>
                                    <a href="" style="text-decoration: none; margin-left: 1rem; margin-right: 1rem;"><p style="margin-bottom: 0px; color: rgb(59, 54, 54);">Image Name</p></a>
                                    <p style="margin-bottom: 0px;">23day</p>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <img class="img-fluid fcig" src="../upload/images/3eab1ef850.jpg" alt="">
                            </div>
                            <div class="card-footer" style="border-bottom-left-radius: 1.25rem; border-bottom-right-radius: 1.25rem; display: flex; justify-content: space-between;">
                                <button type="button" class="btn btn-outline-danger rounded-pill ml-3"><i class="fad fa-heart"></i> Heart</button>
                                <button type="button" class="btn btn-outline-info rounded-pill mr-3"><i class="fad fa-eye"></i> View</button>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="col-md-2 pt-2 d-none d-md-block d-lg-block d-xl-block">
                    <div class="col-12 p-0">
                        <a class="btn btn-light rounded-pill" href="" style="display: flex; justify-content: center; align-items: center; height: 2.80rem; margin-bottom: 5px;"><img src="../img/avatar.png" alt="" style="height: 27px; width: 27px; border-radius: 27px; object-fit: cover; margin-right: 0.50rem;"> Username</a>
                        <a class="btn btn-light rounded-pill" href="" style="display: flex; justify-content: center; align-items: center; height: 2.80rem; margin-bottom: 5px;"><img src="../img/avatar.png" alt="" style="height: 27px; width: 27px; border-radius: 27px; object-fit: cover; margin-right: 0.50rem;"> Username</a>
                        <a class="btn btn-light rounded-pill" href="" style="display: flex; justify-content: center; align-items: center; height: 2.80rem; margin-bottom: 5px;"><img src="../img/avatar.png" alt="" style="height: 27px; width: 27px; border-radius: 27px; object-fit: cover; margin-right: 0.50rem;"> Username</a>
                        <a class="btn btn-light rounded-pill" href="" style="display: flex; justify-content: center; align-items: center; height: 2.80rem; margin-bottom: 5px;"><img src="../img/avatar.png" alt="" style="height: 27px; width: 27px; border-radius: 27px; object-fit: cover; margin-right: 0.50rem;"> Username</a>
                        <a class="btn btn-light rounded-pill" href="" style="display: flex; justify-content: center; align-items: center; height: 2.80rem; margin-bottom: 5px;"><img src="../img/avatar.png" alt="" style="height: 27px; width: 27px; border-radius: 27px; object-fit: cover; margin-right: 0.50rem;"> Username</a>
                    </div>
                </div>
                <div class="col-md-2 pt-2 pb-3 d-sm-block d-md-none d-xl-none d-lg-none bg-white fixed-bottom">
                    <div class="row" style="justify-content: space-around;">
                        <a href="" style="display: flex; align-items: center; text-decoration: none;"><button class="btn btn-light rounded-pill"><img src="../img/avatar.png" alt="" style="height: 20px; width: 20px; object-fit: cover; border-radius: 1.25rem;"></button></a>
                        <a href="" style="display: flex; align-items: center; text-decoration: none;"><button class="btn btn-light rounded-pill"><img src="../img/avatar.png" alt="" style="height: 20px; width: 20px; object-fit: cover; border-radius: 1.25rem;"></button></a>
                        <a href="" style="display: flex; align-items: center; text-decoration: none;"><button class="btn btn-light rounded-pill"><img src="../img/avatar.png" alt="" style="height: 20px; width: 20px; object-fit: cover; border-radius: 1.25rem;"></button></a>
                        <a href="" style="display: flex; align-items: center; text-decoration: none;"><button class="btn btn-light rounded-pill"><img src="../img/avatar.png" alt="" style="height: 20px; width: 20px; object-fit: cover; border-radius: 1.25rem;"></button></a>
                        <a href="" style="display: flex; align-items: center; text-decoration: none;"><button class="btn btn-light rounded-pill"><i class="fad fa-user-plus"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once('include/footer.php'); ?>
    </body>
</html>