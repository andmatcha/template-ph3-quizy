<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理画面 | 問題一覧</title>
    <link rel="stylesheet" href="{{ asset('css/destyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_index.css') }}">
    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New&display=swap" rel="stylesheet">
</head>

<body>
    {{-- ヘッダー --}}
    @component('components.admin_header', ['page_title' => '問題一覧'])
    @endcomponent
    <div class="wrapper">
        <form action="{{ route('admin.quiz.update') }}" method="POST" id="bq_form">
            @csrf
            {{-- 編集・完了ボタン --}}
            <div class="btns">
                <div class="btns__edit btns__btn" id="edit_btn" onclick="editBtn()">編集</div>
                <div class="btns__done btns__btn hide" id="done_btn" onclick="doneBtn()">完了</div>
            </div>
            <ul class="bq__list">
                {{-- 問題タイトルごとに繰り返し --}}
                @foreach ($big_questions as $big_question)
                    <li class="bq__list__item js_drag" id="title{{ $big_question->id }}">
                        {{-- 問題タイトルの順序 --}}
                        <input type="hidden" class="js_bq_order" name="bq[{{ $big_question->id }}][order]"
                            value="{{ $loop->iteration }}">
                        {{-- ドラッグ用アイコン --}}
                        <div class="bq__list__item__drag_icon js_drag_icon hide">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        {{-- 問題タイトル表示 --}}
                        <div class="bq__list__item__disp js_title_disp" id="disp{{ $big_question->id }}">
                            <a href="{{ route('admin.quiz.detail', ['big_question_id' => $big_question->id]) }}">{{ $big_question->title }}</a>
                        </div>
                        {{-- 問題タイトル編集用input --}}
                        <input type="text" name="bq[{{ $big_question->id }}][title]"
                            value="{{ $big_question->title }}" class="bq__list__item__input js_title_input hide"
                            id="input{{ $big_question->id }}">
                        {{-- 削除ボタン --}}
                        <div class="bq__list__item__delete js_delete_btn hide"
                            onclick="deleteBtn({{ $big_question->id }})">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </li>
                @endforeach
            </ul>
        </form>

        <form action="{{ route('admin.quiz.delete') }}" method="POST" id="delete_form">
            @csrf
            <input type="hidden" id="delete_input" name="delete" value="">
        </form>

        <form action="{{ route('admin.quiz.store') }}" method="POST" id="create_form">
            @csrf
            <h3 class="create_form__title">新規作成</h3>
            <div class="create_form__content">
                <input type="text" name="title" placeholder="問題タイトルを入力してください" class="create_form__content__input">
                <div class="create_form__content__btn" id="create_btn" onclick="createBtn()">作成</div>
            </div>
        </form>
    </div>

    {{-- ドラッグ&ドロップ機能 --}}
    <script src="{{ asset('js/drag_drop.js') }}"></script>
    {{-- 各種ボタン機能 --}}
    <script src="{{ asset('js/admin_index_btns.js') }}"></script>
</body>

</html>
