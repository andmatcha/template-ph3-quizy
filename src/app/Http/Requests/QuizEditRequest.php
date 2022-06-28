<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == '/admin/edit/{big_question_id}') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必ず入力してください。',
            'mail.email' => '正しいメールアドレスを入力してください',
            'age.between' => '年齢は0~150の間で入力してください。',
            'age.numeric' => '年齢は整数値で入力してください。',
        ];
    }
}
