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

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'AboutController@index')->name('about');

Route::get('/pages/{slug}', 'PageController@getPage')->name('page');
Route::get('/careers', 'PageController@careers')->name('careers');

Route::group(['prefix' => 'expertise'], function () {
	Route::get('/', 'ExpertiseController@index')->name('expertise');
	Route::get('/{expertise}/{slug}', 'ExpertiseController@article')->name('expertise.article');
});

Route::group(['prefix' => 'industries'], function () {
	Route::get('/', 'IndustriesController@index')->name('industries');
	Route::get('/{industry}/{slug}', 'IndustriesController@industry')->name('industry');
});

Route::group(['prefix' => 'news'], function () {
	Route::get('/', 'NewsController@index')->name('news');
	Route::get('{article}/{slug}', 'NewsController@article')->name('news.article');
	Route::get('/category/{category}/{slug}', 'NewsController@category')->name('news.category');
});

Route::group(['prefix' => 'team'], function () {
	Route::get('/', 'TeamController@index')->name('team');
	Route::get('/member/{person}/{slug}', 'TeamController@person')->name('person');
});

Route::group(['prefix' => 'downloads'], function () {
	Route::get('/', 'ResourceController@index')->name('downloads');
	Route::get('/download/{resource}', 'ResourceController@download')->name('download');
});

Route::group(['prefix' => 'casestudies'], function () {
	Route::get('/', 'CasestudiesController@index')->name('casestudies');
	Route::get('/service/{expertise}', 'CasestudiesController@expertise')->name('casestudies.expertise');
	Route::get('/industry/{industry}', 'CasestudiesController@industry')->name('casestudies.industry');
	Route::get('/{casestudy}/{slug}', 'CasestudiesController@article')->name('casestudy.article');
});

Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/choose-us', 'ChooseUsController@index')->name('choose_us');