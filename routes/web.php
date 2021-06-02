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
Route::get('api/movie/{movie_id}/feed/{page}','MovieController@getPage');
Route::get('movie_list', 'MovieListController@show')->name('movie_list');
Route::get('api/movie_list/{page}', 'MovieListController@getMovieListPage');
Route::post('api/movie/{id}/review','ReviewController@create');
Route::get('/admin/movies/add', 'MovieController@add_page')->name('add_movie');
Route::post('/admin/movies/add', 'MovieController@create');
Route::get('movie/{id}/edit', 'MovieController@edit_page')->name('edit_movie');
Route::post('/api/movie/{id}', 'MovieController@edit');

//Reviews
Route::get('review/{id}','ReviewController@show')->name('review');
Route::get('api/review/{review_id}','ReviewController@getReview');
Route::delete('api/review/{review_id}', 'ReviewController@delete');
Route::patch('api/review/{review_id}', 'ReviewController@edit');
Route::post('api/review/{review_id}/like', 'ReviewController@like');

//User Profile
Route::get('user/{user}','UserController@show')->name('user');
Route::patch('/api/admin/user/{user}/ban','UserController@ban')->name('ban');
Route::patch('/api/admin/user/{user}/unban','UserController@unban')->name('unban');
Route::get('user/{user_id}/edit','UserController@edit_page')->name('edit_user');
Route::post('/api/user/{user_id}/edit','UserController@edit');
Route::get('/user/{user_id}/edit_password','UserController@edit_password_page')->name('edit_password');
Route::post('/user/{user_id}/edit_password','UserController@edit_password');
Route::post('user/{user_id}/delete','UserController@delete')->name('delete_user');


//Feed
Route::get('feed', 'FeedController@index')->name('feed');
Route::get('api/public_feed/{page}', 'FeedController@getPublicPage');
Route::get('api/friends_feed/{page}', 'FeedController@getFriendPage');

//Notifications
Route::get('notifications', 'NotificationController@index')->name('notifications')->middleware('auth');
Route::get('api/notifications/{page}', 'NotificationController@getNotificationPage');

//Friendship
Route::get('/user/{user_id}/friends/', 'FriendController@show_list')->name('friends');
Route::post('/api/user/{user_id}/friend_request/{asker_id}', 'FriendController@invite')->name('friend_request');
Route::post('/api/user/{user_id}/request/friend/accept/{asker_id}', 'FriendController@accept')->name('accept_friend_request');
Route::post('/api/user/{user_id}/request/friend/reject/{asker_id}', 'FriendController@reject')->name('reject_friend_request');
Route::post('/api/user/{user_id}/request/friend/cancel/{asker_id}', 'FriendController@cancel')->name('cancel_friend_request');

//Administrator Dashboard
Route::get('/admin/movies/board', 'AdministrationController@movie_page')->name('movie_dashboard_page');
Route::get('/admin/reviews/board', 'AdministrationController@review_page')->name('review_dashboard_page');
Route::get('/admin/users/board', 'AdministrationController@user_page')->name('user_dashboard_page');

//Report
Route::post('/api/review/{id}/report', 'ReportController@report_review')->name('report_review');
Route::delete('/api/admin/reviews/board/report/{review_id}', 'ReportController@discard')->name('discard_report');

//Comments
Route::post('/api/review/{id}/comment', 'CommentController@create')->name('add_comment');
Route::delete('/api/review/comment/{comment_id}', 'CommentController@delete')->name('delete_comment');

//Groups
Route::get('/groups/list', 'GroupController@list')->name('groups_list');
Route::get('/groups/add', 'GroupController@add_group_page')->name('add_group');
Route::post('/groups/add', 'GroupController@create');
Route::get('/groups/{group_id}', 'GroupController@show')->name('group');
Route::get('/groups/{group_id}/invitation_page', 'GroupController@invitation_page')->name('invite_page');
Route::post('/api/groups/{group_id}/invite/{user_id}', 'GroupController@invite_user')->name('group_invite');
Route::post('/api/users/{user_id}/request/group/accept/{group_id}', 'GroupController@accept_invite')->name('accept_group_invite');
Route::post('/api/users/{user_id}/request/group/reject/{group_id}', 'GroupController@reject_invite')->name('reject_group_invite');
Route::delete('/groups/delete/{group_id}', 'GroupController@delete')->name('delete_group');
Route::post('/groups/{group_id}/member/{user_id}/leave', 'GroupController@leave')->name('leave_group');
Route::get('/groups/{group_id}/members', 'GroupController@members_page')->name('members_page');