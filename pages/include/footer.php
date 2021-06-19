<footer>
            <div class="bg-light text-dark pt-1">
                <div class="container">
                    <div class="row text-center text-md-left ">
                        <div class="col-md-10 col-xl-10 col-lg-10">
                            <div class="col-12 mt-3">
                                <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">About</h5>
                                <hrc class="mb-4">
                                <p><b>Pixwave</b> started with a vision of giving all users a place where users upload and download their pictures taken by mobile phone.
                            </div>
                            <div class="col-lg-8 col-md-12 col-xl-8 col-sm-12 mt-3">
                                <div class="qll">
                                    <h5 class="text-uppercase mb-4 font-wight-bold text-info text-dark">Quick Links</h5>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p>
                                                <a href="aboutus.php" class="text-dark" style="text-decoration: none;" ><i class="fad fa-person-sign"></i> About Us</a>
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
                                                <a href="privacy.php" class="text-dark" style="text-decoration: none;" ><i class="fad fa-shield-check"></i> Privacy Policy</a>
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
                                            <a href="#" ><img src="assets/img/fb.png"></a>
                                            <a href="#"><img src="assets/img/ins.png"></a>
                                            <a href="#"><img src="assets/img/tw.png"></a>
                                            <a href="#"><img src="assets/img/in.png"></a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="row d-flex justify-content-center">
                        <div>
                            <p>
                                Copyright &copy; <script>document.write(new Date().getFullYear())</script> <a style="text-decoration: none;" href="/"><strong class="text-dark" style="text-decoration: none;"> PIXWAVE </strong></a> - All rights reserved
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