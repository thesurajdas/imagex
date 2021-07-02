<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <div  class="col-md-12 pb-3 pt-2"><h1 class="text-center" style="color: rgb(23 109 222 / 72%);"><i class="fad fa-globe-asia"></i> Images From The Globe</h1></div>
            <div class="container bg-light shadow-lg p-3" style="border-radius: 1.25rem;">
                <div class="row pl-3 pr-3 pt-3">
                    <div class="text-right col-12">
                        <div class="btn-group btn-group-sm" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 1.25rem;"><i class="fad fa-caret-circle-down"></i> Short By</button>
                            <div class="dropdown-menu" style="min-width: auto;" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item " style="text-align: start; color: rgba(99, 96, 96, 0.856); font-size: 80%; font-weight: 700;" href="?id=<?php echo $cat_id; ?>&s=views">View Item</a>
                                <a class="dropdown-item " style="text-align: start; color: rgba(220, 20, 60, 0.842); font-size: 80%; font-weight: 700;" href="?id=<?php echo $cat_id; ?>&s=likes">View Item</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -------------map start------------------- -->


                
                <!-- -------------map end------------------- -->
            </div>
        </div>
    <?php require_once('include/footer.php'); ?>    
    
</body>
</html>