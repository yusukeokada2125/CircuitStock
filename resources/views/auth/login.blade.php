<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン | CircuitStock</title>
</head>
<body>
    <h1>ログイン</h1>

    <form action="/login" method="POST">
        @csrf

        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password">
        </div>

        <button type="submit">ログイン</button>
    </form>
</body>
</html>
