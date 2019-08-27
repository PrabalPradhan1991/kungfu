@include('user.include.header')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="confirmation">
				<h1>Congratulations, {{ $details->name }}!</h1>
				<p>You have successfully registered in our website. We have sent you an email in {{ $details->email }} with your login details. Once we verify the payment, you will be able to access your dashboard through this <a href="{{ route('login') }}">link</a></p>
			</div>
		</div>		
	</div>
</div>
@include('user.include.footer')
</body>
</html>