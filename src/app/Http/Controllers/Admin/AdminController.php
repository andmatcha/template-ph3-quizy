<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BigQuestion;

class AdminController extends Controller
{
    public function index()
    {
        $big_questions = BigQuestion::orderby('big_question_order', 'asc')->get();
        return view('admin.index', ['big_questions' => $big_questions]);
    }

    public function edit($big_question_id)
    {
        $big_question = BigQuestion::find($big_question_id)->load(['questions' => function ($query) {
            $query->orderby('question_order', 'asc');
        }]);
        $data = [
            'bq' => $big_question
        ];
        return view('admin.edit', $data);
    }
}
