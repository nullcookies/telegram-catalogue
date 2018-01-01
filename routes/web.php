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

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin'], 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    // Categories
    Route::get('/categories', 'CategoriesController@index')->name('admin.categories.index');
    Route::post('/categories', 'CategoriesController@store')->name('admin.categories.store');
    Route::get('/categories/{id}/edit', 'CategoriesController@edit')->name('admin.categories.edit');
    Route::post('/categories/{id}/edit', 'CategoriesController@update')->name('admin.categories.update');
    Route::get('/categories/create', 'CategoriesController@create')->name('admin.categories.create');

    // Orders
    Route::get('/orders', 'OrdersController@index')->name('admin.orders.index');
    Route::get('/orders/{id}/edit', 'OrdersController@approve')->name('admin.orders.approve');
    Route::post('/orders', 'OrdersController@store')->name('admin.orders.store');

    // Channels
    Route::get('/channels', 'ChannelsController@index')->name('admin.channels.index');

    Route::get('/data', 'DashboardController@getData');
});


// User an Auth user routes
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'IndexController@index')->name('frontend.index');

    // Channels
    Route::get('/channels', 'ChannelsController@index')->name('frontend.channels');
    Route::get('/channels/{slug}', 'ChannelsController@view')->name('frontend.channel');
    //Route::post('/add-chanel', 'IndexController@chanelStore')->name('frontend.store-chanel');

    Route::get('/categories', 'CategoriesController@index')->name('frontend.categories');
    Route::get('/category/{slug}', 'CategoriesController@show')->name('frontend.category');

    // Feedback
    Route::get('/feedback', 'FeedbackController@index')->name('frontend.feedback');
    Route::post('/feedback', 'FeedbackController@store')->name('frontend.feedback.post');

    Route::group(['middleware' => 'auth', 'prefix' => 'cabinet'], function () {
        Route::get('/', 'CabinetController@index')->name('frontend.cabinet');
        Route::get('/add', 'CabinetController@add')->name('frontend.cabinet.add');
        Route::post('/add', 'CabinetController@store')->name('frontend.add.post');

        Route::get('/channels', 'CabinetController@channels')->name('frontend.cabinet.channels');
        Route::get('/channel/{slug}', 'CabinetController@channel')->name('frontend.cabinet.channel');

        Route::get('/settings', 'CabinetController@settings')->name('frontend.cabinet.settings');
        Route::post('/settings', 'CabinetController@settingsSave')->name('frontend.cabinet.settings.save');
    });
});

Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
