<?php
    //Add database connection
    require_once('../auth.php');
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
        <link href="../css/trendings.css" rel="stylesheet">

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
        <div  class="col-md-12 pb-3 pt-2"><h1 class="text-center chdr" style="color:crimson"><i class="fad fa-fire"></i> Trendings</h1></div>
        <div id="loadData" class="container shadow-lg p-3" style="border-radius: 1.25rem;">        
                        <!-- Load Images Here -->
                        <!-- Load Button Here -->
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
        url: "pagination.php",
        type: "POST",
        data : { page_no : page },
        success: function(data){
          if(data){
            $("#pagination").remove();
            $("#loadData").append(data);
          }else{
            $("#ajaxbtn").html("Finished!");
            $("#ajaxbtn").prop("disabled",true);
          }
          
        }
      });
    }
    loadTable();

    // Add Click Event on ajaxbtn
    $(document).on("click","#ajaxbtn",function(){
      $("#ajaxbtn").html("Loading...");
      var pid = $(this).data("id");
      loadTable(pid);
    });

  });
</script>
</body>
</html>