@include('user.include.header')

<div class="container">
	<form method="post" action="{{ route('paypal', $user_id) }}">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="paypal">
						<i class="fas fa-link"></i>

						<p>You would be redirected to paypal for the payment of the subscription fees. upon successful payment you will be logged in to the membership area.</p>
						{{ csrf_field() }}
						<input type="submit" class="btn btn-login btn-flat" value="By Paypal" name="payment_method">
					</div>
				<div class="col-md-3"></div>		
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