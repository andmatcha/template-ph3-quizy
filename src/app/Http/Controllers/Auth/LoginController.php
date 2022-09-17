<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $maxAttempts = 4;     // ログイン試行回数（回）
    protected $decayMinutes = 3;   // ログインロックタイム（分）

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $data = [
            'msg' => 'ログインしてください'
        ];
        return view('admin.login', $data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    protected function sendLockoutResponse(Request $request)
    {
        $data = [
            'msg' => 'ロックされました'
        ];
        return view('admin.login', $data);
    }
}
