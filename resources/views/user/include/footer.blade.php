<footer class="footer">
	
	<div class="copyright">
			<div class="container">
				Copyright © 2019, <a href="#">Traditional Shaolin Kung Fu Academy</a>. All Right Reserved.			</div>
		</div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
	$( ".date" ).datepicker({ dateFormat: 'yy-mm-dd' });
} );
</script>
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js ')}}"></script>
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

