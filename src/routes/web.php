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
Route::redirect('/', '/quiz', 301);
Route::get('/quiz', 'QuizController@index');
Route::get('/quiz/{big_question_id}', 'QuizController@quiz');

// quizy - 管理画面
Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('/admin', 'AdminController@index');
        Route::post('/admin', 'AdminController@postIndex');
        Route::get('/admin/edit/{big_question_id}', 'AdminController@edit');
        Route::post('/admin/bq/update', 'BigQuestionController@postUpdate');
        Route::post('/admin/bq/delete', 'BigQuestionController@postDelete');
        Route::post('/admin/bq/create', 'BigQuestionController@postCreate');
        Route::post('/admin/q/update', 'QuestionController@postUpdate');
        Route::post('/admin/q/delete', 'QuestionController@postDelete');
        Route::post('/admin/q/update_order', 'QuestionController@postUpdateOrder');
    }
);

Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\LoginController@login');
Route::get('/admin/logout', 'Auth\LoginController@logout')->name('logout');
