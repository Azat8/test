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

Route::group(['middleware' => 'web'],function (){

    Route::match(['post','get'],'/',['uses' => 'IndexController@execute','as' => 'index']);
    Route::auth();

});

Route::group(['prefix' => 'admin','middleware' => 'auth'],function (){
    //admin
    Route::get('/',function (){
       if(view()->exists('admin.index')){
           $data = ['title' => 'Панель Администратора'];

           return view  ('admin.index',$data);
       }
    });


    Route::group(['prefix' => 'pages'],function (){
        //admin/category
        Route::get('/',['uses' => 'PagesController@execute','as' => 'pages']);
        Route::match(['get','post'],'/add',['uses' => 'PagesAddController@execute','as' => 'pagesAdd']);
        Route::match(['get','post','delete'],'/edit/{page}',['uses' => 'PagesEditController@execute','as' => 'pagesEdit']);
    });

    Route::group(['prefix' => 'category'],function (){
    //admin/category
    Route::get('/',['uses' => 'CategoryController@execute','as' => 'category']);
    Route::match(['get','post'],'/add',['uses' => 'CategoryAddController@execute','as' => 'categoryAdd']);
    Route::match(['get','post','delete'],'/edit',['uses' => 'CategoryEditController@execute','as' => 'categoryEdit']);
    });

    Route::group(['prefix' => 'product'],function(){
    //admin/product
    Route::get('/', ['uses' => 'ProductController@execute', 'as' => 'product']);
    Route::match(['get','post'],'/add', ['uses' => 'ProductAddController@execute', 'as' => 'productAdd']);
    Route::match(['get','post','delete'],'/edit', ['uses' => 'ProductEditController@execute', 'as' => 'productEdit']);

    });

});
Auth::routes();

Route::get('/home', 'IndexController@execute')->name('home');


