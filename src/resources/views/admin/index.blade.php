{{-- ログインチェック --}}
{{-- 管理画面 --}}
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
    @component('components.admin_header', ['page_title' => '問題一覧'])
    @endcomponent
    <div class="wrapper">
        <form action="/admin">
            <ul class="bq__list">
                @foreach ($big_questions as $big_question)
                    <li class="bq__list__item js_drag" draggable="true">
                        <div class="bq__list__item__disp">
                            <a href="/admin/edit/{{ $big_question->id }}">{{ $big_question->title }}</a>
                        </div>
                        <div class="bq__list__item__edit">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                        </div>
                        <div class="bq__list__item__delete">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        </div>
                    </li>
                @endforeach
            </ul>
        </form>
    </div>

<script src="{{ asset('js/drag_drop.js') }}"></script>
</body>

</html>
