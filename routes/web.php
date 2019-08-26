<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require_once('constants.php');

require_once('ajax-route.php');

Route::get('/', 
['as'	=>	'frontend-home',
 'uses'	=>	'Controller@getIndexPage'
]);

Route::get('/get-image/{asset_type}/{filename?}/{size?}',
	['as'	=>	'get-image-asset-type-filename',
	 'uses'	=>	'ImageController@getAsset']);

Route::get('/get-video/{filename}',
	['as'	=>	'get-video-from-filename',
	 'uses'	=>	'VideoController@getVideoAsset',
	 'middleware'	=>	'auth']);


Route::get('/get-asset/{directory}/{file}',
	['as'	=>	'get-asset',
	 'uses'	=>	'VideoController@getAsset']);

Route::get('login', [
	'as'	=>	'login',
	'uses'	=>	'LoginController@getLogin',
	'middleware'	=>	'guest'
]);

Route::post('login', [
	'as'	=>	'login',
	'uses'	=>	'LoginController@postLogin',
	'middleware'	=>	'guest'
]);

Route::post('logout', [
	'as'	=>	'logout',
	'uses'	=>	'LoginController@postLogout'
	//'middleware'	=>	'guest'
]);

Route::get('register', [
	'as'	=>	'register-get',
	'uses'	=>	'LoginController@getRegister',
	'middleware'	=>	'guest'
]);

Route::post('register', [
	'as'	=>	'register-post',
	'uses'	=>	'LoginController@postRegister',
	'middleware'	=>	'guest'
]);

Route::get('forgot-password', [
	'as'	=>	'forgot-password-get',
	'uses'	=>	'LoginController@getForgotPassword',
	'middleware'	=>	'guest'
]);

Route::post('forgot-password', [
	'as'	=>	'forgot-password-post',
	'uses'	=>	'LoginController@postForgotPassword',
	'middleware'	=>	'guest'
]);

Route::get('admin/home',
['as'	=>	'home',
 'uses'	=>	'LoginController@getHome',
 'middleware'	=>	'auth'])->middleware(['checkExpiration']); 

Route::get('/change-my-password', [
	'as'	=>	'change-my-password-get',
	'uses'	=>	'DashboardController@getChangeMyPassword',
	'middleware'	=>	'auth'
])->middleware(['checkExpiration']); 

Route::post('/change-my-password', [
	'as'	=>	'change-my-password-post',
	'uses'	=>	'DashboardController@postChangeMyPassword',
	'middleware'	=>	'auth'
])->middleware(['checkExpiration']); 

Route::get('/change-my-details', [
	'as'	=>	'change-my-details-get',
	'uses'	=>	'DashboardController@getChangeMyDetails',
	'middleware'	=>	'auth'
])->middleware(['checkExpiration']); 

Route::post('/change-my-details', [
	'as'	=>	'change-my-details-post',
	'uses'	=>	'DashboardController@postChangeMyDetails',
	'middleware'	=>	'auth'
])->middleware(['checkExpiration']); 

Route::post('/delete-my-profile-picture', [
	'as'	=>	'delete-my-profile-picture-post',
	'uses'	=>	'DashboardController@postDeleteProfilePicture',
	'middleware'	=>	'auth'
]);

foreach (glob(base_path()."/app/Http/Controllers/CoreModules/*/*-route.php") as $filename) {
	require_once($filename);
}
foreach (glob(base_path()."/app/Http/Controllers/CmsModules/*/*-route.php") as $filename) {
	require_once($filename);
}

require_once('frontend-route.php');
require_once('page-route.php');

if(\File::exists(base_path().'/routes/user-route.php')) {
	require_once('user-route.php');
}

if(\File::exists(base_path().'/routes/paypal-route.php')) {
	require_once('paypal-route.php');
}
