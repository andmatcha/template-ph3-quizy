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

use App\Http\Middleware\HelloMiddleware;

// quizy - クイズ画面
Route::get('/quiz', 'QuizController@index');
Route::get('/quiz/{big_question_id}', 'QuizController@quiz');

// quizy - 管理画面
Route::get('/admin', 'AdminController@index');
Route::get('/admin/login', 'AdminController@getLogin');
Route::post('/admin/login', 'AdminController@postLogin');
Route::get('/admin/logout', 'AdminController@getLogout');
Route::get('/admin/edit/{big_question_id}', 'AdminController@edit');
Route::post('/admin/update', 'AdminController@postUpdate');

// 青本
Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
