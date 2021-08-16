<?php
    //Add database connection
    require_once('../auth.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Users</title>
        <!-- Favicon -->
		<link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
        <link rel="icon" href="../img/icon.png" type="image/x-icon">
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
                <div id="loadData" class="row text-center">
                        <div id="searching">loading...</div>
                </div>
            </div>
        </div>
        <?php require_once('include/footer.php'); ?>
        <script>
        $(document).ready(function(){
            // Load Data from Database with Ajax
            function loadTable(page){
            $.ajax({
                url: "users-pagination.php",
                type: "POST",
                data : { page_no : page },
                success: function(data){
                if(data){
                    $("#searching").remove();
                    $("#pagination").remove();
                    $("#loadData").append(data);
                }else{
                    $("#searching").html("<div class='container text-center'><img style='height: 150px; width: 150px; object-fit: contain;' src='../img/notfound.svg' alt=''><h2 style='padding-top: 20px; padding-bottom: 25px; color: #6c757dd4;'>Sorry! No Result Found. <i class='fad fa-heart-broken' style='color: red;'></i></div>");
                    $("#ajaxbtn").html("<i class='fad fa-sad-cry'></i> No more users found!");
                    $("#ajaxbtn").prop("disabled",true);
                }
                
                }
            });
            }
            loadTable();
            // Add Click Event on ajaxbtn
            $(document).on("click","#ajaxbtn",function(){
            $("#ajaxbtn").html("<div class='spinner-border spinner-border-sm text-info' role='status'><span class='sr-only'></span></div> Loading...");
            var pid = $(this).data("id");
            loadTable(pid);
            });

        });
        </script>
    </body>
</html>