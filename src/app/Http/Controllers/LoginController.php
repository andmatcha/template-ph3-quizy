<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
        return redirect()->action('LoginController@getLogin');
    }
}
