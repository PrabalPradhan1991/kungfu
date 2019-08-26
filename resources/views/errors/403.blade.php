
@include('user.include.header')

<div class="container">
	<p>@if($message) {{ $message }} @else You are not allowed to view this page @endif</p>
</div>
@include('user.include.footer')
<script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
</body>
</html>