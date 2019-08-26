<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Traditional Shaolin Kung Fu</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('assets/css/fonts.min.css')}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css ')}}">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css ')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css ')}}">
	@yield('custom-css')
</head>
<body>
	<div class="wrapper">
        @include('backend.header')
        @include('backend.sidebar')
        <div class="main-panel">
			<div class="content">
		        @yield('content')
		    </div>
		</div>
		<input type="hidden" id="ajax-upload-image-post" value="{{ route('ajax-upload-image-post') }}">
	</div>	
	<!--   Core JS Files   -->
	<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js ')}}"></script>
	<script src="{{ asset('assets/js/core/popper.min.js ')}}"></script>
	<script src="{{ asset('assets/js/core/bootstrap.min.js ')}}"></script>

	<!-- jQuery UI -->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js ')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js ')}}"></script>


	<!-- Chart JS -->
	<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js ')}}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js ')}}"></script>

	<!-- Chart Circle -->
	<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js ')}}"></script>

	<!-- Datatables -->
	<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js ')}}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js ')}}"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	<script type="text/javascript" src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
	<!-- jQuery Vector Maps -->
	<script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js ')}}"></script>
	<script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js ')}}"></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js ')}}"></script>

	<!-- Atlantis JS -->
	<script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
	<script src="{{ asset('core/js/confirm-dialogue.js') }}"></script>
	<script type="text/javascript">

		$(function()
		{
			$('.collapse').each(function(e)
			{
				var collapse_element = $(this)
				var navs = $(this).find('.nav-item')
				navs.each(function(e)
				{
					let link = $(this).find('a').attr('href');
					console.log(link)
					if(link == '{{ url()->current() }}')
					{

						$(this).addClass('active');
						collapse_element.addClass('show')
					}	
				})
			})
		})
		@if(\Session::has('success-msg'))
			$.notify({
				icon: 'fa fa-bell',
				title: '<strong>Heads up!</strong>',
				message: '{{ \Session::get('success-msg') }}'
			},{
				type: 'success'
			});
		@endif

		@if(\Session::has('error-msg'))
			$.notify({
				icon: 'fa fa-bell',
				title: '<strong>Heads up!</strong>',
				message: '{{ \Session::get('error-msg') }}'
			},{
				type: 'danger'
			});
		@endif

		@if(\Session::has('friendly-error-msg'))
			$.notify({
					icon: 'fa fa-bell',
					title: '<strong>Heads up!</strong>',
					message: '{{ \Session::get('friendly-error-msg') }}'
				},{
					type: 'info'
			});
		@endif

		@if(\Session::has('warning-msg'))
			$.notify({
					icon: 'fa fa-bell',
					title: '<strong>Heads up!</strong>',
					message: '{{ \Session::get('warning-msg') }}'
				},{
					type: 'warning'
			});
		@endif
	</script>
	<script type="text/javascript">
		$('#add-row').DataTable({
					"oSearch": { "bSmart": false, "bRegex": true },
					"pageLength": 20,
					"ordering": true
				});
	</script>
	@yield('custom-js')
	
</body>
</html>


