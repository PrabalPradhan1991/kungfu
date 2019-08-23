<?php

Route::get('pay/{user_id}',
['as'	=>	'paywithpaypal',
 'uses'	=>	'PaypalController@getPaymentForm']);

Route::get('pay-by-paypal/{user_id}',
['as'	=>	'pay-by-paypal',
 'uses'	=>	'PaypalController@getPayByPaypalForm']);

Route::post('paypal/{user_id}', 
	['as' => 'paypal',
	 'uses' => 'PaypalController@payWithpaypal']);

// route for check status of the payment
Route::get('status/{user_id}', 
	['as'	=>	'status', 
	 'uses'	=>	'PaypalController@getPaymentStatus']);

Route::get('success-page',
	['as'	=>	'paypal-success-page',
	 'uses'	=>	'PaypalController@getSuccessPage']);