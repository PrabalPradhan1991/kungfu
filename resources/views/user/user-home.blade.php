@extends('user.main')

@section('content')
<?php  $user = \App\Http\Controllers\HelperController::getUserDetails(\Auth::user()->id) ?>
<div class="col-md-9">
	<div class="details">

		<div class="row">
			{{-- <div class="col-md-4">
				<div class="users">
	                <div class="user-profile-img-block"> 
		                <div class="user-profile-img text-center">
		                	<h3>Hi, {{ $user->name }}</h3>
	                        <center> <a href="#">
	                         		<img src="{{ asset('user/images/user-img.png') }}" alt="" style="object-fit:contain;" class="img-responsive userImg"></a>
	                        </center>
		                </div>
	                </div> 
  				</div>
			</div> --}}

			<div class="col-md-6">
				<div class="details">
					<p><b><i class="fas fa-eye-dropper"></i></b>name: {{ $user->name }}</p>
					<p><b><i class="fas fa-envelope"></i></b>email: {{ $user->email }}</p>
					<p><b><i class="fas fa-mobile-alt"></i></b> phone: {{ $user->phone }} </p>
					<p><b><i class="fas fa-map-marker-alt"></i></b>location: {{ $user->street_address }}, {{ $user->suburb }}, {{ $user->state }}</p>
					<p><b><i class="fas fa-user"></i></b>membership: {{ \App\Http\Controllers\CoreModules\Subscription\PaymentDetailsModel::where('user_id', $user->user_id)->first()->expiration_date }}</p>
				</div>
			</div>
			<div class="col-md-12">
				<div class="grading-system">
					<div class="row">
						<div class="col-md-10 col-xs-12">
							<h4>Get access to Grading System</h4>
						</div>
						<div class="col-md-2 col-xs-4"><center><a href="{{ route('view-stages') }}"><button type="btn" class="btn btn-default">Buy Now</button></a></center></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop