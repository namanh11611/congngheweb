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

Route::get('/', 'WelcomeController@index');

Route::group(['prefix'=>'admin'], function (){
    Route::group(['prefix'=>'cate'], function (){
        Route::get('add', ['as'=>'admin.cate.getAdd', 'uses'=>'CateController@getAdd']);
        Route::post('add', ['as'=>'admin.cate.postAdd', 'uses'=>'CateController@postAdd']);
        Route::get('list', ['as'=>'admin.cate.list', 'uses'=>'CateController@getList']);
        Route::get('delete/{$id}', ['as'=>'admin.cate.getDelete', 'uses'=>'CateController@getDelete']);
        Route::get('edit/{$id}', ['as'=>'admin.cate.getEdit', 'uses'=>'CateController@getEdit']);
        Route::get('edit/{$id}', ['as'=>'admin.cate.postEdit', 'uses'=>'CateController@postEdit']);
    });
});

Route::group(['prefix'=>'admin'], function (){
    Route::group(['prefix'=>'product'], function (){
        Route::get('add', ['as'=>'admin.product.getAdd', 'uses'=>'ProductController@getAdd']);
        Route::get('edit', ['as'=>'admin.product.getEdit', 'uses'=>'ProductController@getEdit']);
        Route::get('list', ['as'=>'admin.product.list', 'uses'=>'ProductController@getList']);
    });
});

Route::group(['prefix'=>'admin'], function (){
    Route::group(['prefix'=>'user'], function (){
        Route::get('add', ['as'=>'admin.user.getAdd', 'uses'=>'UserController@getAdd']);
        Route::get('edit', ['as'=>'admin.user.getEdit', 'uses'=>'UserController@getEdit']);
        Route::get('list', ['as'=>'admin.user.list', 'uses'=>'UserController@getList']);
    });
});