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
            $big_questions = BigQuestion::orderby('big_question_order', 'asc')->get();
            return view('admin.index', ['big_questions' => $big_questions]);
        } else {
            return redirect()->action('LoginController@getLogin');
        }
    }

    public function edit($big_question_id)
    {
        if (Auth::check()) {
            $big_question = BigQuestion::find($big_question_id)->load(['questions' => function ($query) {
                $query->orderby('question_order', 'asc');
            }]);
            $data = [
                'bq' => $big_question
            ];
            return view('admin.edit', $data);
        } else {
            return redirect()->action('LoginController@getLogin');
        }
    }
}
