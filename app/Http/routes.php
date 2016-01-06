<?php

Route::get('hey', function() {
    $pottar = \App\Category::where('slug', 'pottar')->first()->products;
    dd($pottar);
});

Route::get('/', function() {
	return view('frontend.layout');
});

Route::post('hafa-samband', 'ContactController@postContact');

Route::group(['middleware'=>'api', 'prefix' => 'api'], function () {
    Route::get('page/{slug?}', 'ApiController@page')->where(['slug' => '.*']);
    Route::get('product/{slug?}', 'ApiController@product')->where(['slug' => '.*']);
    Route::get('menu', 'ApiController@menu');
    Route::get('pottar', 'ApiController@pottar');
    Route::get('banner', 'ApiController@banner');
});

Route::group(['middleware'=>'auth', 'prefix' => 'admin'], function () {
	Route::get('/', function() {
		return view('admin.layout');
	});

    // Reorder formable items
    Route::post('formable/_reorder', 'FormableController@reorder');

    // Reorder images
    Route::post('formable/_reorderImages', 'FormableController@reorderImages');
    
    // Reorder files
    Route::post('formable/_reorderFiles', 'FormableController@reorderFiles');
    
    // Get uploaded image
    Route::post('formable/_uploadImage', 'FormableController@uploadImage');

    // Delete image
    Route::post('formable/_deleteImage', 'FormableController@deleteImage');
    
    // Get uploaded file
    Route::post('formable/_uploadFile', 'FormableController@uploadFile');
    
    // Get images from this item
    Route::post('formable/_images', 'FormableController@images');
    
    // Get files from this item
    Route::post('formable/_files', 'FormableController@files');
    
    // Toggle formable status
    Route::post('formable/_toggle', 'FormableController@toggle');

	// Formable stjórnhlutir....
	foreach(config('formable.hlutir') as $hlutur) {
		Route::resource(strtolower($hlutur), ucfirst($hlutur).'Controller');
		Route::get(strtolower($hlutur).'/{id}/{subs}', ucfirst($hlutur).'Controller@subsIndex');
	}

    Route::resource('orders', 'OrdersController');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Grípur allt sem ekki hefur verið fundið hér fyrir ofan
Route::get('{slug?}', ['as' => 'page', 'uses' => 'PageController@show'])->where(['slug' => '.*']);