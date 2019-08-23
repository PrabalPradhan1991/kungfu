<?php

Route::group(['prefix' => 'admin/subscription', 'namespace' => '\App\Http\Controllers\CoreModules\Subscription'], function() {
	Route::get('/list', 
		['as'	=>	'admin-subscription-list',
		 'uses'	=>	'SubscriptionController@getListView',
		 'middleware'	=>	'auth'])->middleware('onlySuperadmin');

	Route::post('/approve/{subscription_id}', 
		['as'	=>	'admin-subscription-approve-post',
		 'uses'	=>	'SubscriptionController@postApproveSubscription',
		 'middleware'	=>	'auth'])->middleware('onlySuperadmin');

	Route::post('/disapprove/{subscription_id}', 
		['as'	=>	'admin-subscription-disapprove-post',
		 'uses'	=>	'SubscriptionController@postDisapproveSubscription',
		 'middleware'	=>	'auth'])->middleware('onlySuperadmin');
});