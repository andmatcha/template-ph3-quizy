<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BigQuestion;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $big_questions = BigQuestion::all();
            return view('admin.index', ['big_questions' => $big_questions]);
        } else {
            return redirect()->action('AdminController@getLogin');
        }
    }

    public function edit($big_question_id)
    {
        if(Auth::check()) {
            $big_question = BigQuestion::find($big_question_id)->load('questions.choices');
            $data = [
                'bq' => $big_question
            ];
            return view('admin.edit', $data);
        } else {
            return redirect()->action('AdminController@getLogin');
        }
    }

    public function postUpdate(Request $request)
    {
        $data = [
            'question1' => $request->question1
        ];
        return view('admin.test', $data);
    }

    public function getLogin()
    {
        $data = [
            'msg' => '入力してください'
        ];
        return view('admin.login', $data);
    }

    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->action('AdminController@index');
        } else {
            $msg = 'ログインに失敗しました。';
            return view('admin.login', ['msg' => $msg]);
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->action('AdminController@getLogin');
    }
}
