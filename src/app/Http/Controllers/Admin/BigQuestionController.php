<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BigQuestion;
use Illuminate\Http\Request;

class BigQuestionController extends Controller
{
    // 問題タイトルの更新・削除
    public function postUpdate(Request $request)
    {
        foreach ($request->bq as $bq_id => $bq) {
            // 問題タイトルの並べ替え・問題タイトルの更新
            $big_question = BigQuestion::find($bq_id);
            $big_question->fill(['title' => $bq['title'], 'big_question_order' => $bq['order']])->save();
        }
        return redirect()->route('admin.quiz.list');
    }

    public function postDelete(Request $request)
    {
        $bq_id = $request->delete;
        $big_question = BigQuestion::find($bq_id);
        $big_question->delete();
        return redirect()->route('admin.quiz.list');
    }

    public function postCreate(Request $request)
    {
        $title = $request->title;
        $order = BigQuestion::max('big_question_order') + 1;
        BigQuestion::create(['title' => $title, 'big_question_order' => $order]);

        return redirect()->route('admin.quiz.list');
    }
}
