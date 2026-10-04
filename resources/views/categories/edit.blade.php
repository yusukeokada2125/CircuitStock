<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カテゴリ編集 - CircuitStock</title>
</head>
<body>
    <h1>カテゴリ編集</h1>
    <p>現在のカテゴリ名：{{ $category->category_name }}</p>
    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="category_name">カテゴリ名</label>
            <input
                type="text"
                id="category_name"
                name="category_name"
                value="{{ old('category_name', $category->category_name) }}"
            >
            @error('category_name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">更新</button>
    </form>
    <a href="{{ route('categories.index') }}">カテゴリ一覧へ戻る</a>
</body>
</html>
