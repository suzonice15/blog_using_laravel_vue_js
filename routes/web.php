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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/****=============== category section    =====================  ******/
Route::get('/categories', 'admin\CategoryController@index');
Route::post('category-urlcheck', 'admin\CategoryController@urlCheck');
//Route::get('admin/category/create', 'admin\CategoryController@create');
Route::post('admin/category/store', 'admin\CategoryController@store');
Route::post('/category/update/{id}', 'admin\CategoryController@update');
Route::get('/category/edit/{id}', 'admin\CategoryController@edit');
 Route::get('/admin/category/delete/{id}', 'admin\CategoryController@delete');
Route::get('category/pagination/fetch_data', 'admin\CategoryController@fetch_data');



/****=============== post section    =====================  ******/
Route::get('admin/posts/list', 'admin\PostController@index');
Route::post('post-urlcheck', 'admin\PostController@urlCheck')->name('post.urlcheck');
Route::get('post-foldercheck', 'admin\PostController@foldercheck')->name('post.foldercheck');
 Route::post('admin/post/store', 'admin\PostController@store');
Route::post('admin/post/update/{id}', 'admin\PostController@update');


//Route::get('/admin/post/{id}', 'admin\PostController@edit');
Route::get('/admin/post/delete/{id}', 'admin\PostController@destroy');
Route::get('posts/pagination', 'admin\PostController@pagination');




Route::get('/{any}', 'HomeController@index')->where('any','.*');
