<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $bq->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
</head>

<body>
    <div class="content-wrapper">
        <h1>{{ $bq->title }}</h1>
        <div class="quiz-container">

            <!-- 設問に関するループ -->
            @foreach ($bq->questions as $question)
                <!-- クイズボックス -->
                <div class="quiz-box">
                    <h1 class="quiz-title">{{ $loop->iteration }}.この地名はなんて読む？</h1>
                    <img src="/images/{{ $question->img }}">
                    <ul id="choices{{ $question->id }}" class="choices-list">

                        <!-- 選択肢に関するループ -->
                        @foreach ($question->choices as $choice)
                            <li id="choice{{ $question->id }}_{{ $loop->iteration }}" class="choice-item"
                                onclick="clickfunction({{ $question->id }},{{ $loop->iteration }},{{ $choice->valid }})">
                                {{ $choice->name }}
                            </li>
                        @endforeach

                    </ul>
                </div>
                <!-- コメントボックス -->
                <div id="comment_box{{ $question->id }}" class="comment-box hide">
                    <h3 id="comment_title{{ $question->id }}" class="comment-title"></h3>
                    <p id="comment_text{{ $question->id }}" class="comment-text"></p>
                </div>
            @endforeach

        </div>
    </div>

    <script src="{{ asset('js/quiz.js') }}"></script>
</body>
