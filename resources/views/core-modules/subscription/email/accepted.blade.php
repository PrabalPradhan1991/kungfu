<!DOCTYPE html>
<html>
<head>
	<title>Subscription Accepted</title>
</head>
<body>
	<p>Hello <b>{{ $user->name }}</b>,</p>
	<p>Your payment has been verified. You can now login into the dashboard <a href="{{ route('login') }}">Click Here</a></p>
</body>
</html>