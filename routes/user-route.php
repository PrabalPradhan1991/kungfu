<?php

Route::get('/registration',
[	'as'	=>	'registration-get',
	'uses'	=>	'UserController@getRegistration',
	'middleware'	=>	'guest'
]);

Route::post('/registration',
[	'as'	=>	'registration-post',
	'uses'	=>	'UserController@postRegistration',
	'middleware'	=>	'guest'
]);

Route::get('/confirmation-page/{user_id}',
['as'	=>	'confirmation-page-get',
 'uses'	=>	'UserController@getConfirmationPage'
]);

Route::get('expiration-page',
['as'	=>	'expiration-page-get',
 'uses'	=>	'UserController@getExpirationPage',
 'middleware'	=>	'auth']);

Route::get('view-stages',
['as'	=>	'view-stages',
 'uses'	=>	'UserController@getViewStages',
 'middleware'	=>	'auth']);

Route::get('view-stage/{stage_id}/{video_id?}',
['as'	=>	'view-stage',
 'uses'	=>	'UserController@getViewStage',
 'middleware'	=>	'auth']);