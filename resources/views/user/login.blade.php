
@include('user.include.header')
<style>
	body {
		line-height: 4.228571;
	}
</style>

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
    <br/>
    
    <div class="form-group col-sm-12">
    	
    	    <input name="submit" type="submit" value="Log In" class="tml-button">
     </div>
     {{ csrf_field() }}
 
</form>
<ul class="tml-links">
	<li class="tml-lostpassword-link"><a href="{{ route('forgot-password-get') }}">Lost your password?</a></li>
</ul>
	</div>
</div>
<div class="col-md-5">
<div class="login-right">
		<ul>
			<li>Get access to exclusive videos & training materials</li>
			<li>Access the grading system</li>
			<li>Edit your details and password</li>
		</ul>
		<div class="login-box-btm text-center sign-side">
                                <p class="login-p-desc"> Don't have an account? <br>
                                    <a href="{{ route('registration-get') }}"><strong style="color: #fff;">Sign Up !</strong> </a></p>
                                    
                            </div>			
<center><img src="{{ asset('user/images/cta-kungfu.png') }}" alt="Kungfu Registration" class="img-responsive"></center>
<p class="signup"> Don't have an account?
                                    <a href="{{ route('registration-get') }}"><strong>Sign Up !</strong> </a></p>

					</div>
   
</div>

  </div>

 
</div>

		</div>

		
	</div>
</div>
</div>
@include('user.include.footer')
<script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
</body>
</html>