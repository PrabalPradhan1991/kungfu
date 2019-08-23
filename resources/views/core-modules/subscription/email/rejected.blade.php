<!DOCTYPE html>
<html>
<head>
	<title>Subscription Rejected</title>
</head>
<body>
	<p>Hello <b>{{ $user->name }}</b>,</p>
	<p>We could not verify your payment. Please confirm the payment by going to following <a href="{{ route('paywithpaypal', $user->user_id) }}">link</a>. Or if any queries please contact us at contact@traditionalshaolin.com.au</p>
</body>
</html>