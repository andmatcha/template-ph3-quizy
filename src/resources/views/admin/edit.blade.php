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
        <form action="/admin/q/update" method="POST" enctype="multipart/form-data" id="edit_form">
            @csrf
            <div class="big_question">
                <h2 class="big_question__headding">{{ $bq->title }}</h2>
                <input type="hidden" name="bq_id" value="{{ $bq->id }}">
            </div>

            <div class="questions">
                <div class="questions__inner" id="questionsList">
                    @foreach ($bq->questions as $question)
                        <div class="questions__inner__question">
                            <input type="hidden" name="question_id[]" value="{{ $question->id }}">
                            <h3 class="questions__inner__question__headding">
                                <select name="question_order[{{ $question->id }}]" class="questions__inner__question__headding__select js_order_select">
                                </select>
                                問目
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
                                            <li class="questions__inner__question__content__choices__list__choice">
                                                <input name="choices[{{ $choice->id }}]" type="text"
                                                    value="{{ $choice->name }}"
                                                    class="questions__inner__question__content__choices__list__choice__input">
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
    </div>


    {{-- 選択肢追加用 --}}
    <li class="questions__inner__question__content__choices__list__choice hide" id="new_choice">
        <input name="question[{{ $question->id }}][choices][]" type="text"
            class="questions__inner__question__content__choices__list__choice__input">
    </li>

    {{-- 設問追加用 --}}
    <div class="questions__inner__question hide" id="new_question">
        <h3 class="questions__inner__question__headding">#iteration#問目</h3>
        <div class="questions__inner__question__content">
            <div class="questions__inner__question__content__image">
                <input name="new_question[#iteration#][image]" type="file" id="questionImage#iteration#"
                    onchange="previewFile(this, #iteration#)" class="questions__inner__question__content__image__input">
                <div class="questions__inner__question__content__image__preview">
                    <img src="" id="imagePreview#iteration#">
                </div>
            </div>
            <div class="questions__inner__question__content__choices">
                <ul class="questions__inner__question__content__choices__list" id="choicesList#iteration#">
                    <li class="questions__inner__question__content__choices__list__choice">
                        <input name="new_question[#iteration#][choices][]" type="text" value=""
                            class="questions__inner__question__content__choices__list__choice__input">
                    </li>
                </ul>
                <div class="questions__inner__question__content__choices__add add_btn" onclick="addChoice(#iteration#)"
                    id="addChoiceBtn">+ 選択肢を追加</div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/edit.js') }}"></script>
</body>

</html>
