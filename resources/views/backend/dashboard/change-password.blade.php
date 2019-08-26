@extends($extend_page)

@section('custom-css')
<style>
	.chpass-top{margin-top:0px;}
	.chpass{margin-top:14px; border:1px solid #ccc; padding: 20px; }
 h1{text-align: center; color: #008FDE;  font-size: 24px; letter-spacing: 1px;
}
.chpass h1{margin:0; color: #008FDE;
display: inline-block;
border-bottom: 3px solid;
padding-bottom: 10px;
margin-bottom: 20px;}
.chpass ul li{margin-bottom: 10px; list-style: none;}
.chpass ul li i{ width: 6%;  font-size: 18px;}
.chpass ul li span {
    display: inline-block;
    vertical-align: middle;
    width: 80%;
}



</style>
@stop

@section('content')

<div class="chpass-top">
<div class="container">

	<div class="row">
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
			@if($errors->has('current_password'))
				@foreach($errors->get('current_password') as $e)
					<p>{{ $e }}</p>
				@endforeach
			@endif
		</span>
	</div>

	<div class="form-group">
		<label>New Password</label>
		<input type="password" name="new_password" class="form-control">
		<span class="error-block">
			@if($errors->has('new_password'))
				@foreach($errors->get('new_password') as $e)
					<p>{{ $e }}</p>
				@endforeach
			@endif
		</span>
	</div>

	<div class="form-group">
		<label>Confirm Password</label>
		<input type="password" name="confirm_password" class="form-control">
		<span class="error-block">
			@if($errors->has('confirm_password'))
				@foreach($errors->get('confirm_password') as $e)
					<p>{{ $e }}</p>
				@endforeach
			@endif
		</span>
	</div>

	{{ csrf_field() }}
	<input type="submit" value="Change" class="btn btn-danger btn-flat">
</form>

				</div>

			</div>	
		
			

		</div>
	</div>

	</div>
</div>
</div>
@stop

@section('custom-js')

@stop