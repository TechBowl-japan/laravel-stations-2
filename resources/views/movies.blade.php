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
                {{ $movie->is_showing }}
            </td>
        </tr>
        <tr>
            <td>概要</td>
            <td>{{ $movie->description }}</td>
        </tr>
    </table>

    @endforeach
</body>
</html>