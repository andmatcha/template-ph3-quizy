<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
</head>

<body>
    <div class="content-wrapper">
        <h1>@yield('heading')</h1>
        <div class="quiz-container">
            @yield('quiz_content')
        </div>
    </div>

    @yield('script')
</body>

</html>
