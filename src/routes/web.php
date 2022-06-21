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

// quizy
Route::get('/quiz', 'QuizController@index');
Route::get('/quiz/{big_question_id}', 'QuizController@quiz');
Route::get('/quiz/admin', 'QuizController@admin');

// 青本
Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
