<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BigQuestion;
use Illuminate\Http\Request;

/**
 * 管理者画面 - クイズ一覧
 *
 * 大問の表示・追加・更新・削除
 * 順序の変更も可能
 */
class QuizListController extends Controller
{
    public function index()
    {
        $big_questions = BigQuestion::orderby('big_question_order', 'asc')->get();
        return view('admin.quiz.list', ['big_questions' => $big_questions]);
    }

    // 大問追加
    public function store(Request $request)
    {
        $title = $request->title;
        $order = BigQuestion::max('big_question_order') + 1;
        BigQuestion::create(['title' => $title, 'big_question_order' => $order]);

        return redirect()->route('admin.quiz.list');
    }

    // 大問更新（タイトル、順序）
    public function update(Request $request)
    {
        foreach ($request->bq as $bq_id => $bq) {
            $big_question = BigQuestion::find($bq_id);
            $big_question->fill(['title' => $bq['title'], 'big_question_order' => $bq['order']])->save();
        }
        return redirect()->route('admin.quiz.list');
    }

    // 大問削除
    public function delete(Request $request)
    {
        $bq_id = $request->delete;
        $big_question = BigQuestion::find($bq_id);
        $big_question->delete();
        return redirect()->route('admin.quiz.list');
    }
}
