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
route::get('/',function(){
    return view('welcome');
})->name('home');


//Route::get( 'index', 'PostController@index ');

//Route::resource('dashboard/post', 'dashboard\PostController');

Route::resource('dashboard/post', 'dashboard\PostController');
Route::post('dashboard/post/{post}/image','dashboard\PostController@image')->name('post.image');

Route::resource('dashboard/category', 'dashboard\CategoryController');
Route::resource('dashboard/user', 'dashboard\UserController');

Route::get('/', 'web\WebController@index')->name('index');

/*
    Video 57-07-2020 
*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
