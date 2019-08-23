<!DOCTYPE html>
<html>
<head>
	<title>Request Access To Grade</title>
</head>
<body>
	<p>User {{ $user->name }} has request access to {{ $stage->stage_name }}</p>
	<p>Email: {{ $user->email }}</p>
	<p>Phone: {{ $user->phone }}</p>
	<form method="post" action="{{ route('admin-stage-requests-post', ['approved', $request_id]) }}">
		<input type="submit" class="btn btn-success" value="Approve">
		{{ csrf_field() }}
	</form>
	<form method="post" action="{{ route('admin-stage-requests-post', ['disapproved', $request_id]) }}">
		<input type="submit" class="btn btn-danger" value="Disapprove">
		{{ csrf_field() }}
	</form>
</body>
</html>