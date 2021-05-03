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
// Home

Route::get('/', 'LandingController@index')->name('landing_page');


// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//Movies
Route::get('movie/{id}', 'MovieController@show')->name('movie');
Route::get('/api/movie/{movie_id}/feed/{page}','MovieController@getPage');

//Reviews
Route::get('review/{id}','ReviewController@show')->name('review');
Route::post('review/{id}','ReviewController@create');
Route::delete('api/review/{review_id}', 'ReviewController@delete');
