<?php

Route::group(['prefix' => 'admin'], function() {

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.submit_login');

    Route::group(['middleware' => 'admin'], function() {

    	Route::get('/', 'Admin\DashboardController@index')->name('admin.home');
        Route::post('/upload-image', 'Admin\ImageController@upload')->name('admin.upload_image');

        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'Admin\UserController@getAll')->name('admin.users');
            Route::get('/edit/{user}', 'Admin\UserController@getEdit')->name('admin.user.edit');
            Route::get('/delete/{user}', 'Admin\UserController@getDelete')->name('admin.user.delete');
            Route::get('/new', 'Admin\UserController@getNew')->name('admin.user.new');
            Route::post('/new', 'Admin\UserController@postNew')->name('admin.user.new_submit');
            Route::get('/edit/{user}', 'Admin\UserController@getEdit')->name('admin.user.edit');
            Route::post('/edit/{user}', 'Admin\UserController@postEdit')->name('admin.user.edit_submit');
        });

        Route::group(['prefix' => 'pages'], function() {
            Route::get('/', 'Admin\PageController@getAll')->name('admin.pages');
            Route::get('/edit/{page}', 'Admin\PageController@getEdit')->name('admin.page.edit');
            Route::get('/delete/{page}', 'Admin\PageController@getDelete')->name('admin.page.delete');
            Route::get('/new', 'Admin\PageController@getNew')->name('admin.page.new');
            Route::post('/new', 'Admin\PageController@postNew')->name('admin.page.new_submit');
            Route::get('/edit/{page}', 'Admin\PageController@getEdit')->name('admin.page.edit');
            Route::post('/edit/{page}', 'Admin\PageController@postEdit')->name('admin.page.edit_submit');
        });

        Route::group(['prefix' => 'blocks'], function() {
            Route::get('/', 'Admin\BlockController@getAll')->name('admin.blocks');
            Route::get('/edit/{block}', 'Admin\BlockController@getEdit')->name('admin.block.edit');
            Route::get('/delete/{block}', 'Admin\BlockController@getDelete')->name('admin.block.delete');
            Route::get('/new', 'Admin\BlockController@getNew')->name('admin.block.new');
            Route::post('/new', 'Admin\BlockController@postNew')->name('admin.block.new_submit');
            Route::get('/edit/{block}', 'Admin\BlockController@getEdit')->name('admin.block.edit');
            Route::post('/edit/{block}', 'Admin\BlockController@postEdit')->name('admin.block.edit_submit');
        });

        Route::group(['prefix' => 'people'], function() {
            Route::get('/', 'Admin\PeopleController@getAll')->name('admin.people');
            Route::get('/edit/{person}', 'Admin\PeopleController@getEdit')->name('admin.person.edit');
            Route::get('/delete/{person}', 'Admin\PeopleController@getDelete')->name('admin.person.delete');
            Route::get('/new', 'Admin\PeopleController@getNew')->name('admin.person.new');
            Route::post('/new', 'Admin\PeopleController@postNew')->name('admin.person.new_submit');
            Route::get('/edit/{person}', 'Admin\PeopleController@getEdit')->name('admin.person.edit');
            Route::post('/edit/{person}', 'Admin\PeopleController@postEdit')->name('admin.person.edit_submit');
        });

        Route::group(['prefix' => 'people-categories'], function() {
            Route::get('/', 'Admin\PeopleCategoryController@getAll')->name('admin.people_categories');
            Route::get('/edit/{category}', 'Admin\PeopleCategoryController@getEdit')->name('admin.people_categories.edit');
            Route::get('/delete/{category}', 'Admin\PeopleCategoryController@getDelete')->name('admin.people_categories.delete');
            Route::get('/new', 'Admin\PeopleCategoryController@getNew')->name('admin.people_categories.new');
            Route::post('/new', 'Admin\PeopleCategoryController@postNew')->name('admin.people_categories.new_submit');
            Route::get('/edit/{category}', 'Admin\PeopleCategoryController@getEdit')->name('admin.people_categories.edit');
            Route::post('/edit/{category}', 'Admin\PeopleCategoryController@postEdit')->name('admin.people_categories.edit_submit');
        });

        Route::group(['prefix' => 'industries'], function() {
            Route::get('/', 'Admin\IndustryController@getAll')->name('admin.industries');
            Route::get('/edit/{industry}', 'Admin\IndustryController@getEdit')->name('admin.industry.edit');
            Route::get('/delete/{industry}', 'Admin\IndustryController@getDelete')->name('admin.industry.delete');
            Route::get('/new', 'Admin\IndustryController@getNew')->name('admin.industry.new');
            Route::post('/new', 'Admin\IndustryController@postNew')->name('admin.industry.new_submit');
            Route::get('/edit/{industry}', 'Admin\IndustryController@getEdit')->name('admin.industry.edit');
            Route::post('/edit/{industry}', 'Admin\IndustryController@postEdit')->name('admin.industry.edit_submit');
        });

        Route::group(['prefix' => 'expertise'], function() {
            Route::get('/', 'Admin\ExpertiseController@getAll')->name('admin.expertise');
            Route::get('/edit/{expertise}', 'Admin\ExpertiseController@getEdit')->name('admin.expertise.edit');
            Route::get('/delete/{expertise}', 'Admin\ExpertiseController@getDelete')->name('admin.expertise.delete');
            Route::get('/new', 'Admin\ExpertiseController@getNew')->name('admin.expertise.new');
            Route::post('/new', 'Admin\ExpertiseController@postNew')->name('admin.expertise.new_submit');
            Route::get('/edit/{expertise}', 'Admin\ExpertiseController@getEdit')->name('admin.expertise.edit');
            Route::post('/edit/{expertise}', 'Admin\ExpertiseController@postEdit')->name('admin.expertise.edit_submit');
        });
        
        Route::group(['prefix' => 'resources'], function() {
            Route::get('/', 'Admin\ResourceController@getAll')->name('admin.resources');
            Route::get('/edit/{resource}', 'Admin\ResourceController@getEdit')->name('admin.resource.edit');
            Route::get('/delete/{resource}', 'Admin\ResourceController@getDelete')->name('admin.resource.delete');
            Route::get('/new', 'Admin\ResourceController@getNew')->name('admin.resource.new');
            Route::post('/new', 'Admin\ResourceController@postNew')->name('admin.resource.new_submit');
            Route::get('/edit/{resource}', 'Admin\ResourceController@getEdit')->name('admin.resource.edit');
            Route::post('/edit/{resource}', 'Admin\ResourceController@postEdit')->name('admin.resource.edit_submit');
        });

        Route::group(['prefix' => 'news'], function() {
            Route::get('/', 'Admin\NewsController@getAll')->name('admin.news');
            Route::get('/edit/{news}', 'Admin\NewsController@getEdit')->name('admin.news.edit');
            Route::get('/delete/{news}', 'Admin\NewsController@getDelete')->name('admin.news.delete');
            Route::get('/new', 'Admin\NewsController@getNew')->name('admin.news.new');
            Route::post('/new', 'Admin\NewsController@postNew')->name('admin.news.new_submit');
            Route::get('/edit/{news}', 'Admin\NewsController@getEdit')->name('admin.news.edit');
            Route::post('/edit/{news}', 'Admin\NewsController@postEdit')->name('admin.news.edit_submit');
        });

        Route::group(['prefix' => 'news-categories'], function() {
            Route::get('/', 'Admin\NewsCategoryController@getAll')->name('admin.news_categories');
            Route::get('/edit/{resource}', 'Admin\NewsCategoryController@getEdit')->name('admin.news_category.edit');
            Route::get('/delete/{resource}', 'Admin\NewsCategoryController@getDelete')->name('admin.news_category.delete');
            Route::get('/new', 'Admin\NewsCategoryController@getNew')->name('admin.news_category.new');
            Route::post('/new', 'Admin\NewsCategoryController@postNew')->name('admin.news_category.new_submit');
            Route::get('/edit/{resource}', 'Admin\NewsCategoryController@getEdit')->name('admin.news_category.edit');
            Route::post('/edit/{resource}', 'Admin\NewsCategoryController@postEdit')->name('admin.news_category.edit_submit');
        });

        Route::group(['prefix' => 'casestudies'], function() {
            Route::get('/', 'Admin\CasestudiesController@getAll')->name('admin.casestudies');
            Route::get('/edit/{casestudy}', 'Admin\CasestudiesController@getEdit')->name('admin.casestudies.edit');
            Route::get('/delete/{casestudy}', 'Admin\CasestudiesController@getDelete')->name('admin.casestudies.delete');
            Route::get('/new', 'Admin\CasestudiesController@getNew')->name('admin.casestudies.new');
            Route::post('/new', 'Admin\CasestudiesController@postNew')->name('admin.casestudies.new_submit');
            Route::get('/edit/{casestudy}', 'Admin\CasestudiesController@getEdit')->name('admin.casestudies.edit');
            Route::post('/edit/{casestudy}', 'Admin\CasestudiesController@postEdit')->name('admin.casestudies.edit_submit');
        });

        Route::group(['prefix' => 'actions'], function () {
            Route::post('/industries/order', 'Admin\IndustryController@postUpdateOrder')->name('admin.industry.update_order');
            Route::post('/people/order', 'Admin\PeopleController@postUpdateOrder')->name('admin.people.update_order');
            Route::post('/resources/order', 'Admin\ResourceController@postUpdateOrder')->name('admin.resource.update_order');
            Route::post('/expertise/order', 'Admin\ExpertiseController@postUpdateOrder')->name('admin.expertise.update_order');
        });

    });
});

?>