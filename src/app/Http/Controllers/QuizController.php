<?php

namespace App\Http\Controllers;

use App\BigQuestion;
use App\Question;
use App\Choice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        $big_questions = DB::table('big_questions')->get();
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
