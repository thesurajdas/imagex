<?php
    //Add database connection
    require_once('../auth.php');
    //Check category id available or not
    if (isset($_GET['q'])) {
        $q=$_GET['q'];
    }
    else{
        header("Location:404.php");
        exit();
    }
    //Check search result number
    $sql="SELECT * FROM images WHERE visibility=0 AND title LIKE '%{$q}%'";
    $result_search=$connect->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/jquery-3.5.1.slim.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <link href="../css/allimg.css" rel="stylesheet">

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
        <!-----------------------------------nav section---------------------------------------------------->
        <?php require_once('include/header.php'); ?>
        <!-----------------------------------------------image-section-------------------------------------------->

        <div class="container shadow-lg p-3 mb-5 bg-white glry" style="border-radius: 1.25rem;">
            <div class="col-12 text-center font-weight-bolder" style="color: #495057b0"><div class="row text-center justify-content-center"><h2><i class="fad fa-bolt" style="color: gold"></i> (<?php echo number_format($result_search->num_rows); ?>) Search Results For: <b><?php echo $q; ?></b></h2></div></div>
            <div class="container shadow-lg pl-3 pr-3 pt-1 mt-4" style="border-radius: 1.25rem;">
                    <div class="row pl-3 pr-3 pt-3">
                        <div class="text-right col-12">
                            <div class="btn-group btn-group-sm" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 1.25rem;"><i class="fad fa-caret-circle-down"></i> Short By</button>
                                <div class="dropdown-menu" style="min-width: auto; background-color: #f8f9fa;" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item " style="text-align: start; color: rgba(99, 96, 96, 0.856); font-size: 80%; font-weight: 700;" href="#"><i class="fad fa-eye"></i> View</a>
                                <a class="dropdown-item " style="text-align: start; color: rgba(220, 20, 60, 0.842); font-size: 80%; font-weight: 700;" href="#"><i class="fad fa-heart-circle"></i> Like</a>
                                <a class="dropdown-item " style="text-align: start; color: rgba(0, 128, 0, 0.815); font-size: 80%; font-weight: 700;" href="#"><i class="fad fa-download"></i> Download</a>
                                <a class="dropdown-item " style="text-align: start; color: rgba(28, 102, 177, 0.863); font-size: 80%; font-weight: 700;" href="#"><i class="fad fa-share-square"></i> Share</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="loadData" class="row"></div>
                    <div id="searching" class='container text-center'><img style='height: 150px; width: 150px; object-fit: contain;' src='../img/notfound.svg' alt=''><h2 style='padding-top: 20px; padding-bottom: 25px; color: #6c757dd4;'>Sorry! No Result Found. <i class='fad fa-heart-broken' style='color: red;'></i></div>     
            </div>
                <!----------------------------page options starts here---------------------------------->

                <!----------------------------page options ends here---------------------------------->
            </div>    
        </div>
        <!----------------------Footer Section---------------------------------------------------->
        <?php require_once('include/footer.php'); ?>
        <?php if ($login==1) { ?>
        <script>
        //AJAX Like
            function mylike(id){
                $(document).ready(function(){
                    //Send AJAX request
                    $.ajax({
                        url: 'like.php',
                        type: 'POST',
                        data: 'user_id=<?php echo $user_id; ?>&image_id='+id,
                            success: function(result){
                            $('#'+id).html(result);
                        }
                    });
                });
            }
        </script>
        <?php } else{ ?>
        <script>
        //Not Login Like
            function mylike(id){
                alert('You need to login to like this post!');
            }
        </script>
        <?php } ?>
        <script>
        $(document).ready(function(){
            // Load Data from Database with Ajax
            function loadTable(page){
            $.ajax({
                url: "search-pagination.php",
                type: "GET",
                data : { page_no : page, q:'<?php echo $q; ?>' },
                success: function(data){
                    if(data){
                        $("#searching").remove();
                        $("#pagination").remove();
                        $("#loadData").append(data);
                    }else{
                        $("#ajaxbtn").html("<i class='fad fa-sad-cry'></i> No more images found!");
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