<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax'], function() {
	Route::post('/contact', 'ContactController@submit')->name('ajax.contact_submit');
	Route::group(['prefix' => 'team'], function() {
		Route::get('/', 'TeamController@all')->name('ajax.people.all');
		Route::get('/category/{category}', 'TeamController@category')->name('ajax.people.category');
	});
	Route::group(['prefix' => 'casestudies'], function() {
		Route::get('/', 'CasestudiesController@all')->name('ajax.casestudies.all');
		Route::get('/industry/{industry}', 'CasestudiesController@industry')->name('ajax.casestudies.industry');
	});
});
