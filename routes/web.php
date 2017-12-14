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

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    // Categories
    Route::get('/categories', 'CategoriesController@index')->name('admin.categories.index');
    Route::post('/categories', 'CategoriesController@store')->name('admin.categories.store');
    Route::get('/categories/create', 'CategoriesController@create')->name('admin.categories.create');

    // Orders
    Route::get('/orders', 'OrdersController@index')->name('admin.orders.index');
    Route::get('/orders/{id}/edit', 'OrdersController@approve')->name('admin.orders.approve');
    Route::post('/orders', 'OrdersController@store')->name('admin.orders.store');
});

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'IndexController@index')->name('frontend.index');
    Route::get('/add-chanel', 'IndexController@addChanel')->name('frontend.add-chanel');
    Route::post('/add-chanel', 'IndexController@chanelStore')->name('frontend.store-chanel');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
