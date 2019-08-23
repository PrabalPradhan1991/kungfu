
<?php include 'include/header.php';?>



	<div class="container">
<div class="login-page">
	<div class="row">
		<div class="col-md-2 col-xs-12"></div>	
		<div class="col-md-8 col-xs-12">
			
<div class="col-container">
  <div class="col">
<div class="col-md-7">
<div class="login-left">	
			<h1>Log In </h1>
		
		<form name="login" action="" method="post">
			<div class="form-group col-sm-12">
			    <label for="phone" class="h4">Email Address</label>
	            <input name="email" type="text" class="form-control" id="user_login" placeholder="Email Address" required="">
            	<div class="help-block with-errors"></div>
    		</div>
    <div class="form-group col-sm-12">
            <label for="phone" class="h4">Password</label>
            <input name="password" type="password" class="form-control" id="user_pass" placeholder="Password" required="">
             <div class="help-block with-errors"></div>
    </div>
    <div class="form-group col-sm-12">
            <input name="rememberme" type="checkbox" value="forever" id="rememberme" class="tml-checkbox">
			<label class="tml-label" for="rememberme">Remember Me</label>
             <div class="help-block with-errors"></div>
    </div>
    <div class="form-group col-sm-12">
    	
    	    <input name="submit" type="submit" value="Log In" class="tml-button">
     </div>
 
</form>
<ul class="tml-links">
	<li class="tml-lostpassword-link"><a href="forgot-password.php">Lost your password?</a></li>
</ul>
	</div>
</div>
<div class="col-md-5">
<div class="login-right">
		<ul>
			<li>Get access to your listings</li>
			<li>Edit your post &amp; user profile</li>
			<li>Detailed Statistics ( Views , Discussion , Notifications )</li>
		</ul>
		<div class="login-box-btm text-center sign-side">
                                <p class="login-p-desc"> Don't have an account? <br>
                                    <a href="register.php"><strong style="color: #fff;">Sign Up !</strong> </a></p>
                                    
                            </div>			
<center><img src="images/cta-kungfu.png" alt="" class="img-responsive"></center>
<p class="signup"> Don't have an account?
                                    <a href="register.php"><strong>Sign Up !</strong> </a></p>

					</div>
   
</div>

  </div>

 
</div>

		</div>

		
	</div>
</div>
</div>
<?php include 'include/footer.php';?>
<script src="js/bootstrap.min.js"></script>
</body>
</html>