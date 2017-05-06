<?php
use App\Members;
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
        Route::get('delete/{id}', ['as'=>'admin.cate.getDelete', 'uses'=>'CateController@getDelete']);
         Route::get('edit/{id}', ['as'=>'admin.cate.getEdit', 'uses'=>'CateController@getEdit']);
         Route::post('edit/{id}', ['as'=>'admin.cate.postEdit', 'uses'=>'CateController@postEdit']);
    });
});

Route::group(['prefix'=>'admin'], function (){
    Route::group(['prefix'=>'product'], function (){
        Route::get('add', ['as'=>'admin.product.getAdd', 'uses'=>'ProductController@getAdd']);
        Route::post('add', ['as'=>'admin.product.postAdd', 'uses'=>'ProductController@postAdd']);
        Route::get('edit', ['as'=>'admin.product.getEdit', 'uses'=>'ProductController@getEdit']);
        Route::get('list', ['as'=>'admin.product.list', 'uses'=>'ProductController@getList']);
    });
});

Route::group(['prefix'=>'admin'], function (){
    Route::group(['prefix'=>'user'], function (){
        Route::get('add', ['as'=>'admin.user.getAdd', 'uses'=>'UserController@getAdd']);
        Route::get('edit', ['as'=>'admin.user.getEdit', 'uses'=>'UserController@getEdit']);
        Route::get('list', ['as'=>'admin.user.list', 'uses'=>'UserController@getList']);
        Route::post('add', ['as'=>'admin.user.postAdd', 'uses'=>'UserController@postAdd']);
        Route::post('edit/{id}', ['as'=>'admin.user.postEdit', 'uses'=>'UserController@postEdit']);
        Route::get('delete/{id}', ['as'=>'admin.user.getDelete', 'uses'=>'UserController@getDelete']);
        Route::get('edit/{id}', ['as'=>'admin.user.getEdit', 'uses'=>'UserController@getEdit']);

    });
});


Route::group(['prefix'=>'admin'], function (){
    Route::group(['prefix'=>'customer'], function (){
        Route::get('add', ['as'=>'admin.customer.getAdd', 'uses'=>'CusController@getAdd']);
        Route::get('edit/{id}', ['as'=>'admin.customer.getEdit', 'uses'=>'CusController@getEdit']);
        Route::get('list', ['as'=>'admin.customer.list', 'uses'=>'CusController@getList']);
        Route::post('add', ['as'=>'admin.customer.postAdd', 'uses'=>'CusController@postAdd']);
        Route::post('edit/{id}', ['as'=>'admin.customer.postEdit', 'uses'=>'CusController@postEdit']);
        Route::get('delete/{id}', ['as'=>'admin.customer.getDelete', 'uses'=>'CusController@getDelete']);
    });
});

Route::get('loai-san-pham/{id}/{tenloai}',['as'=>'loaisanpham','uses'=>'WelcomeController@loaisanpham']);
Route::get('lien-he',['as'=>'getLienhe','uses'=>'WelcomeController@get_lienhe']);
// Route::post('lien-he',['as'=>'postLienhe','uses'=>'WelcomeController@post_lienhe']);
Route::get('mua-hang/{id}/{tensanpham}',['as'=>'muahang','uses'=>'WelcomeController@muahang']);
Route::get('gio-hang',['as'=>'giohang','uses'=>'WelcomeController@giohang']);
Route::get('xoa-san-pham/{id}',['as'=>'xoasanpham','uses'=>'WelcomeController@xoasanpham']);
Route::get('cap-nhat/{id}/{qty}',['as'=>'capnhat','uses'=>'WelcomeController@capnhat']);
Route::get('chi-tiet-san-pham/{id}/{tenloai}',['as'=>'chitietsanpham','uses'=>'WelcomeController@chitietsanpham']);

Route::get('/addMem', function(){
    $member = new Xxx();
    $member->user_id = 1;
    $member->name = 'tu';
    $member->save();
    return "save member !";
});

