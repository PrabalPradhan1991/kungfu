@include('user.include.header')

	<div class="container">

		<form method="post" action="{{ route('paypal', $user_id) }}">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="renew">
						<h1><i class="fas fa-hourglass-end"></i> PAYMENT</h1>
						<p>Annual subscription fee of $100 is required to access exclusive content and the membership area. <br><br>
Proceed to pay :</p>
						{{ csrf_field() }}
						<input type="submit" class="btn btn-login btn-flat" value="By Paypal" name="payment_method">
						<input type="submit" class="btn btn-login1 btn-flat" value="By Bank" name="payment_method">
					</div>	
				</div>
				<div class="col-md-3"></div>
			</div>	
		</form>
	</div>
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