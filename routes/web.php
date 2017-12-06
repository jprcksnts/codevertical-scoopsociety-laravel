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

Route::get('/school/all', 'SchoolController@getAllSchools');

Route::post('/user/login', 'UserController@login');
Route::post('/user/signup', 'UserController@signup');

Route::get('/user/status/{id}', 'UserStatusController@getStatus');
Route::post('/user/status', 'UserStatusController@updateStatus');

Route::get('/post/{id}', 'PostController@getPost');
Route::post('/post', 'PostController@createPost');

Route::get('/timeline/user/{user_id}', 'TimelineController@getInitialTimeline');
Route::get('/timeline/user/{user_id}/old/{post_id}', 'TimelineController@getOldTimelinePosts');
Route::get('/timeline/user/{user_id}/new/{post_id}', 'TimelineController@getNewTimelinePosts');