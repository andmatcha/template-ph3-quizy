<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        body {
            font-size: 16px;
            color: #999;
            margin: 5px;
        }

        h1 {
            font-size: 50px;
            color: #f6f6f6;
        }

        ul {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <h1>@yield('title')</h1>
    @section('menubar')
    <h2 class="menutitle">メニュー</h2>
    <ul>
        <li>@show</li>
    </ul>
    <hr size="1">
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
</body>

</html>
