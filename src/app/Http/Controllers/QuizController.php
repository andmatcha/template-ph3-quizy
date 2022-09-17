<?php

namespace App\Http\Controllers;

use App\Models\BigQuestion;

class QuizController extends Controller
{
    public function index()
    {
        $big_questions = BigQuestion::orderby('big_question_order', 'asc')->get();
        return view('quiz.index', ['big_questions' => $big_questions]);
    }

    public function quiz($big_question_id)
    {
        $big_question = BigQuestion::find($big_question_id)->load('questions.choices');
        $data = [
            'bq' => $big_question
        ];
        return view('quiz.quiz', $data);
    }
}
