<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movies</title>
</head>

<body>
  <ul>
    @foreach ($movie as $movies)
    <li>タイトル: {{ $movies->title }}</li>
    <img src="{{$movies->image_url}}">
    <li>製作年: {{ $movies->created_at }}</li>
    <li>上映時間: {{ $movies->time }}</li>
    <li>監督: {{ $movies->director }}</li>
    @endforeach
  </ul>

</body>

</html>