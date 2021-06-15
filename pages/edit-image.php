<?php
    require('../connect.php');
    //Get image id from profile page
    if (isset($_POST['id'])) {
        $edit_img_id=$_POST['id'];
    //Get image data from database
    $sql="SELECT * FROM images WHERE id='$edit_img_id'";
    $result_edit=$connect->query($sql);
    $row_edit=$result_edit->fetch_assoc();
?>
<form id="formUpdate">
<div class="form-row">
<div class="form-group col-md-12">
                                        <label for="title"><i class="fad fa-file-signature"></i> Image Name</label>
                                        <input type="hidden" name="editID" value="<?php echo $row_edit['id'] ?>">
                                        <input type="text" name="title" class="fc form-control" placeholder="Beautiful Nature" value="<?php echo $row_edit['title'] ?>" minlength="5" maxlength="15" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputimgtype"><i class="fad fa-grip-horizontal"></i> Image Type</label>
                                        <select name="imgcat" class="fc form-control" aria-placeholder="Moun" required>
                                            <?php
                                                $sql="SELECT * FROM categories ORDER BY category ASC";
                                                $result_cat=$connect->query($sql);
                                                while($row_cat=$result_cat->fetch_assoc()):
                                            ?>
                                            <option value="<?php echo $row_cat['id']; ?>" <?php if($row_edit['category']==$row_cat['id']){echo "selected";}?>><?php echo $row_cat['category']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="title"><i class="fad fa-globe-americas"></i> Image Visibility</label>
                                        <select name="visibility" class="fc form-control" required>
                                            <option value="0" <?php if($row_edit['visibility']==0){echo "selected";} ?>>Public</option>
                                            <option value="1" <?php if($row_edit['visibility']==1){echo "selected";} ?>>Private</option>
                                        </select>    
                                    </div>
 </div>
 <button type="submit" class="fc btn btn-success col-12"><i class="fad fa-check-circle"></i> Save changes</button>
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
                            // $('#staticBackdrop').hide();
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
            echo "<script>alert('Image Updated Successfully!');</script>";
        }
        else{
            echo "<script>alert('Unable to update the image details!');</script>";
        }
    }
 ?>