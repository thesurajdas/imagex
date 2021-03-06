<!----------------------Footer Section---------------------------------------------------->
        <footer>
            <div class="bg-light text-dark pt-1">
                    <div class="container">
                        <div class="row text-center text-md-left ">
                            <div class="col-md-10 col-xl-10 col-lg-10">
                                <div class="col-12 mt-3">
                                    <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">About</h5>
                                    <hrc class="mb-4">
                                    <p><?php echo $row_config['site_desc']; ?></p>
                                </div>
                                <div class="col-lg-8 col-md-12 col-xl-8 col-sm-12 mt-3">
                                    <div class="qll">
                                        <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">Quick Links</h5>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>
                                                    <a href="about.php" class="text-dark" style="text-decoration: none;" ><i class="fad fa-person-sign"></i> About Us</a>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p>
                                                    <a href="contact.php" class="text-dark" style="text-decoration: none;" ><i class="fad fa-address-book"></i> Contact Us</a>
                                                </p>
                                            </div>
                                            <div class="col-md-2">
                                                <p>
                                                    <a href="terms.php" class="text-dark" style="text-decoration: none;" data-toggle="tooltip" title="Terms And Conditions" ><i class="fad fa-file-check"></i> Terms</a>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p>
                                                    <a href="privacy.php" class="text-dark" style="text-decoration: none;" ><i class="fad fa-shield-check"></i> Privacy</a>
                                                </p>
                                            </div>
                                        </div>    
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-2 col-lg-2 col-xl-2 mt-3">
                                <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">Connect with</h5>
                                    <div class="container pl-0">
                                        <div class="col-md-2">
                                            <div class="social-icons">
                                                <a href="#" ><img src="assets/img/fb.png" loading="lazy"></a>
                                                <a href="#"><img src="assets/img/ins.png" loading="lazy"></a>
                                                <a href="#"><img src="assets/img/tw.png" loading="lazy"></a>
                                                <a href="#"><img src="assets/img/in.png" loading="lazy"></a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="row d-flex justify-content-center">
                            <div>
                                <p>
                                    Copyright &copy; <span id="year"></span><script>let d = new Date(); let n = d.getFullYear(); document.getElementById("year").innerHTML = n;</script> <a style="text-decoration: none;" href="<?php echo $site_url; ?>"><strong class="text-dark" style="text-decoration: none;"> <?php echo $row_config['site_name']; ?> </strong></a> - All rights reserved
                                </p>
                            </div>
                        </div>
                    </div>
            <div>    
        </footer>
<!-------bootstrap tooltip script---->
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script>
        //Send Searching Request
    $(document).ready(function(){
        $('#query').keyup(function(){
            var query = $(this).val();
            if(query!=''){
                $.ajax({
                    url: "search-value.php",
                    method: "GET",
                    data: {q:query},
                    success: function(data){
                        $('#search-box').fadeIn("fast").html(data);
                    }
                });
            }
            else{
                $('#search-box').fadeOut();
            }
        });
    });
    $(document).on('click','#search-box a',function(){
        $('#query').val($(this).text());
        $('#search-box').fadeOut("fast");
    });
</script>