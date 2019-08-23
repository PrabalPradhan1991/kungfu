<!DOCTYPE html>
<html>
<head>
	<title>Password Change</title>
</head>
<body>
	<p>Hello {{ $user_details->name }},</p>
	<p>Email: {{ $user_details->email }}</p>
	<p>Here is your new password.</p>
	<p>{{ $parameters['password'] }}</p>
</body>
</html>