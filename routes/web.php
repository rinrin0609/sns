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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');

Route::get('/logout','Auth\LoginController@logout');

//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');
Route::post('/profile','usersController@update');

Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');

Route::get('/user/{id}','UsersController@user_follower');
Route::post('/user/{id}/create', 'UsersController@follow');
Route::post('/user/{id}/delete', 'UsersController@unfollow');

Route::get('/post/follow','PostsController@follow');
Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');
Route::get('/followList','UsersController@follow_list');
Route::post('/followList','UsersController@follow_list');
Route::get('/followerList','UsersController@follower_list');
Route::post('/followerList','UsersController@follower_list');

//投稿機能
Route::post('/post/create','PostsController@create');
Route::get('/post/{id}/delete', 'PostsController@delete');
Route::post('post/update', 'PostsController@update');

//フォローする、しない
Route::post('/follow/create', 'UsersController@follow');
Route::post('/follow/delete', 'UsersController@unfollow');
