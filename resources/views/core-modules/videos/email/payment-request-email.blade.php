<!DOCTYPE html>
<html>
<head>
	<title>Request To Purchase Grade</title>
</head>
<body>
	<p>User {{ $user->name }} has requested to purchase {{ $stage->stage_name }}</p>
	<p>Email: {{ $user->email }}</p>
	<p>Phone: {{ $user->phone }}</p>
</body>
</html>