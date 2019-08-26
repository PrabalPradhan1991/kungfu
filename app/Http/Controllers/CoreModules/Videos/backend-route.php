<?php

Route::group(['prefix' => 'admin/stages', 'namespace' => '\App\Http\Controllers\CoreModules\Videos'], function() {
	Route::get('/list', [
		'as'	=>	'admin-stages-list-get',
		'uses'	=>	'StagesController@getListView',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::get('/create', [
		'as'	=>	'admin-stages-create-get',
		'uses'	=>	'StagesController@getCreateView',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::post('/create', [
		'as'	=>	'admin-stages-create-post',
		'uses'	=>	'StagesController@postCreateView',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::get('/edit/{stage_id}', [
		'as'	=>	'admin-stages-edit-get',
		'uses'	=>	'StagesController@getEditView',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::post('/edit/{stage_id}', [
		'as'	=>	'admin-stages-edit-post',
		'uses'	=>	'StagesController@postEditView',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::get('/add-videos/{stage_id}', [
		'as'	=>	'admin-stages-add-videos-get',
		'uses'	=>	'StagesController@getAddVideos',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::post('/add-videos/{stage_id}', [
		'as'	=>	'admin-stages-add-videos-post',
		'uses'	=>	'StagesController@postAddVideos',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::get('/add-pdfs/{stage_id}', [
		'as'	=>	'admin-stages-add-pdfs-get',
		'uses'	=>	'StagesController@getAddDocuments',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::post('/add-pdfs/{stage_id}', [
		'as'	=>	'admin-stages-add-pdfs-post',
		'uses'	=>	'StagesController@postAddDocuments',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::post('/delete/{stage_id}', [
		'as'	=>	'admin-stages-delete-post',
		'uses'	=>	'StagesController@postDeleteView',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::post('/delete-multiple', [
		'as'	=>	'admin-stages-delete-multiple-post',
		'uses'	=>	'StagesController@postDeleteMultipleView',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::post('/delete-video/{video_id}', [
		'as'	=>	'admin-videos-delete-post',
		'uses'	=>	'StagesController@postDeleteVideoView',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::post('/delete-multiple-videos', [
		'as'	=>	'admin-videos-delete-multiple-post',
		'uses'	=>	'StagesController@postDeleteMultipleVideoView',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::post('/delete-pdf/{pdf_id}', [
		'as'	=>	'admin-pdfs-delete-post',
		'uses'	=>	'StagesController@postDeletePdfView',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::post('/delete-multiple-pdfs', [
		'as'	=>	'admin-pdfs-delete-multiple-post',
		'uses'	=>	'StagesController@postDeleteMultiplePdfView',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::post('edit-videos',	[
		'as'	=>	'admin-edit-videos-get',
		'uses'	=>	'StagesController@postEditVideos',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::post('edit-pdfs',	[
		'as'	=>	'admin-edit-pdfs-get',
		'uses'	=>	'StagesController@postEditPdfs',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);

	Route::get('requests',[
		'as'	=>	'admin-stage-requests-get',
		'uses'	=>	'StagesController@getStageRequests'
	])->middleware(['onlySuperadmin']);

	Route::post('requests/{status}/{request_id}',[
		'as'	=>	'admin-stage-requests-post',
		'uses'	=>	'StagesController@postStageRequests'
	])->middleware(['onlySuperadmin']);

	Route::post('request-access-stage/{stage_id}', [
		'as'	=>	'reqeust-access-stage-post',
		'uses'	=>	'StagesController@postRequestAccess',
		'middleware'	=>	'auth'
	]);

	//postVideoPaymentRequest($request_id, $status)
	Route::get('video-payment-request-list',[
		'as'	=>	'admin-payment-request-list',
		'uses'	=>	'StagesController@getVideoPaymentRequestList'
	])->middleware(['onlySuperadmin']);

	Route::post('video-payment-request/{request_id}/{status}', [
		'as'	=>	'admin-video-payment-request-post',
		'uses'	=>	'StagesController@postVideoPaymentRequest',
		'middleware'	=>	'auth'
	])->middleware(['onlySuperadmin']);
});