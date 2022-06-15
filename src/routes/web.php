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

// quizy
Route::get('/quiz', 'QuizController@index');
Route::get('/quiz/{id}', 'QuizController@quiz');

// 青本
Route::get('hello', 'HelloController@index');
Route::get('hello/other', 'HelloController@other');
