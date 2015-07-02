<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

Route::get('/', 'PageController@index');

Route::get('/' . env('PAGING_SLUG'), 'PageController@indexPaging');

Route::get(env('SINGLE_SLUG') . '{twowordsoftitle}/{imgtitle}_{id}.html', 'PageController@attachment');

Route::get(env('SINGLE_SLUG') . '{imgtitle}_{id}.html', 'PageController@detail');

Route::get(env('CATEGORY_SLUG'), 'PageController@category');

Route::get(env('CATEGORY_SLUG') . '{catname}/', 'PageController@listcategory');

Route::get(env('CATEGORY_SLUG') . '{catname}/' . env('PAGING_SLUG'), 'PageController@categoryPaging');

Route::get('/popular', 'PageController@popular');

Route::get('/newest', 'PageController@newest');

Route::get('/about', 'PageController@about');

Route::get('/privacy', 'PageController@privacy');

Route::get('/terms', 'PageController@terms');

Route::get('/contact', 'PageController@contact');

Route::get(env('RESOLUTION_SLUG') . '{x}x{y}-{file}', 'ImageController@getImage')->where('y', '[0-9]+');

Route::get('/admin/post', 'AdminController@index');

