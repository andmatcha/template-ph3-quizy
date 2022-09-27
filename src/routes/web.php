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

// quizy - クイズ画面
Route::redirect('/', '/quiz', 301);
Route::get('/quiz', 'QuizController@index')->name('quiz.list');
Route::get('/quiz/{big_question_id}', 'QuizController@quiz')->name('quiz.detail');

// quizy - 管理画面
Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::redirect('/admin', '/admin/quiz', 301);
        Route::get('/admin/quiz', 'Admin\AdminController@index')->name('admin.quiz.list');
        Route::post('/admin/quiz', 'Admin\AdminController@postIndex');
        Route::get('/admin/edit/{big_question_id}', 'Admin\AdminController@edit')->name('admin.quiz.detail');
        Route::post('/admin/bq/update', 'Admin\BigQuestionController@postUpdate');
        Route::post('/admin/bq/delete', 'Admin\BigQuestionController@postDelete');
        Route::post('/admin/bq/create', 'Admin\BigQuestionController@postCreate');
        Route::post('/admin/q/update', 'Admin\QuestionController@postUpdate');
        Route::post('/admin/q/delete', 'Admin\QuestionController@postDelete');
        Route::post('/admin/q/update_order', 'Admin\QuestionController@postUpdateOrder');
    }
);

Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\LoginController@login');
Route::get('/admin/logout', 'Auth\LoginController@logout')->name('logout');
