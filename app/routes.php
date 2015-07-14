<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::post('/search', "MediaController@search");
Route::get('/movies', "MediaController@movies");
Route::get('/movies/play/{id}', "MediaController@playMovie");
Route::get('/radio', "MediaController@music");
Route::get('/radio/play/{id}', "MediaController@playMusic");
Route::get('/radio/edit/{id}', "MediaController@editMusic");
Route::get('/television', "MediaController@television");
Route::get('/television/show/{slug}', "MediaController@tvShow");
Route::get('/television/play/{id}', "MediaController@playTV");
Route::get('/games', "MediaController@games");
Route::get('/games/play/{id}', "MediaController@playGame");

Route::get('/adult', "MediaController@adult");
Route::get('/adult/browse/{type}/{value}/{page?}', "MediaController@adultBrowse");
Route::get('/adult/play/{id}', "MediaController@adultPlay");

Route::get('/youtube', "MediaController@youtube");

Route::get('/help', "HomeController@help");

Route::get('/media/edit/{id}', "AdminController@editMedia");
Route::get('/media/delete/{id}', "AdminController@deleteMedia");
Route::post('/media/update/{id}', "AdminController@updateMedia");
Route::get('/admin', "AdminController@init");
Route::post('/admin/add', "AdminController@addMedia");
Route::post('/admin/addBackground', "AdminController@addBackground");
Route::get('/backgrounds/delete/{id}', "AdminController@deleteBackground");
Route::get('/admin/view/{type}', "AdminController@viewAll");
Route::get('/', "HomeController@init");
