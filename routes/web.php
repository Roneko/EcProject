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

    //管理者画面 管理者以上
    Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
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

        Route::GET('/sales', 'admin\SalesController@index')->name('sales.index');
        Route::GET('/carts', 'admin\SalesController@cart')->name('sales.carts');
    });
    
    Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
    //マイページ
    Route::GET('/users', 'user\CartsController@show')->name('carts.show');
    Route::PATCH('/users/{item_user}', 'user\CartsController@update')->name('carts.update');
    Route::DELETE('/users/{item_user}', 'user\CartsController@destroy')->name('carts.destroy');
    Route::GET('/users/history', 'user\CartsController@history')->name('carts.history');


    // Route::GET('/users/{user_id}', 'user\CartsController@edit')->name('user.edit');

    //カートに保存
    Route::POST('/ecsite', 'user\CartsController@store')->name('carts.store'); 
    //購入処理
    Route::PATCH('/ecsite/purchased', 'user\CartsController@purchased')->name('carts.purchased');//値の更新だからパッチ


    //サイト表示 商品一覧
    Route::GET('/ecsite', 'user\ItemController@index')->name('ecsite.index');
    //商品詳細ページ
    Route::GET('/ecsite/{item}', 'user\ItemController@show')->name('ecsite.show');


        //ログイン画面　
        Route::GET('/login', 'LoginController@showLoginForm')->name('login.showLoginForm');
        Route::GET('/register', 'RegisterController@index')->name('register.index');
    });

    // // システム管理者のみ
    // Route::group(['middleware' => ['auth', 'can:system-only']], function () {

    // });

    Auth::routes();
    //ホーム画面
    Route::get('/', 'HomeController@index')->name('home');
