<!DOCTYPE html>
<html>
<head>
	<title>Request Access To Grade</title>
</head>
<body>
	<p>User {{ $user->name }} has request access to {{ $stage->stage_name }}</p>
	<p>Email: {{ $user->email }}</p>
	<p>Phone: {{ $user->phone }}</p>
	
	<p><a href="{{ route('admin-stage-requests-get') }}">Click here</a> to view the full list</p>
</body>
</html>