<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理画面 | 編集</title>
    <link rel="stylesheet" href="{{ asset('css/destyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <form action="/admin/db" method="POST">
            <div class="big_question">
                <h2 class="big_question__headding">問題タイトル</h2>
                <input type="text" value="{{ $bq->title }}" class="big_question__input">
            </div>
            <div class="questions">
                <div class="questions__inner" id="questionsList">
                    @foreach ($bq->questions as $question)
                        <div class="questions__inner__question">
                            <h3 class="questions__inner__question__headding">{{ $loop->iteration }}問目</h3>
                            <div class="questions__inner__question__content">
                                <div class="questions__inner__question__content__image">
                                    <input type="file" id="questionImage{{ $loop->iteration }}"
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
                                        @foreach ($question->choices as $choice)
                                            <li class="questions__inner__question__content__choices__list__choice">
                                                <input type="text" value="{{ $choice->name }}"
                                                    class="questions__inner__question__content__choices__list__choice__input">
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="questions__inner__question__content__choices__add add_btn"
                                        onclick="addChoice({{ $loop->iteration }})" id="addChoiceBtn">+ 選択肢を追加</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="questions__btn add_btn" onclick="addQuestion()" id="addChoiceBtn">+ 設問を追加</div>
            </div>
            <div class="send">
                <button class="send__btn">更新する</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/edit.js') }}"></script>
</body>

</html>
