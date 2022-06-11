<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index($id)
    {
        $data = [
            'id' => $id,
            'msg' => 'bladeです、よろしう'
        ];
        return view('quiz.index', $data);
    }
}
