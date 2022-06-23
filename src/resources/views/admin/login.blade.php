<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理画面 | ログイン</title>
</head>
<body>
    <p>{{ $msg }}</p>
    <form action="/admin/login" method="POST">
        @csrf
        <h3>メールアドレス</h3>
        <input type="text" name="email">
        <h3>パスワード</h3>
        <input type="password" name="password">
        <input type="submit" name="send">
    </form>
</body>
</html>
