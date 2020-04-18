<?php

use App\Http\Controllers\HomeController;
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


    //管理者画面
    Route::GET('/item', 'admin\ItemController@index')->name('item.index');
    Route::GET('/item/create', 'admin\ItemController@create')->name('item.create');
    Route::GET('/item/{item}', 'admin\ItemController@edit')->name('item.edit');
    Route::PATCH('/item/{item}', 'admin\ItemController@update')->name('item.update');
    Route::DELETE('/item/{item}', 'admin\ItemController@destroy')->name('item.destroy');
    Route::POST('/item/confirm', 'admin\ItemController@confirm')->name('item.confirm');
    Route::POST('/item/store', 'admin\ItemController@store')->name('item.store');

    Route::GET('/category', 'admin\CategoryController@index')->name('category.index');
    Route::GET('/category/create', 'admin\CategoryController@create')->name('category.create');
    Route::GET('/category/{category}', 'admin\CategoryController@edit')->name('category.edit');
    Route::PATCH('/category/{category}', 'admin\CategoryController@update')->name('category.update');
    Route::DELETE('/category/{category}', 'admin\CategoryController@destroy')->name('category.destroy');
    Route::POST('/category/confirm', 'admin\CategoryController@confirm')->name('category.confirm');
    Route::POST('/category/store', 'admin\CategoryController@store')->name('category.store');
    
    //マイページ
    Route::GET('/users/{user_id}', 'user\CartsController@show')->name('user.show');
    // Route::GET('/users/{user_id}', 'user\CartsController@edit')->name('user.edit');

    //カートに保存
    Route::POST('/ecsite', 'user\CartsController@store')->name('user.store'); 
    //購入処理
    Route::POST('/ecsite/{user_id}/success', '\CartsController@purchased')->name('user.purchased');


    //サイト表示 商品一覧
    Route::GET('/ecsite', 'user\ItemController@index')->name('ecsite.index');
    //商品詳細ページ
    Route::GET('/ecsite/{item}', 'user\ItemController@show')->name('ecsite.show');


        //ログイン画面　
        Route::GET('/login', 'LoginController@showLoginForm')->name('login.showLoginForm');
        Route::GET('/register', 'RegisterController@index')->name('register.index');

    //ホーム画面
    Route::get('/', 'HomeController@index')->name('home');
    



Auth::routes();

