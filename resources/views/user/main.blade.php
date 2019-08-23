@include('user.include.header')


<div class="container">
	
	
	<div class="row">

		@include('user.include.left-sidebar')
		
		@yield('content')
		
	</div>	
</div>
@include('user.include.footer')
@yield('custom-js')
</body>
</html>

