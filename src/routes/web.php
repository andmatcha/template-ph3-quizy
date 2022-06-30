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
Route::post('/admin', 'AdminController@postIndex');
Route::get('/admin/login', 'LoginController@getLogin');
Route::post('/admin/login', 'LoginController@postLogin');
Route::get('/admin/logout', 'LoginController@getLogout');
Route::get('/admin/edit/{big_question_id}', 'AdminController@edit');
Route::post('/admin/bq/update', 'BigQuestionController@postUpdate');
Route::post('/admin/bq/delete', 'BigQuestionController@postDelete');
Route::post('/admin/bq/create', 'BigQuestionController@postCreate');
Route::post('/admin/q/update', 'QuestionController@postUpdate');

// 青本
Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
