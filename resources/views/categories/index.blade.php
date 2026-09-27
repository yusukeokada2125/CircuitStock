<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カテゴリ管理 - CircuitStock</title>
</head>
<body>
    <h1>カテゴリ管理</h1>

    <ul>
        @forelse ($categories as $category)
            <li>{{ $category->category_name }}</li>
        @empty
            <li>カテゴリはまだ登録されていません</li>
        @endforelse
    </ul>
</body>
</html>
