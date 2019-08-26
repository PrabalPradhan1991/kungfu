@include('user.include.header')
<div class="container">
	<h3>Sorry, {{ $details->name }}!</h3>
	<p>Your membership has expired. Please <a href="{{ route('paywithpaypal', $user_id) }}">Click Here</a> to renew your subscription. For support please contact info@traditionalshaolin.com </p>
</div>
@include('user.include.footer')
</body>
</html>