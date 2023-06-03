<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
</head>
<body>
    @foreach ($movies as $movie)
        <table>
            <tr>
                <th>項目</th>
                <th>情報</th>
            </tr>
            <tr>
                <td>タイトル</td>
                <td>{{ $movie->title }}</td>
            </tr>
            <tr>
                <td>画像URL</td>
                <td>{{ $movie->image_url }}</td>
            </tr>
            <tr>
                <td>公開年</td>
                <td>{{ $movie->published_year }}</td>
            </tr>
            <tr>
                <td>上映中かどうか</td>
                <td>
                    @if ($movie->is_showing)
                        上映中
                    @else
                        上映予定
                    @endif
                </td>
            </tr>
            <tr>
                <td>概要</td>
                <td>{{ $movie->description }}</td>
            </tr>
            <tr>
                <td>登録日時</td>
                <td>{{ $movie->created_at }}</td>
            </tr>
            <tr>
                <td>更新日時</td>
                <td>{{ $movie->updated_at }}</td>
            </tr>
        </table>

    @endforeach
</body>
</html>