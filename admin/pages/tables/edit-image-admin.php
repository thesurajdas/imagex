<?php
    //Add database connection
    require('../../auth.php');
        //Get image id from profile page
        if (isset($_POST['id'])) {
            $edit_img_id=$_POST['id'];
        //Get image data from database
        $sql="SELECT * FROM images WHERE id='$edit_img_id'";
        $result_edit=$connect->query($sql);
        $row_edit=$result_edit->fetch_assoc();
    ?>
<div id="loadupdate"></div>
<h4 class="col-12 ntxt">Image Info</h4>
                                <hr class="mb-4">
                                <form id="formUpdate">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                        <label for="jd"> Image Id</label>
                                        <input type="number" class="form-control" name="editID" value="<?php echo $row_edit['id']; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="vew">Views</label>
                                        <input type="number" class="form-control" value="<?php echo $row_edit['views']; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="hrts">Likes</label>
                                            <input type="number" class="form-control" value="<?php echo $row_edit['likes']; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="dlod">Downloads</label>
                                            <input type="number" class="form-control" value="<?php echo $row_edit['downloads']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="fname">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Full Name" value="Iamge name" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="phone">License</label>
                                            <select class="form-control" name="country" required>
                                                <option value="Unkown">Choose...</option>
                                                    <option value="Copyright Free">Copyright Free</option>
                                                    <option value="Private">Creative Commons</option>
                                                    <option value="Public Domain">Public Domain</option>
                                            </select>    
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="ctgry">Category</label>
                                            <input type="text" class="form-control" name="email" placeholder="example@email.com" value="Nature" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="phone">Visibility</label>
                                            <select class="form-control" name="country" required>
                                                <option value="Unkown">Choose...</option>
                                                    <option value="Public" style="color:darkgreen">Public</option>
                                                    <option value="Private" style="color:darkred">Private</option>
                                            </select>    
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="phone">Download</label>
                                            <select class="form-control" name="country" required>
                                                <option value="Unkown">Choose...</option>
                                                    <option value="Grant" style="color: green;"><i class="fad fa-times"></i> Grant</option>
                                                    <option value="Denied" style="color: darkred"><i class="fad fa-times"></i> Denied</option>
                                            </select>    
                                        </div>
                                    </div>
                                    <button type="submit" name="psave" class="btn btn-primary">Save Changes</button>
                                </form> 
                              
<script>
 //Image Update Details
                $('#formUpdate').on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                        url: 'edit-image.php',
                        type: 'POST',
                        data: $('#formUpdate').serialize(),
                        success: function(result){
                            $('#loadUpdate').html(result);
                        }
                    });
                });
</script>
 <?php } ?>
 <?php
    //Get image id to update the image
    if(isset($_POST['editID'])){
        $edit_id=$_POST['editID'];
        $edit_title=$_POST['title'];
        $edit_imgcat=$_POST['imgcat'];
        $edit_visibility=$_POST['visibility'];
        //Update image details
        $sql="UPDATE images SET title='$edit_title',visibility='$edit_visibility', category='$edit_imgcat' WHERE id='$edit_id'";
        if($connect->query($sql)===TRUE){
        ?>
            <script>
                $(document).ready(function(){
                    $('#loadupdate').html("<div class='alert alert-success' role='alert'>Image details updated successfully!</div>");
                });
            </script>
        <?php
        }
        else{
           ?>
           <script>
                $(document).ready(function(){
                    $('#loadupdate').html("<div class='alert alert-danger' role='alert'>Unable to update the details!</div>");
                });
            </script>
           <?php
        }
    }
 ?>