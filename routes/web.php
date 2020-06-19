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
Route::get('/post/{post}', 'PostController@show')->name('post.show');
Route::post('/best-reply/{reply}', 'BestReplyController@store')->name('best-reply.store');
Route::post('/add-reply/{post}', 'ReplyController@store')->name('reply.store');
Route::post('/add-post', 'PostController@store')->name('add-post.store');
Route::delete('/post/{post}/delete', 'PostController@destroy')->name('post.delete');
