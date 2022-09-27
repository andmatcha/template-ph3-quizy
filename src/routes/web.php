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

/* ユーザー画面 */
Route::redirect('/', '/quiz', 301);
Route::get('/quiz', 'QuizController@index')->name('quiz.list');
Route::get('/quiz/{big_question_id}', 'QuizController@quiz')->name('quiz.detail');

/* 管理者画面 */
Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::redirect('/admin', '/admin/quiz', 301);
        // クイズ一覧画面
        Route::get('/admin/quiz', 'Admin\QuizListController@index')->name('admin.quiz.list');
        Route::post('/admin/quiz', 'Admin\QuizListController@postIndex');
        Route::post('/admin/quiz/store', 'Admin\QuizListController@store')->name('admin.quiz.list.store');
        Route::post('/admin/quiz/update', 'Admin\QuizListController@update')->name('admin.quiz.list.update');
        Route::post('/admin/quiz/delete', 'Admin\QuizListController@delete')->name('admin.quiz.list.delete');
        // クイズ詳細画面
        Route::get('/admin/quiz/{big_question_id}', 'Admin\QuizDetailController@index')->name('admin.quiz.detail');
        Route::post('/admin/quiz/detail/update', 'Admin\QuestionController@postUpdate')->name('admin.quiz.detail.update');
        Route::post('/admin/quiz/detail/delete', 'Admin\QuestionController@postDelete')->name('admin.quiz.detail.delete');
        Route::post('/admin/quiz/detail/update_order', 'Admin\QuestionController@postUpdateOrder')->name('admin.quiz.detail.order.update');
    }
);

// 認証
Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\LoginController@login');
Route::get('/admin/logout', 'Auth\LoginController@logout')->name('logout');
