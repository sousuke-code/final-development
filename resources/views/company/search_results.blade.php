<!DOCTYPE html>
<html>
<head>
    <title>検索結果</title>
</head>
<body>
    <h1>検索結果</h1>
    @if ($users->isEmpty())
        <p>該当するユーザーが見つかりませんでした。</p>
    @else
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>