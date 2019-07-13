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


Route::get('/', 'PostsController@index');



// ⭐️
// 登録画面
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
// 登録内容送信処理
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
// ログイン画面表示
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// ログイン内容送信処理
Route::post('login', 'Auth\LoginController@login')->name('login.post');
// ログアウト処理
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('search', 'UsersController@search')->name('users.search'); 

Route::group(['middleware' => ['auth']], function () {
    // indexとshowの画面でのみログイン認証が必要
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    
     Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        Route::get('likes', 'UsersController@likes')->name('users.likes');    
    });
     
    
     Route::group(['prefix' => 'posts/{id}'], function () {
        Route::post('like', 'LikesController@store')->name('likes.like');
        Route::delete('unlike', 'LikesController@destroy')->name('likes.unlike');
    });


    Route::resource('posts', 'PostsController', ['only' => ['store', 'destroy']]);
    
});