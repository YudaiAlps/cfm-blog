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



Auth::routes();
Route::get('/', 'PostsController@index');
Route::get('/', 'PostsController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mypage', 'UsersController@index');

Route::get('/post/add', 'PostsController@add');
Route::post('/post/add', 'PostsController@create');
Route::get('/post/{id}/show', 'PostsController@show')->name('show');
Route::delete('/post/{id}', 'PostsController@destroy');
Route::resource('post', 'ComController', ['only' => ['destroy']]);
