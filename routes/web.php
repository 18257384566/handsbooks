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
    Route::group(['middleware'=>'check.admin.login'],function(){
        Route::get('index','IndexController@index');

        /*用户管理*/
        Route::group(['prefix' => 'user'],function(){
            Route::get('list','UserController@show');
            Route::get('edit/{id}','UserController@edit');
            Route::post('edit/{id}','UserController@doEdit');
            Route::get('add','UserController@add');
            Route::post('doAdd','UserController@doAdd');
            Route::get('del/{id}','UserController@del');
            Route::get('no/{id}','UserController@no');
            Route::get('yes/{id}','UserController@yes');
            Route::get('isAuthor/{id}','UserController@isAuthor');
        });
        /*书籍管理*/
        Route::group(['prefix' => 'book'],function(){
            Route::get('list','BookController@show');
            Route::get('add','BookController@add');
            Route::post('doAdd','BookController@doAdd');
            Route::get('edit/{id}/{m?}','BookController@edit');
            Route::post('edit/{id}','BookController@doEdit');
            Route::get('cate','BookController@cate');
            Route::get('del/{id}','BookController@del');
            Route::get('detail/{id}','BookController@detailShow');
            Route::get('detailadd/{id}','BookController@detailAdd');
            Route::post('detailadd/{id}','BookController@detailDoAdd');
            Route::any('detailedit/{id}','BookController@detailEdit');
            Route::any('detaildel/{id}','BookController@detailDel');
            Route::get('down/{id}','BookController@down');
            Route::get('up/{id}','BookController@up');
        });
        /*分类管理*/
        Route::group(['prefix' => 'category'],function(){
            Route::get('list','CategoryController@show');
            Route::any('add','CategoryController@add');
            Route::any('addSon/{id}','CategoryController@addSon');
            Route::get('showSon/{id}','CategoryController@showSon');
            Route::any('edit/{id}','CategoryController@edit');
            Route::get('del/{id}','CategoryController@del');
        });
        /*订单管理*/
        Route::group(['prefix'=>'order'],function(){
            Route::get('list','OrderController@show');
            Route::get('changeStatus/{id}','OrderController@changeStatus');
            Route::get('changePay/{id}','OrderController@changePay');
        });
        /*评论管理*/
        Route::group(['prefix'=>'comment'],function(){
            Route::get('list','CommentController@show');
            Route::get('hide/{id}','CommentController@hide');
            Route::get('display/{id}','CommentController@display');
        });
        /*广告管理*/
        Route::group(['prefix'=>'ad'],function(){
           Route::get('list','AdController@show');
           Route::any('add','AdController@add');
           Route::any('edit/{id}','AdController@edit');
           Route::get('del/{id}','AdController@del');
           Route::get('up/{id}','AdController@up');
           Route::get('down/{id}','AdController@down');
        });

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


    });
    Route::get('login','IndexController@login');
    Route::post('doLogin','IndexController@doLogin');
    Route::get('register','IndexController@register');
    Route::post('doRegister','IndexController@doRegister');

    Route::get('logout','IndexController@logout');



    Route::group(['middleware'=>'rbac'],function(){

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

        //作者管理
        Route::get('auth','AuthController@show');

        Route::any('auth-status','AuthController@status');
        Route::any('auth-update/{id}','AuthController@update');
        Route::get('auth-del/{id}','AuthController@del');

    });



    //轮播图管理
    Route::get('slideshow','SlideController@show');
    Route::any('slide-add','SlideController@add');
    Route::any('slide-update/{id}','SlideController@update');
    Route::get('slide-del/{id}','SlideController@del');

    //意见反馈
    Route::get('idea','IdeaController@show');
    Route::get('idea-del/{id}','IdeaController@del');


});

//   ==============================================Home

Route::group(['prefix'=>'home','namespace'=>'Home'],function(){

    Route::get('login','LoginController@show');
    Route::post('doLogin','LoginController@doLogin');
    Route::get('reg','RegisterController@show');
    Route::post('doReg','RegisterController@doReg');
    Route::get('index','IndexController@show');
    Route::get('logout','LoginController@logout');
    Route::get('category/{id?}','CategoryController@show');

    Route::group(['prefix'=>'Billboard'],function(){
        Route::get('/','BillboardController@show');
        Route::get('hot','BillboardController@hot');
        Route::get('new','BillboardController@newBook');
    });

    //机构
    Route::get('publisher','PublisherController@show');
    Route::get('pub_info/{id}','PublisherController@info');

    //作者
    Route::get('auth','AuthController@show');

    Route::get('authInfo/{id}','AuthController@info');

    Route::get('verify/{confirmed_code}','RegisterController@emailConfirm');

    Route::group(['middleware'=>'check.home.login'],function(){
        /*详情*/
        Route::group(['prefix'=>'detail'],function(){
            Route::get('/{id}','DetailsController@show');
            Route::post('orderAdd','OrderController@add');
            Route::post('isPay','OrderController@isPay');
            Route::get('collect_ok/{id}','DetailsController@collect_ok');
            Route::get('collect_no/{id}','DetailsController@collect_no');
            Route::get('article/{b_id}/{t_id}','DetailsController@article');
        });
        /*个人中心*/
        Route::group(['prefix' => 'space'],function(){
            /*个人信息*/
            Route::get('/','SpaceController@show');
            Route::get('user','SpaceController@show');
            Route::post('doEdit','SpaceController@doEdit');
            Route::post('editPass','SpaceController@editPass');
            Route::post('editEmail','SpaceController@editEmail');
            Route::post('editIcon','SpaceController@editIcon');

            /*订单*/
            Route::group(['prefix'=>'order'],function(){
                Route::get('/{id}','OrderController@orders');
                Route::get('toPay/{id}','OrderController@toPay');
                Route::get('isCancel/{id}','OrderController@isCancel');
                Route::post('comment','OrderController@comment');
            });

            /*书籍*/
            Route::group(['prefix'=>'book'],function(){
                Route::get('/','SpaceController@book');
                Route::get('no_collect/{id}','SpaceController@no_collect');
                Route::get('read_record/{id}','SpaceController@read_record');
                Route::get('article_space/{b_id}/{t_id}','SpaceController@article');
                Route::get('article/{b_id}/{t_id}','SpaceController@article');
                Route::get('prev/{id}','SpaceController@prev');
                Route::get('next/{id}','SpaceController@next');
            });

        });
    });
    Route::group(['middleware'=>'check.h.login'],function(){
        //作者
        Route::any('authAdd','AuthController@add');
        Route::any('authFocus','AuthController@focus');

        //个人中心 - 作者
        Route::any('authSpace/{id}','AuthController@space');
        Route::any('write/{id}','AuthController@write');

        Route::any('focus','AuthController@focuss');
        Route::any('focus2','AuthController@focuss');
        Route::get('delfocus','AuthController@delfocus');

    });



    Route::get('verify/{confirmed_code}','RegisterController@emailConfirm');


    //机构
        Route::get('publisher','PublisherController@show');
        Route::get('pub_info/{a_id}','PublisherController@info');
        Route::get('verify/{confirmed_code}','RegisterController@emailConfirm');

        Route::any('jk','JkController@show');

    //意见反馈
        Route::any('idea','IdeaController@show');

});

