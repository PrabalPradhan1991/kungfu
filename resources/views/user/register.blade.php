@include('user.include.header')

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
									<input type="text" name="name" class="form-control" value="{{ request()->old('name') }}">
									<span class="error-block">
										@if($errors->has('name'))
											@foreach($errors->get('name') as $e)
												<p>{{ str_replace('details.', '', $e) }}</p>
											@endforeach
										@endif
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" value="{{ request()->old('email') }}">
									<span class="error-block">
										@if($errors->has('email'))
											@foreach($errors->get('email') as $e)
												<p>{{ str_replace('details.', '', $e) }}</p>
											@endforeach
										@endif
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Phone </label>
									<input type="text" name="details[phone]" class="form-control" value="{{ request()->old('details.phone') }}">
									<span class="error-block">
										@if($errors->has('details.phone'))
											@foreach($errors->get('details.phone') as $e)
												<p>{{ str_replace('details.', '', $e) }}</p>
											@endforeach
										@endif
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>DOB</label>
									<input type="text" name="details[dob]" class="date form-control" value="{{ request()->old('details.dob') }}">
									<span class="error-block">
										@if($errors->has('details.dob'))
											@foreach($errors->get('details.dob') as $e)
												<p>{{ str_replace('details.', '', $e) }}</p>
											@endforeach
										@endif
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>St Address</label>
									<input type="text" name="details[street_address]" class="form-control" value="{{ request()->old('details.street_address') }}">
									<span class="error-block">
										@if($errors->has('details.street_address'))
											@foreach($errors->get('details.street_address') as $e)
												<p>{{ str_replace('details.', '', $e) }}</p>
											@endforeach
										@endif
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Suburb</label>
									<input type="text" name="details[suburb]" class="form-control" value="{{ request()->old('details.suburb') }}">
									<span class="error-block">
										@if($errors->has('details.suburb'))
											@foreach($errors->get('details.suburb') as $e)
												<p>{{ str_replace('details.', '', $e) }}</p>
											@endforeach
										@endif
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>State</label>
										<select class="form-control" id="exampleFormControlSelect1" name="details[state]" required>
											<option value="">All</option>
											@foreach(\App\UserDetailsModel::$states as $s)
												<option value="{{ $s }}" @if($s == request()->old('details.state')) selected @endif>{{ $s }}</option>
											@endforeach
										</select>
										<span class="error-block">
										@if($errors->has('details.state'))
											@foreach($errors->get('details.state') as $e)
												<p>{{ str_replace('details.', '', $e) }}</p>
											@endforeach
										@endif
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Post code</label>
									<input type="text" name="details[post_code]" class="form-control" value="{{ request()->old('details.post_code') }}">
									<span class="error-block">
										@if($errors->has('details.post_code'))
											@foreach($errors->get('details.post_code') as $e)
												<p>{{ str_replace('details.', '', $e) }}</p>
											@endforeach
										@endif
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" value="">
									<span class="error-block">
										@if($errors->has('password'))
											@foreach($errors->get('password') as $e)
												<p>{{ str_replace('details.', '', $e) }}</p>
											@endforeach
										@endif
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Confirm password</label>
									<input type="password" name="confirm_password" class="form-control" value="">
									<span class="error-block">
										@if($errors->has('confirm_password'))
											@foreach($errors->get('confirm_password') as $e)
												<p>{{ str_replace('details.', '', $e) }}</p>
											@endforeach
										@endif
									</span>
								</div>
							</div>
							<div class="col-md-12">
								<h4>PAYMENT: </h4>
								<p><b>Registration & access to the membership area requires an annual payment of $100. upon successfull registration you can access the membership area and its contents.</b></p>
							</div>
							<div class="col-md-12">
									<div class="form-check form-check-inline">
										<input  class="form-check-input" type="radio" name="payment_type" id="inlineRadio1" value="pay_by_bank" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
										<label  class="form-check-label" for="inlineRadio1">PAY BY BANK</label>
										<span class="error-block">
											@if($errors->has('payment_type'))
												@foreach($errors->get('payment_type') as $e)
													<p>{{ str_replace('details.', '', $e) }}</p>
												@endforeach
											@endif
										</span>
									</div>
									<div class="form-check form-check-inline">
										<input  class="form-check-input" type="radio" name="payment_type" id="inlineRadio2" value="pay_by_paypal">
										<label  class="form-check-label" for="inlineRadio2">PAY BY PAYPAL</label>
										<span class="error-block">
											@if($errors->has('payment_type'))
												@foreach($errors->get('payment_type') as $e)
													<p>{{ str_replace('details.', '', $e) }}</p>
												@endforeach
											@endif
										</span>
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
								{{ csrf_field() }}
								<button type="submit" class="btn btn-default">Submit</button>
							</div>

						</div>
					
				</form>
			</div>
			<div class="col-md-4">
				
	  			<div class="reagister-image-header ">	
	         		<h3>Registration allows you to:</h3>
	         		<ul>
	         			<li><i class="fa fa-check"></i> Access the membership area</li>
	         			<li><i class="fa fa-check"></i> Access exclusive content</li>
	         			<li><i class="fa fa-check"></i> Train with the grading system</li>
	         			<li><i class="fa fa-check"></i> Edit your personal infos</li>
	         		</ul>
	         	</div>
	         	<div class="row justify-content-sm-center">	
	         			<div class="col-sm-11 col-xs-12">
	         				<center><img src="{{ asset('user/images/c700x420.jpg') }}" class="img img-responsive "></center>
	         			</div>
	         	</div>	
			         	<p></p>			
			         	<p style="font-size: 13px; text-align: center;">Already have an account <a href="login.php">Log in</a>
			         	</p>

		    </div>

		</div>
	</div>

</div>
@include('user.include.footer')
  <script type="text/javascript">
  	/*$('#inlineRadio1').on('click', function(){
  $(this).parent().find('a').trigger('click')
})*/

$('#inlineRadio2').on('click', function(e){
  //e.preventDefault()
  console.log()
  if($('#inlineRadio1').attr('aria-expanded') == "true") {
  	$('#inlineRadio1').attr('aria-expanded', 'false')
  	$('#inlineRadio1').click()
  }
  $(this).prop('checked', true)
})

  </script>

</body>
</html>