<?php include 'include/header.php';?>


<div class="container">
	
	
	<div class="row">

		<?php include 'include/left-sidebar.php';?>
		
		<div class="col-md-9">
			<div class="changedetails">
			<form method="post" enctype="multipart/form-data" id="update-details">
			<div class="row">
				
				<div class="col-md-12"><center><h1>Change Details</h1></center></div>
				<div class="col-md-4">
								<div class="form-group">
								
								<center> <a href="#">
				                         		<img src="images/user-img.png" alt="" style="object-fit:contain;" class="img-responsive userImg"></a>
				                         		<div class="profile"><p>Profile Image</p></div>
				                         	</center>
								
							</div>
					
			
				</div>
				<div class="col-md-8">
					<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>First Name</label>
					<input type="text" name="first_name" class="form-control" value="">
					<span class="error-block">
						
					</span>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" name="last_name" class="form-control" value="">
					<span class="error-block">
						
					</span>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" value="">
					<span class="error-block">
						
					</span>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Phone</label>
					<input type="text" name="phone" class="form-control" value="">
					<span class="error-block">
						
					</span>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Company Or Agency</label>
					<input type="text" name="company_or_agency" class="form-control" value="">
					<span class="error-block">
						
					</span>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Street Address</label>
					<input type="text" name="street_address" class="form-control" value="">
					<span class="error-block">
						
					</span>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>City</label>
					<input type="text" name="address_line_1" class="form-control" value="">
					<span class="error-block">
						
					</span>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>State</label>
					<input type="text" name="address_line_2" class="form-control" value="">
					<span class="error-block">
						
					</span>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Postal Code</label>
					<input type="text" name="postal_code" class="form-control" value="">
					<span class="error-block">
						
					</span>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Cell Phone</label>
					<input type="text" name="cell_phone" class="form-control" value="">
					<span class="error-block">
						
					</span>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Fax</label>
					<input type="text" name="fax" class="form-control" value="">
					<span class="error-block">
						
					</span>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					
	
		</div>
		 <button type="submit" class="btn btn-default" value="Edit">Save</button>
		</div>

				</div>
			</div>

			
		</div>
		</div>
		</div>
		</div>
	</form>
	<form method="post" action="" id="">

	</form>
		</div>

		
	</div>
		
</div>	
<?php include 'include/footer.php';?>
<script>
      function addClassToBtnRemove() {
         $('#prabal-ajax-upload-image .btn-remove').addClass('a_submit_button')
         $('#prabal-ajax-upload-image .btn-remove').attr('related-id', 'delete-profile-picture-post')
      }

      $(function(){
         addClassToBtnRemove()
      })
   </script>
</body>