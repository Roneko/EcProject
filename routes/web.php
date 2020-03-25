<?php

use Illuminate\Support\Facades\Route;

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

    Auth::routes();
    //管理者画面
    Route::get('/item', 'ItemController@index')->name('item.index');
    Route::get('/item/create', 'ItemController@create')->name('item.create');
    Route::POST('/item/confirm', 'ItemController@confirm')->name('item.confirm');
    Route::POST('/item/store', 'ItemController@store')->name('item.store');
    Route::GET('/item/edit', 'ItemController@edit')->name('item.edit');
    Route::PATCH('/item/updata', 'ItemController@updata')->name('item.updata');
    Route::DELETE('/item/destroy', 'ItemController@destroy')->name('item.destroy');
    
    //マイページ
    Route::GET('/users/{user_id}', 'UserController@show')->name('users.show');
    Route::GET('/users/{user_id}', 'UserController@edit')->name('user.edit');

    //サイト表示 商品一覧
    Route::GET('/ecsite', 'PostsController@index')->name('ecsite.index');
    Route::GET('/ecsite/{user_id}', 'PostsController@show')->name('ecsite.show');

    //ログイン画面　
    Route::GET('/login', 'LoginController@showLoginForm')->name('login.showLoginForm');
    Route::GET('/register', 'RegisterController@index')->name('register.index');


