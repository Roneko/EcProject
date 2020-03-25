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
    Route::get('/item', 'admin\ItemController@index')->name('item.index');
    Route::get('/item/create', 'admin\ItemController@create')->name('item.create');
    Route::POST('/item/confirm', 'admin\ItemController@confirm')->name('item.confirm');
    Route::POST('/item/store', 'admin\ItemController@store')->name('item.store');
    Route::GET('/item/edit', 'admin\ItemController@edit')->name('item.edit');
    Route::PATCH('/item/updata', 'admin\ItemController@updata')->name('item.updata');
    Route::DELETE('/item/destroy', 'admin\ItemController@destroy')->name('item.destroy');
    Route::get('/category', 'admin\CategoryController@index')->name('category.index');
    Route::get('/category.create', 'admin\CategoryController@create')->name('category.create');
    Route::post('/category.confirm', 'admin\CategoryController@confirm')->name('category.confirm');
    Route::post('/category.store', 'admin\CategoryController@store')->name('category.store');
    Route::get('/category.edit', 'admin\CategoryController@edit')->name('category.edit');
    Route::patch('/category.updata', 'admin\CategoryController@updata')->name('category.updata');
    Route::delete('/category.destroy', 'admin\CategoryController@destroy')->name('category.destroy');
    
    //マイページ
    Route::GET('/users/{user_id}', 'user\CartsController@show')->name('user.show');
    Route::GET('/users/{user_id}', 'user\CartsController@edit')->name('user.edit');

    //カートに保存
    Route::POST('/ecsite', 'user\CartsController@store')->name('user.store'); 
    //購入処理
    Route::POST('/ecsite/{user_id}/success', '\CartsController@purchased')->name('user.purchased');


    //サイト表示 商品一覧
    Route::GET('/ecsite', 'user\ItemController@index')->name('ecsite.index');
    //商品詳細ページ
    Route::GET('/ecsite/{user_id}', 'user\ItemController@show')->name('ecsite.show');

    //ログイン画面　
    Route::GET('/login', 'LoginController@showLoginForm')->name('login.showLoginForm');
    Route::GET('/register', 'RegisterController@index')->name('register.index');


