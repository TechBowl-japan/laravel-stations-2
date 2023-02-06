@extends('layouts.app')

@section('content')
    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">映画タイトル</th>
                <th scope="col">公開年</th>
                <th scope="col">上映中か</th>
                <th scope="col">概要</th>
                <th scope="col">画像URL</th>
                <th scope="col">作成日時</th>
                <th scope="col">更新日時</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <div class="col">
                    <tr>
                        <th>{{ $movie->id }}</th>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->published_year }}</td>
                        <td>
                            @if ($movie->is_showing)
                                上映中
                            @else
                                上映予定
                            @endif
                        </td>
                        <td>{{ $movie->description }}</td>
                        <td>{{ $movie->image_url }}</td>
                        <td>{{ $movie->created_at }}</td>
                        <td>{{ $movie->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.movies.show', [$movie->id]) }}" class='btn btn-outline-info'>詳細</a>
                            <a href="{{ route('admin.movies.edit', [$movie->id]) }}" class='btn btn-outline-info'>編集</a>
                            <form method="post" action="{{ route('admin.movies.destroy', $movie->id) }}">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                </div>
            @endforeach
        </tbody>
    </table>
@endsection
