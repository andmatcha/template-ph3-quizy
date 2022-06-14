<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        $big_questions = DB::table('big_questions')->get();
        return view('quiz.index', ['big_questions' => $big_questions]);
    }

    public function quiz($id)
    {
        $big_question = DB::table('big_questions')->where('id', $id)->first();
        $questions = DB::table('questions')->where('big_question_id', $id)->get();
        $choices = [];
        foreach ($questions as $question) {
            array_push($choices, DB::table('choices')->where('question_id', $question->id)->get());
        }
        $data = [
            'id' => $id,
            'title' => $big_question->title,
            'questions' => $questions,
            'choices' => $choices
        ];
        return view('quiz.quiz', $data);
    }
}
