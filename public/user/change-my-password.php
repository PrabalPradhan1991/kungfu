<?php include 'include/header.php';?>


<div class="container">
	
	
	<div class="row">

		<?php include 'include/left-sidebar.php';?>
		
		<div class="col-md-9">
			<div class="chpass">
			
			<div class="row">
				<div class="col-md-7">
					<center><h1>Change Password</h1></center>
					<h4>Password Tips :</h4>
					<ul>
						<li><i class="fa fa-check" aria-hidden="true"></i>
 							<span>Do not use obvious words like your name, your town or date of birth.</span>
 						</li>
						<li><i class="fa fa-check" aria-hidden="true"></i>
 							<span>Don't pick a short password</span>
 						</li>
						<li><i class="fa fa-check" aria-hidden="true"></i>
 							<span>Ensure that you use a variety of letters, numbers, symbols, spaces and capital letters.</span>
 						</li>

					</ul>

				</div>
				<div class="col-md-5">
					<form method="post">
	<div class="form-group">
		<label>Current Password</label>
		<input type="password" name="current_password" class="form-control">
		<span class="error-block">
			
		</span>
	</div>

	<div class="form-group">
		<label>New Password</label>
		<input type="password" name="new_password" class="form-control">
		<span class="error-block">
			
		</span>
	</div>

	<div class="form-group">
		<label>Confirm Password</label>
		<input type="password" name="confirm_password" class="form-control">
		<span class="error-block">
			
		</span>
	</div>

	
	<input type="submit" value="Change" class="btn btn-default btn-flat">
</form>

				</div>

			</div>	
		
			

		</div>
	</div>
	</div>
		
	</div>
		
</div>	
<?php include 'include/footer.php';?>
</body>