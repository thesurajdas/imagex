<?php
    require_once('../auth.php');
    if($login!=1){
        header('location:login.php');
    }
    $user_active=$row['active'];
	$time=date('Y-m-d H:i:s');
    //check user active or not to upload
    if ($user_active!=0) {
        header("location: contact.php?block=1");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upload Image</title>
        <script src="assets/js/jquery.min.js"></script>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/Bold-BS4-Image-Caption-Hover-Effect-5.css">
        <link rel="stylesheet" href="assets/css/Bootstrap-Image-Uploader.css">
        <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
        <link rel="stylesheet" href="assets/css/Drag-and-Drop-File-Input.css">
        <link rel="stylesheet" href="assets/css/Drag-and-Drop-Multiple-File-Form-Input-upload-Advanced.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css"> -->
        <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
        <link rel="stylesheet" href="assets/css/News-Cards.css">
        <link rel="stylesheet" href="assets/css/Simple-Vertical-Navigation-Menu-v-10.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <link href="../css/upload.css" rel="stylesheet">
        
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/Drag-and-Drop-File-Input.js"></script>
        <script src="assets/js/Drag-and-Drop-Multiple-File-Form-Input-upload-Advanced.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

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
        <!----------------------------------------------------main containt section-------------------->
        <div class="container shadow-lg p-3 mb-5 bg-white maincon" style="border-radius: 1.25rem;">
            <div class="row">
                <div class="col-md-12 text-center hdrtxt">
                    <h1 class="display-4">Upload Your Image</h1>
                </div>
                <div class="row col-12 mr-0 ml-0 justify-content-center">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                        <!-- Upload image input-->
                        <div class="input-group rounded-pill bg-white shadow-sm ">
                            <input type="file" id="upload" name="file" onchange="readURL(this);" class="form-control border-0" accept="image/*">
                            <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                            </div>
                        </div>
            
                        <!-- Uploaded image area-->
                        <p class="font-italic text-dark text-center">The image uploaded will be rendered inside the box below. <b>(We allow only .jpg .jpeg .png images within 100KB to 5MB!)</b></p>
                        <div class="image-area col-12 dsplyimg mb-4">
                            <img draggable="false" id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block" onContextMenu="return false;">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="title" style="color: #b94d00; font-weight: 600;"><i class="fad fa-file-signature"></i> Image Name</label>
                                <input type="text" name="title" class="fc form-control" id="title" placeholder="Violet Hill" minlength="5" maxlength="16" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputimgtype" style="color: #0246bfeb; font-weight: 600;"><i class="fad fa-list-alt"></i> Image Type</label>
                                <select id="inputimgtype" name="filetype" class="fc form-control" aria-placeholder="Moun" required>
                                    <option selected></option>
                                    <?php
                                    $sql="SELECT * FROM categories";
                                    $result_cat=$connect->query($sql);
                                    while($row_cat=$result_cat->fetch_assoc()):
                                ?>
                                    <option value="<?php echo $row_cat['id']; ?>"><?php echo $row_cat['category']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="title" style="color: #148e14; font-weight: 600;"><i class="fad fa-globe-americas"></i> Image Visibility</label>
                                <select id="inputimgtype" name="visibility" class="fc form-control" required>
                                    <option value="0" selected>Public</option>
                                    <option value="1">Private</option>
                                </select>    
                            </div>
                            <div class="form-group col-md-3">
                                            <label for="phone" style="color:#bd2130; font-weight: 600;"><i class="fad fa-folder-download"></i> Download</label>
                                            <select class="form-control fc" name="country" required>
                                                    <option value="0" selected>Grant</option>
                                                    <option value="1">Denied</option>
                                            </select>    
                            </div>
                            <div class="form-group col-md-3">
                                            <label for="phone" style="color:blueviolet; font-weight: 600;"><i class="fad fa-file-certificate"></i> License</label>
                                            <select class="form-control fc" name="country" required>
                                            <?php
                                                $sql="SELECT * FROM license";
                                                $result_lic=$connect->query($sql);
                                                while($row_lic=$result_lic->fetch_assoc()):
                                            ?>
                                                <option value="<?php echo $row_lic['id']; ?>"><?php echo $row_lic['license_name']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                            </div>
                        </div>
                        <button type="submit" name="upload" class="btn btn-success col-12 bt"><i class="fas fa-arrow-circle-up"></i> Upload</button>
                        <hr>
                        <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
        <!----------------------Footer Section---------------------------------------------------->
        <?php require_once('include/footer.php'); ?>
        <script src="assets/js/Bootstrap-Image-Uploader.js"></script>
    </body>
</html>