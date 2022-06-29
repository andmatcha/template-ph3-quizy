<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BigQuestion;

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
        return redirect()->action('AdminController@index');
    }

    public function postDelete(Request $request)
    {
        $bq_id = $request->delete;
        $big_question = BigQuestion::find($bq_id);
        $big_question->delete();
        return redirect()->action('AdminController@index');
    }
}