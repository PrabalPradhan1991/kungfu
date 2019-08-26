<!DOCTYPE html>
<html>
<head>
	<title>Welcome Email</title>
</head>
<body>
	<p>Hello {{ $parameters->name }},</p>
	<p>Welcome to Traditional Shaolin Kung Fu Academy Sydney</p>
	<p>Once we verify the payment, you can <a href="{{ route('login') }}">login</a> to your dashboard with following credentials: </p>
	<ul>
		<li>Username: {{ $parameters->email }}</li>
	</ul>
</body>
</html>