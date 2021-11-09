<?php include 'includes/header.php'; 
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>

<body>

    <!-- Loader Begin -->

    <?php include 'includes/loader.php'; ?>
    <!-- Loader End -->

    <!-- Back To Top Begin -->

    <div id="back-top">
        <a href="#" class="scroll">
            <i class="arrow_carrot-up"></i>
        </a>
    </div>

    <!-- Back To Top End -->

    <!-- Site Wrapper Begin -->

    <div class="wrapper">

        <!-- Header Begin -->

        <?php include 'includes/navbar.php'; ?>

        <!-- header End -->

        <!-- Page Header Begins -->

        <div id="page-header">
            
            <!-- /header-bg-parallax -->
        </div>

        <!-- Page Header End -->

        <!-- Checkout Begin -->

        <div class="checkout">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        
                    </div>
                    <div class="col-md-6 col-sm-4">
                        <div class="accordion-container padding-vertical-100" style="margin:20px;">
                                    <div class="row">
                                        <strong><h1 class="text-center">Forgot Password</h1></strong>
                                       
                                        <form action="login.php" class="cart-form padding-top-35 padding-bottom-40" id="forget-form" method="post">
                                      
                                           <div class="form-group padding-bottom-5">
                                                <label for="zip">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="abc@xyz.com" required>
                                                </div>
                                                
                                                <span class="field_error" id="email_error"></span>
                                          
                                            <div class="row padding-top-20">
                                                <div class="col-md-6 col-sm-6">
                                                   <button type="button" class="btn-cart" onclick="forgot_password()" id="btn_submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /row -->
                        </div>
                        <!-- /accordion-container -->
                    </div>
                    <div class="col-md-3 col-sm-4">
                        
                    </div>
                    <!-- /column -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>

        <!-- Checkout End -->

        <!-- Footer Begin -->

        <?php include 'includes/footer.php'; ?>

        <!-- Footer End -->

    </div>

    <!-- Site Wrapper End -->

    <!--- Scripts -->
   <style>
       #login{
        color: #E04A58;
       }
       #login_email_error{
            color: #E04A58;
        }
       #login_password_error{
            color: #E04A58;
        }
   </style>
   
   <script>
//       function forgot_password(){
// 			var email=jQuery('#email').val();
// 			if(email==''){
// 				jQuery('#email_error').html('Please enter email id');
// 			}else{
// 				jQuery('#btn_submit').html('Please wait...');
// 				jQuery('#btn_submit').attr('disabled',true);
// 				jQuery.ajax({
// 					url:'forgot_password_submit.php',
// 					type:'post',
// 					data:'email='+email,
// 					success:function(result){
// 						jQuery('#email').val('');
// 						jQuery('#email_error').html(result);
// 						jQuery('#btn_submit').html('Submit');
// 						jQuery('#btn_submit').attr('disabled',false);
// 						window.location.href='login.php';
// 					}
// 				})
// 			}
// 		}
        function forgot_password(){
			jQuery('#email_error').html('');
			var email=jQuery('#email').val();
			if(email==''){
				jQuery('#email_error').html('Please enter email id');
			}else{
				jQuery('#btn_submit').html('Please wait...');
				jQuery('#btn_submit').attr('disabled',true);
				jQuery.ajax({
					url:'forgot_password_submit.php',
					type:'post',
					data:'email='+email,
					success:function(result){
						jQuery('#email').val('');
						jQuery('#email_error').html(result);
						jQuery('#btn_submit').html('Submit');
						jQuery('#btn_submit').attr('disabled',false);
					}
				})
			}
		}
   </script>
    <?php include 'includes/scripts.php'; ?>

</body>
</html>