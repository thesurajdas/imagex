<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/jquery-3.5.1.slim.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <link href="../css/contactus.css" rel="stylesheet">

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
        <!-------------------------------------------------------Contaxct Us---------------------------------------------->
        
            <div class="container shadow-lg p-4 mb-5 bg-white rounded glry">
                <div class="row">
                    <div class="theading col-12 text-center text-uppercase text-monospace font-weight-bolder"><h1 class="font-weight-bolder">Contact Us</h1></div>
                </div>
                <hr class="mb-4"></hr>
                <form>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong><i class="fas fa-info-circle"></i></strong><b> Fell free to contact us for any queries about our services.</b>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Joe Russo" required>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="joe.russo@gmail.com" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comment">Message</label>
                                <textarea class="form-control" rows="6" id="comment" placeholder="Message" required></textarea>
                            </div>
                            <button type="submit" class="btn tbtn btn-primary col-12">Send</button>
                        </div>
                    </div> 
                </form>
                <hr class="mb-4"></hr>
                <p class="font-weight-normal pb-4 text-center">If you want to mail us directly, use this email addtess: <a class="text-decoration-none" href="mailto:someone@example.com">abc@imagex.com</a></p>
            </div>

        <!-------------------------------------------------------Footer Section---------------------------------------------------->
        <?php require_once('include/footer.php'); ?>
    </body>
</html>