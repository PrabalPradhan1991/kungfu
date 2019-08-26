<!DOCTYPE html>
<html>
<head>
	<title>Request Status Mail</title>
</head>
<body>
	@if($status == 'approved')
		<p>Congratulations <b>{{ $user->name }}</b></p>
		<p>Your request to view {{ $stage->stage_name }} has been accepted. Please <a href="{{ route('view-stage', $stage->id) }}">click here</a> for access.</p>
	@else
		<p>Sorry <b>{{ $user->name }}</b></p>
		<p>Your request to view {{ $stage->stage_name }} has been rejected. Please contact us for further querires</p>
	@endif
</body>
</html>