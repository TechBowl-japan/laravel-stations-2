@extends('layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-5">
            <img src="{{ $movie->image_url }}" width="100%">
        </div>
        <div class="col">
            <h3>
                <span class="badge bg-secondary">
                    @if ($movie->is_showing)
                        上映中
                    @else
                        上映予定
                    @endif
                </span>
                {{ $movie->title }}
            </h3>
            <p>公開年: {{ $movie->published_year }}年</p>
            <p class="show-description">{{ $movie->description }}</p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <a href="{{ route('admin.schedules.create', [$movie->id]) }}" class='btn btn-outline-info'>新規追加</a>
        </div>
    </div>
    <div class="row mt-2">
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">映画タイトル</th>
                    <th scope="col">映画開始時刻</th>
                    <th scope="col">映画終了時刻</th>
                    <th scope="col">作成日時</th>
                    <th scope="col">更新日時</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movie->schedules as $schedule)
                    <div class="col">
                        <tr>
                            <th>{{ $schedule->id }}</th>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $schedule->start_time }}</td>
                            <td>{{ $schedule->end_time }}</td>
                            <td>{{ $schedule->created_at }}</td>
                            <td>{{ $schedule->updated_at }}</td>
                            <td>
                                <a href="{{ route('admin.schedules.edit', [$schedule->id]) }}" class='btn btn-outline-info'>編集</a>
                                <form method="post" action="{{ route('admin.schedules.destroy', $schedule->id) }}">
                                  @csrf
                                  @method('destroy')
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                                </form>
                            </td>
                        </tr>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
