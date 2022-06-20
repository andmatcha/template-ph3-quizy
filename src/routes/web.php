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
Route::get('/quiz/{id}', 'QuizController@quiz');

// 青本
Route::get('hello', 'HelloController@index');
Route::get('hello/other', 'HelloController@other');
Route::get('hello/chapter3', 'HelloController@chapter3');
Route::post('hello/chapter3', 'HelloController@post');
Route::get('hello/chapter3-1', 'HelloController@chapter3_1');
Route::get('hello/chapter4', 'HelloController@chapter4')->middleware('helo');
