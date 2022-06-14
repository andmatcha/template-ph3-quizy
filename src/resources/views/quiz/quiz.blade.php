<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            border: 0;
            font-family: sans-serif;
        }

        .content-wrapper {
            max-width: 650px;
            width: 100%;
            height: 40px;
            margin: 0 auto;
            font-family: sans-serif;
        }

        h1 {
            margin: 0;
            font-size: 19px;
            font-weight: 600;
            margin: 15px 15px 0 15px;
            letter-spacing: 0.05em;
        }

        /* クイズ部分 */
        .quiz-container {
            width: 100%;
        }

        .quiz-box {
            margin: 30px 15px;
        }

        .quiz-title {
            display: inline-block;
            margin: 0;
            font-size: 17px;
            line-height: 20px;
            font-weight: 600;
        }

        .quiz-title::after {
            content: "";
            display: block;
            margin-top: 10px;
            width: 120px;
            height: 2px;
            background-color: #00ab36;
        }

        img {
            width: 100%;
        }

        .choices-list {
            list-style-type: none;
            margin: 0;
            padding: 0;
            border: 0;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .choice-item {
            display: block;
            box-sizing: border-box;
            border: 1px solid #ebebeb;
            border-radius: 2px;
            padding: 13px;
            margin: 5px 0;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            box-shadow: 0 3px 2px -2px rgb(0 0 0 / 13%);
        }

        /* 回答後の選択肢 */

        .clicked-choice {
            color: #fff;
            background-color: #ff5128;
        }

        .valid-choice {
            color: #fff;
            background-color: #287dff;
        }

        /* 回答ボックス */

        .comment-box {
            background-color: #f5f5f5;
            padding: 17px;
            margin: 0 15px;
            border-radius: 3px;
        }

        .comment-title {
            font-size: 16px;
            line-height: 20px;
            font-weight: 600;
            padding-bottom: 3px;
            margin-top: 0;
            margin-bottom: 10px;
            display: inline-block;
        }

        .comment-text {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
        }

        .hide {
            display: none;
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <h1>{{ $title }}</h1>
        <div class="quiz-container">
            <!-- 設問に関するループ -->
            @foreach ($questions as $question)
                <!-- クイズボックス -->
                <div class="quiz-box">
                    <h1 class="quiz-title">{{ $loop->iteration }}.この地名はなんて読む？</h1>
                    <img src="/images/{{ $question->img }}">
                    <ul id="choices{{ $question->id }}" class="choices-list">

                        <!-- 選択肢に関するループ -->
                        @foreach ($choices[$loop->index] as $choice)
                            <li id="choice{{ $question->id }}_{{ $loop->iteration }}" class="choice-item"
                                style="order: {{ $loop->iteration }};"
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

    <script>
        function clickfunction(questionId, clickedChoiceId, valid) {
            //選択肢の色を変える
            const clickedChoice = document.getElementById(`choice${questionId}_${clickedChoiceId}`);
            clickedChoice.classList.add('clicked-choice');
            const validChoice = document.getElementById(`choice${questionId}_1`);
            validChoice.classList.add('valid-choice');
            //クリック無効化
            const choices = document.querySelectorAll(`#choices${questionId} li`);
            choices.forEach((li) => {
                li.style.pointerEvents = 'none';
            });

            //ボックスを表示する
            const commentTitle = document.getElementById(`comment_title${questionId}`);
            if (valid) {
                commentTitle.innerText = '正解！';
                commentTitle.style.borderBottom = 'solid 3px #287dff';
            } else {
                commentTitle.innerText = '不正解！';
                commentTitle.style.borderBottom = 'solid 3px #ff5128';
            }
            const commentBox = document.getElementById(`comment_box${questionId}`);
            document.getElementById(`comment_text${questionId}`).innerText = `正解は「${validChoice.innerText}」です！`;
            commentBox.classList.remove('hide');
        }
    </script>
</body>
