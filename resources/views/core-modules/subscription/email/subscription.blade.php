<!DOCTYPE html>
<html>
<head>
	<title>Subscription Request</title>
</head>
<body>
	<p>You have a new subscription request!</p>
	<p>From: <b>{{ $user_details->name }}</b></p>
	<p>Email: <b>{{ $user_details->email }}</b></p>
	<p>Phone: <b>{{ $user_details->phone }}</b></p>
	<p>Type: <b>{{ $parameters['type'] }}</b></p>
	<p>{{ $parameters['description'] }}</p>

</body>
</html>