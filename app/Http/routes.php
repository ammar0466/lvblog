<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', 'PagesController@showAboutPage');

Route::get('/contactus', 'PagesController@showContactPage');

Route::get('/admin/dashboard', 'AdminController@showAdminDashboard');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/post', ['as' => 'post.index','uses' => 'PostController@showAllPosts']);


Route::get('/post/create', ['as' => 'post.create','uses' => 'PostController@createPost']);
Route::post('/post/create/save', ['as' => 'post.create.save','uses' => 'PostController@savePost']);
Route::get('/post/edit/{id}', ['as' => 'post.edit','uses' => 'PostController@editPost']);
Route::post('/post/edit/update/{id}', ['as' => 'post.edit.update','uses' => 'PostController@updatePost']);
Route::get('/post/delete/{id}', ['as' => 'post.delete','uses' => 'PostController@deletePost']);

