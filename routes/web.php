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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::group(['prefix' => 'user'],function(){
        Route::get('list','UserController@show');
        Route::get('edit/{id}','UserController@edit');
        Route::post('edit/{id}','UserController@doEdit');
        Route::get('add','UserController@add');
        Route::post('doAdd','UserController@doAdd');
        Route::get('del/{id}','UserController@del');
    });

        Route::group(['prefix' => 'book'],function(){
        Route::get('list','BookController@show');
        Route::get('add','BookController@add');
        Route::post('doAdd','BookController@doAdd');
        Route::get('edit/{id}','BookController@edit');
        Route::post('edit/{id}','BookController@doEdit');
        Route::get('del/{id}','BookController@del');
        Route::get('detail/{id}','BookController@detailShow');
        Route::get('detailadd/{id}','BookController@detailAdd');
        Route::post('detailadd/{id}','BookController@detailDoAdd');
    });

    Route::group(['prefix' => 'category'],function(){
        Route::get('list','CategoryController@show');
        Route::any('add','CategoryController@add');
        Route::any('addSon/{id}','CategoryController@addSon');
        Route::get('showSon/{id}','CategoryController@showSon');
        Route::any('edit/{id}','CategoryController@edit');
        Route::get('del/{id}','CategoryController@del');
    });

    Route::get('login','IndexController@login');
    Route::post('doLogin','IndexController@doLogin');
    Route::get('register','IndexController@register');
    Route::post('doRegister','IndexController@doRegister');
    Route::get('index','IndexController@index');

    Route::get('order/list','OrderController@show');



    //权限管理
    Route::any('perm','PermissionsController@show');
    Route::any('perm-add','PermissionsController@add');
    Route::get('perm-del/{permission_id}','PermissionsController@del');
    Route::any('perm-update/{permission_id}','PermissionsController@update');


        //角色管理
    Route::get('roles','RolesController@show');
    Route::any('roles-add','RolesController@add');
    Route::any('roles-update/{role_id}','RolesController@update');
    Route::get('roles-del/{role_id}','RolesController@del');




        //分配权限
    Route::any('deal/{role_id}','RolesController@deal');

    //用户管理
    Route::get('admin','AdminController@show');
    Route::any('admin-add','AdminController@add');
    Route::any('admin-update/{id}','AdminController@update');
    Route::get('admin-del/{id}','AdminController@del');

    //分配角色
    Route::any('admin-cast/{id}','AdminController@cast');

    //机构管理
    Route::get('publish','PublishController@show');
    Route::any('publish-add','PublishController@add');
    Route::get('publish-del/{id}','PublishController@del');
    Route::any('publish-update/{id}','PublishController@update');







});





//   ==============================================Home





Route::group(['prefix'=>'home','namespace'=>'Home'],function(){
    Route::get('index','IndexController@show');
    Route::get('login','LoginController@show');
    Route::post('doLogin','LoginController@doLogin');
    Route::get('logout','LoginController@logout');
    Route::get('reg','RegisterController@show');
    Route::post('doReg','RegisterController@doReg');
    Route::get('space','SpaceController@show');
    Route::get('category','CategoryController@show');
    Route::get('Billboard','BillboardController@show');
    Route::get('detail','DetailsController@show');
    //机构
        Route::get('publisher','PublisherController@show');
        Route::get('pub_info/{id}','PublisherController@info');
    Route::get('verify/{confirmed_code}','RegisterController@emailConfirm');

});

