<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>部品管理 - CircuitStock</title>
</head>
<body>
    <h1>部品管理</h1>
    <p>ログイン中：{{ Auth::user()->user_name }}</p>
    <p>部品管理画面（仮）です。</p>

    <form action="/logout" method="POST">
        @csrf

        <button type="submit">ログアウト</button>
    </form>
</body>
</html>
