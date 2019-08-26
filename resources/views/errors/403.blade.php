
@include('user.include.header')

<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="page-not-found">
				<h1><i class="fas fa-ban"></i></h1>
				<p>@if($message) {{ $message }} @else You are not allowed to view this page @endif</p>
			</h1>
		</div>
		<div class="col-md-3"></div>
	</div>
	
</div>
@include('user.include.footer')
<script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
</body>
</html>