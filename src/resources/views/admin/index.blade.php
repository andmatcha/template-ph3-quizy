{{-- ログインチェック --}}
{{-- 管理画面 --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理画面 | トップ</title>
</head>

<body>
    <p>ログイン中<a href="/admin/logout">ログアウト</a></p>
    <section>
        <h2>問題編集</h2>
        <ul>
            @foreach ($big_questions as $big_question)
                <li><a href="/admin/edit/{{ $big_question->id }}">{{ $big_question->title }}</a></li>
            @endforeach
        </ul>
    </section>


</body>

</html>
