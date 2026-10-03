<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カテゴリ管理 - CircuitStock</title>
</head>
<body>
    <h1>カテゴリ管理</h1>

    <h2>カテゴリ登録</h2>

    <form action="{{ route('categories.store')}}" method="POST">
        @csrf

        <div>
            <label for="category_name">カテゴリ名</label>
            <input
                type="text"
                id="category_name"
                name="category_name"
                value="{{ old('category_name') }}"
            >

            @error('category_name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">登録</button>
    </form>

    <h2>カテゴリ一覧</h2>

    <ul>
        @forelse ($categories as $category)
            <li>{{ $category->category_name }}</li>
        @empty
            <li>カテゴリはまだ登録されていません</li>
        @endforelse
    </ul>
</body>
</html>
