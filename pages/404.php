<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/jquery-3.5.1.slim.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <link href="../css/404.css" rel="stylesheet">

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
        <div class="container-fluid pl-0 pr-0 glry">
            <section class="page_404 pl-0 pr-0">
                <div class="container-fluid pl-0 pr-0">
                    <div class="row p-0">	
                        <div class="col-sm-12 ">
                            <div class="col-sm-12 p-0 text-center">
                                <div class="four_zero_four_bg">
                                    <h1 class="text-center "><i class="fad fa-book-dead"></i> 404</h1>
                                
                                
                                </div>
                                
                                <div class="contant_box_404">
                                    <h3 class="h2">
                                    Look like you're lost <i class="fad fa-heart-broken text-danger"></i>
                                    </h3>
                                    
                                    <p>the page you are looking for is not avaible!</p>
                                    
                                    <a href="../index.php" class="link_404 text-decoration-none"><i class="fad fa-home"></i> Go to Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        

        <?php require_once('include/footer.php'); ?>
    </body>
</html>