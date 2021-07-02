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

            </div>
        </div>
    <?php require_once('include/footer.php'); ?>    
    
</body>
</html>