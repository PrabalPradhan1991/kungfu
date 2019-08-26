@include('user.include.header')

<div class="container">
	<form method="post" action="{{ route('paypal', $user_id) }}">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					
				</div>
			{{ csrf_field() }}
			<input type="submit" class="btn btn-success btn-flat" value="By Paypal" name="payment_method">
		</div>
	</form>

</div>
@include('user.include.footer')
  <script type="text/javascript">
  	/*$('#inlineRadio1').on('click', function(){
  $(this).parent().find('a').trigger('click')
})*/

$('#inlineRadio2').on('click', function(){
  $('#inlineRadio1').click()
  $(this).prop('checked', true)
})

  </script>

</body>