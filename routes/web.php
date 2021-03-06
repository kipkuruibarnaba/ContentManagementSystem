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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'TodosController@index');

Auth::routes();

Route::group(['prefix'=>'admin',  'middleware'=>'auth'], function (){
//    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/home',[
        'uses' => 'HomeController@index',
        'as'=> 'home'
    ]);

    Route::get('/post/create',[
        'uses' => 'PostController@create',
        'as'=> 'post.create'
    ]);

    Route::post('/post/store',[
        'uses' => 'PostController@store',
        'as'=> 'post.store'
    ]);

    Route::get('/category/create',[
        'uses' => 'CategoriesController@create',
        'as'=> 'category.create'
    ]);
    Route::get('/posts',[
        'uses' => 'PostController@index',
        'as'=> 'posts'
    ]);
    Route::get('/post/edit/{id}',[
        'uses' => 'PostController@edit',
        'as'=> 'post.edit'
    ]);
    Route::post('/post/update/{id}',[
        'uses' => 'PostController@update',
        'as'=> 'post.update'
    ]);
    Route::get('/post/delete/{id}',[
        'uses' => 'PostController@destroy',
        'as'=> 'post.delete'
    ]);
    Route::get('/post/trash',[
        'uses' => 'PostController@trashed',
        'as'=> 'post.trash'
    ]);
    Route::get('/post/kill/{id}',[
        'uses' => 'PostController@kill',
        'as'=> 'post.kill'
    ]);

    Route::get('/post/restore/{id}',[
        'uses' => 'PostController@restore',
        'as'=> 'post.restore'
    ]);
    Route::get('/categories',[
        'uses' => 'CategoriesController@index',
        'as'=> 'categories'
    ]);
    Route::get('/category/edit/{id}',[
        'uses' => 'CategoriesController@edit',
        'as'=> 'category.edit'
    ]);
    Route::get('/category/delete/{id}',[
        'uses' => 'CategoriesController@destroy',
        'as'=> 'category.delete'
    ]);

    Route::post('/category/store',[
        'uses' => 'CategoriesController@store',
        'as'=> 'category.store'
    ]);

    Route::post('/category/update/{id}',[
        'uses' => 'CategoriesController@update',
        'as'=> 'category.update'
    ]);
});
