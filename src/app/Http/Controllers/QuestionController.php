<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Question;

use App\Models\Choice;

class QuestionController extends Controller
{
    public function postUpdate(Request $request)
    {
        foreach ($request->question_id as $question_id) {
            if ($request->hasFile('image' . $question_id)) {
                $file_name = time() . $request->file('image' . $question_id)->getClientOriginalName();
                $request->file('image' . $question_id)->move(public_path('images'), $file_name);
                Question::find($question_id)
                    ->fill(['img' => $file_name])
                    ->save();
            }
        }

        foreach ($request->choices as $choice_id => $choice) {
            if ($choice != '') {
                Choice::find($choice_id)
                    ->fill(['name' => $choice])
                    ->save();
            }
        }

        return redirect('/admin/edit/' . $request->bq_id);
    }
}
