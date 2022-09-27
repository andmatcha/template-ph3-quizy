<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BigQuestion;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Http\Request;

/**
 * 管理者画面 - クイズ詳細
 *
 * 設問の追加・更新・削除
 * 選択肢の追加・更新・削除
 * 設問の順序の変更も可能
 */
class QuizDetailController extends Controller
{
    public function index($big_question_id)
    {
        $big_question = BigQuestion::find($big_question_id)->load(['questions' => function ($query) {
            $query->orderby('question_order', 'asc');
        }]);
        $data = [
            'bq' => $big_question
        ];
        return view('admin.quiz.detail', $data);
    }

    public function postUpdate(Request $request)
    {
        // 既存の設問の選択肢更新
        foreach ($request->choices as $choice_id => $choice) {
            if ($choice != '') {
                Choice::find($choice_id)
                    ->fill(['name' => $choice])
                    ->save();
            }
        }

        // 既存の設問の選択肢削除
        if ($request->has('deleted_choices')) {
            foreach ($request->deleted_choices as $choice_id) {
                Choice::find($choice_id)->update(['valid' => 0]);
                Choice::find($choice_id)->delete();
            }
        }

        // 画像更新、正解の変更、新規選択肢の追加
        if ($request->has('questions')) {
            foreach ($request->questions as $question_id => $question) {
                // 既存の設問の画像更新
                if ($request->hasFile('image' . $question_id)) {
                    $file_name = time() . $request->file('image' . $question_id)->getClientOriginalName();
                    $request->file('image' . $question_id)->move(public_path('images'), $file_name);
                    Question::find($question_id)
                        ->fill(['img' => $file_name])
                        ->save();
                }

                // (int)$prev_valid_choice 更新前の正解の選択肢id
                if (Choice::where([['question_id', '=', $question_id], ['valid', '=', '1']])->first() != NULL) {
                    $prev_valid_choice = Choice::where([['question_id', '=', $question_id], ['valid', '=', '1']])->first()->id;
                } else {
                    // この設問に正解の選択肢がなかった場合
                    $prev_valid_choice = NULL;
                }

                // 正解の選択肢が変わっている場合
                if ($question['valid_choice'] != $prev_valid_choice) {
                    // 一旦その設問の選択肢全てのvalidを0にする
                    Choice::where([
                        ['question_id', '=', $question_id],
                        ['valid', '=', '1']
                    ])
                        ->update(['valid' => 0]);
                    // 新しい正解の選択肢が既にあればその選択肢のvalidを1にする
                    $expected_valid_choice = Choice::find($question['valid_choice']);
                    if ($expected_valid_choice != NULL) {
                        $expected_valid_choice->update(['valid' => 1]);
                    }
                }

                // 新規選択肢がなかった場合スキップ
                if (!isset($question['new_choices'])) continue;
                // 既存の設問に新規選択肢追加
                foreach ($question['new_choices'] as $choice_key => $choice) {
                    if ($question['valid_choice'] == $choice_key) {
                        // この新規選択肢が正解ならばvalidは1
                        Choice::create(['question_id' => $question_id, 'name' => $choice, 'valid' => 1]);
                    } else {
                        // この新規選択肢が正解でなければvalidはデフォルト値(0)
                        Choice::create(['question_id' => $question_id, 'name' => $choice]);
                    }
                }
            }
        }

        // 新規設問追加
        if ($request->has('new_questions')) {
            foreach ($request->new_questions as $nq_key => $nq) {
                if ($request->hasFile('image_new_question' . $nq_key) && isset($nq['valid_choice']) && isset($nq['choices'])) {
                    // 画像追加
                    $file_name = time() . $request->file('image_new_question' . $nq_key)->getClientOriginalName();
                    $request->file('image_new_question' . $nq_key)->move(public_path('images'), $file_name);
                    $created_question = Question::create(['big_question_id' => $request->bq_id, 'img' => $file_name, 'question_order' => $nq_key]);
                    // 選択肢追加
                    foreach ($nq['choices'] as $choice_key => $choice) {
                        if ($nq['valid_choice'] == $choice_key) {
                            Choice::create(['question_id' => $created_question->id, 'name' => $choice, 'valid' => 1]);
                        } else {
                            Choice::create(['question_id' => $created_question->id, 'name' => $choice]);
                        }
                    }
                }
            }
        }
        return redirect()->route('admin.quiz.detail', ['big_question_id' => $request->bq_id]);
    }

    public function postDelete(Request $request)
    {
        if (isset($request->question_id)) {
            Question::find($request->question_id)->delete();
        }
        return redirect()->route('admin.quiz.detail', ['big_question_id' => $request->bq_id]);
    }

    public function postUpdateOrder(Request $request)
    {
        if (isset($request->order)) {
            foreach ($request->order as $question_id => $order) {
                Question::find($question_id)->fill(['question_order' => $order])->save();
            }
        }

        return redirect()->route('admin.quiz.detail', ['big_question_id' => $request->bq_id]);
    }
}
