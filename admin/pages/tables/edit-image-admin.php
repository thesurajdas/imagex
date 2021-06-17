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
                                        <label for="jd"> Image ID</label>
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
                                            <input type="text" class="form-control" name="title" placeholder="Image Name" value="<?php echo $row_edit['title']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="license">License</label>
                                            <select class="form-control" name="license_id" required>
                                            <?php
                                                $sql="SELECT * FROM license";
                                                $result_lic=$connect->query($sql);
                                                while($row_lic=$result_lic->fetch_assoc()):
                                            ?>
                                                <option value="<?php echo $row_lic['id']; ?>" <?php if($row_edit['license_id']==$row_lic['id']){echo "selected";}?>><?php echo $row_lic['license_name']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Category">Category</label>
                                            <select class="form-control" name="imgcat" required>
                                            <?php
                                                $sql="SELECT * FROM categories ORDER BY category ASC";
                                                $result_cat=$connect->query($sql);
                                                while($row_cat=$result_cat->fetch_assoc()):
                                            ?>
                                                <option value="<?php echo $row_cat['id']; ?>" <?php if($row_edit['category']==$row_cat['id']){echo "selected";}?>><?php echo $row_cat['category']; ?></option>
                                            <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Visibility">Visibility</label>
                                            <select class="form-control" name="visibility" required>
                                                    <option value="0" style="color:darkgreen" <?php if($row_edit['visibility']==0){echo "selected";} ?>>Public</option>
                                                    <option value="1" style="color:darkred" <?php if($row_edit['visibility']==1){echo "selected";} ?>>Private</option>
                                            </select>    
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="download">Download</label>
                                            <select class="form-control" name="downloadable" required>
                                                    <option value="0" style="color: green;" <?php if($row_edit['downloadable']==0){echo "selected";} ?>><i class="fad fa-times"></i> Granted</option>
                                                    <option value="1" style="color: darkred" <?php if($row_edit['downloadable']==1){echo "selected";} ?>><i class="fad fa-times"></i> Denied</option>
                                            </select>    
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
<script>
 //Image Update Details
                $('#formUpdate').on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                        url: 'edit-image-admin.php',
                        type: 'POST',
                        data: $('#formUpdate').serialize(),
                        success: function(result){
                            $('#loadupdate').html(result);
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
        $edit_downloadable=$_POST['downloadable'];
        $edit_license_id=$_POST['license_id'];
        //Update image details
        $sql="UPDATE images SET title='$edit_title',visibility='$edit_visibility', category='$edit_imgcat', downloadable='$edit_downloadable', license_id='$edit_license_id' WHERE id='$edit_id'";
        if($connect->query($sql)===TRUE){
            echo "<div class='alert alert-success' role='alert'>Image details updated successfully!</div>";
        }
        else{
           echo "<div class='alert alert-danger' role='alert'>Unable to update the details!</div>";
        }
    }
 ?>