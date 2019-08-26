@include('user.include.header')
<div class="container">
	<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="yme">
					<h3><i class="fas fa-exclamation-circle"></i> Sorry, {{ $details->name }}!</h3>
					<p>Your membership has expired. Please <a href="{{ route('paywithpaypal', $user_id) }}">Click Here</a> to renew your subscription. For support please contact info@traditionalshaolin.com </p>
				</div>
			</div>
			<div class="col-md-3"></div>
	</div>			
</div>
@include('user.include.footer')
</body>
</html>