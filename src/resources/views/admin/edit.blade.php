<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理画面 | 編集</title>
    <link rel="stylesheet" href="{{ asset('css/destyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_edit.css') }}">
    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New&display=swap" rel="stylesheet">
</head>

<body>
    @component('components.admin_header', ['page_title' => '編集'])
    @endcomponent
    <div class="wrapper">
        <div class="big_question">
            <h2 class="big_question__headding">{{ $bq->title }}</h2>
            <div class="big_question__btn" onclick="sortBtn()" id="sort_btn">並び替え</div>
            <div class="big_question__btn big_question__btn--done hide" onclick="sendSortForm()" id="sort_done_btn">完了</div>
        </div>
        <form action="/admin/q/update" method="POST" enctype="multipart/form-data" id="edit_form">
            @csrf
            <input type="hidden" name="bq_id" value="{{ $bq->id }}">

            <div class="questions">
                <div class="questions__inner" id="questionsList">
                    @foreach ($bq->questions as $question)
                        <div class="questions__inner__question" id="question{{ $question->id }}">
                            <h3 class="questions__inner__question__headding">
                                {{ $loop->iteration }}問目
                                <div onclick="deleteQuestion({{ $question->id }}, false)"
                                    class="questions__inner__question__headding__delete">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </h3>
                            <div class="questions__inner__question__content">
                                <div class="questions__inner__question__content__image">
                                    <input name="image{{ $question->id }}" type="file"
                                        accept="image/png, image/jpeg" id="questionImage{{ $loop->iteration }}"
                                        onchange="previewFile(this, {{ $loop->iteration }})"
                                        class="questions__inner__question__content__image__input">
                                    <div class="questions__inner__question__content__image__preview">
                                        <img src="/images/{{ $question->img }}"
                                            id="imagePreview{{ $loop->iteration }}">
                                    </div>
                                </div>
                                <div class="questions__inner__question__content__choices">
                                    <ul class="questions__inner__question__content__choices__list"
                                        id="choicesList{{ $loop->iteration }}">
                                        {{-- 既存の選択肢を表示 --}}
                                        @foreach ($question->choices as $choice)
                                            <li
                                                class="questions__inner__question__content__choices__list__choice js_choice">
                                                <input name="choices[{{ $choice->id }}]" type="text"
                                                    value="{{ $choice->name }}"
                                                    class="questions__inner__question__content__choices__list__choice__input">

                                                {{-- 正解ラジオボタン --}}
                                                @if ($choice->valid == 1)
                                                    <input type="radio"
                                                        name="questions[{{ $question->id }}][valid_choice]"
                                                        value="{{ $choice->id }}" checked>
                                                @else
                                                    <input type="radio"
                                                        name="questions[{{ $question->id }}][valid_choice]"
                                                        value="{{ $choice->id }}">
                                                @endif
                                                {{-- 削除ボタン --}}
                                                <div class="questions__inner__question__content__choices__list__choice__delete js_delete_btn"
                                                    onclick="deleteChoice(this, {{ $choice->id }})">
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
                                    <div class="questions__inner__question__content__choices__add add_btn"
                                        onclick="addChoice({{ $loop->iteration }}, {{ $question->id }})"
                                        id="addChoiceBtn">+ 選択肢を追加</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="questions__btn add_btn" onclick="addQuestion()" id="addChoiceBtn">+ 設問を追加</div>
            </div>
            <div class="send">
                <div class="send__btn" onclick="sendForm()">更新する</div>
            </div>
        </form>
        <form action="/admin/q/delete" method="POST" id="delete_form">
            @csrf
            <input type="hidden" name="bq_id" value="{{ $bq->id }}">
            <input type="hidden" name="question_id" id="delete_input">
        </form>

        {{-- 並び替え画面 --}}
        <form action="/admin/q/update_order" method="POST" class="hide" id="sort_form">
            @csrf
            <input type="hidden" name="bq_id" value="{{ $bq->id }}">
            <div class="sort" id="sort_list">
                @foreach ($bq->questions as $question)
                    <div class="sort__question js_drag" draggable="true" id="sort_item{{ $loop->iteration }}">
                        <div class="sort__question__img">
                            <img src="/images/{{ $question->img }}">
                        </div>
                        <input type="hidden" name="order[{{ $question->id }}]" value="{{ $loop->iteration }}" class="js_order_input">
                    </div>
                @endforeach
            </div>
        </form>
    </div>

    {{-- 設問追加用 --}}
    <div class="questions__inner__question hide" id="new_question">
        <h3 class="questions__inner__question__headding">
            #iteration#問目
            <div onclick="deleteQuestion(#iteration#, true)" class="questions__inner__question__headding__delete">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        </h3>
        <div class="questions__inner__question__content">
            <div class="questions__inner__question__content__image">
                <input name="image_new_question#iteration#" type="file" id="questionImage#iteration#"
                    onchange="previewFile(this, #iteration#)"
                    class="questions__inner__question__content__image__input">
                <div class="questions__inner__question__content__image__preview">
                    <img src="" id="imagePreview#iteration#">
                </div>
            </div>
            <div class="questions__inner__question__content__choices">
                <ul class="questions__inner__question__content__choices__list" id="choicesList#iteration#"></ul>
                <div class="questions__inner__question__content__choices__add add_btn"
                    onclick="addChoice(#iteration#, 'new')" id="addChoiceBtn">+ 選択肢を追加</div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/edit.js') }}"></script>
    <script src="{{ asset('js/drag_drop.js') }}"></script>
</body>

</html>
