<?php include 'include/header.php';?>

	
<div class="container">
	<div class="register">
		<div class="row">
			<div class="col-md-12">
				<center>
					<h1>Create your account </h1>
					<p>Its Free to sign up</p>
				</center>
			</div>
			<div class="col-md-8">
				<form method="post" enctype="">
					<h3><i class="fa fa-address-book"></i> DETAILS :</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Phone </label>
									<input type="text" name="phone" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Age</label>
									<input type="text" name="age" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>St Address</label>
									<input type="text" name="stadd" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Suburb</label>
									<input type="text" name="suburb" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>State</label>
										<select class="form-control" id="exampleFormControlSelect1">
										<option>NSW</option>
										<option>QLD</option>
										<option>VIC</option>
										<option>TAS</option>
										<option>NT</option>
										<option>SA</option>
										<option>WA</option>
										</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Post code</label>
									<input type="text" name="pcode" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="pwd" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Confirm password</label>
									<input type="password" name="cpwd" class="form-control" value="">
								</div>
							</div>
							<div class="col-md-12">
								<h4>PAYMENT: </h4>
								<p><b>Registration & access to the membership area requires an annual payment of $100. upon successfull registration you can access the membership area and its contents.</b></p>
							</div>
							<div class="col-md-12">
									<div class="form-check form-check-inline">
									<input  class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
									<label  class="form-check-label" for="inlineRadio1">PAY BY BANK</label>
									</div>
									<div class="form-check form-check-inline">
									<input  class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
									<label  class="form-check-label" for="inlineRadio2">PAY BY PAYPAL</label>
									</div>

									<div class="collapse" id="collapseExample">
									  <div class="card card-body">
									  	<p></p>
									    <p>Please have the $100 registration fees deposited to our bank account. please include your name in the description.</p>
									    <div class="form-group">
											<p><b>Account Name :</b> xxxxxx</p>
											<p><b>BSB :</b> xxxxxx</p>
											<p><b>Account Number :</b> xxxxxx</p>
										</div>
																		
									  </div>
									</div>
							</div>
							
							<div class="col-md-12">
							
								<p></p>
								<button type="submit" class="btn btn-default">Submit</button>
							</div>

						</div>
					
				</form>
			</div>
			<div class="col-md-4">
				
	  			<div class="reagister-image-header ">	
	         		<h3>Registration allows you to:</h3>
	         		<ul>
	         			<li><i class="fa fa-check"></i> post free ads &amp; jobs</li>
	         			<li><i class="fa fa-check"></i> interact with other users and employers</li>
	         			<li><i class="fa fa-check"></i> control &amp; edit your content</li>
	         			<li><i class="fa fa-check"></i> get notifications on all account actions</li>
	         		</ul>
	         	</div>
	         	<div class="row justify-content-sm-center">	
	         			<div class="col-sm-11 col-xs-12">
	         				<center><img src="images/c700x420.jpg" class="img img-responsive "></center>
	         			</div>
	         	</div>	
			         	<p></p>			
			         	<p style="font-size: 13px; text-align: center;">Already have an account <a href="login.php">Log in</a>
			         	</p>

		    </div>

		</div>
	</div>

</div>
<?php include 'include/footer.php';?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	$('#r11').on('click', function(){
  $(this).parent().find('a').trigger('click')
})

$('#r12').on('click', function(){
  $(this).parent().find('a').trigger('click')
})

  </script>

</body>