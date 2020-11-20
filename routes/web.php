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

//トップページ
Route::get('/', function () {
    return view('welcome');
});

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


//検索画面、ランキングページ、ユーザー詳細ページ
Route::group(['middleware' => ['auth']], function () {
    Route::get('search', 'SearchController@index')->name('search.index'); 
    Route::get('ranking', 'RankingController@index')->name('ranking.index');
    Route::get('users/{id}', 'UsersController@show')->name('users.show');
    //Route::resource('memos', 'MemosController', ['only' => ['store', 'destroy']]);
});
    
//want機能    
    Route::group(['prefix' => 'items/{id}'], function () {
        Route::post('want', 'WantsController@store')->name('wants.store');
        Route::delete('notwantById', 'WantsController@destroyById')->name('wants.destroyById');
        Route::delete('notwantByCode', 'WantsController@destroyByCode')->name('wants.destroyByCode');
    });


