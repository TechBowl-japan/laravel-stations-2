@extends('layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col">
            <a href="{{ route('admin.reservations.create') }}" class='btn btn-outline-info'>新規追加</a>
        </div>
    </div>
    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">予約者氏名</th>
                <th scope="col">メールアドレス</th>
                <th scope="col">映画タイトル</th>
                <th scope="col">予約時間</th>
                <th scope="col">座席番号</th>
                <th scope="col">作成日時</th>
                <th scope="col">更新日時</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <div class="col">
                    <tr>
                        <th>{{ $reservation->id }}</th>
                        <td>{{ $reservation->name }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->schedule->movie->title }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ strtoupper($reservation->sheet->row) }}{{ $reservation->sheet->column }}</td>
                        <td>{{ $reservation->created_at }}</td>
                        <td>{{ $reservation->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.reservations.show', [$reservation->id]) }}" class='btn btn-outline-info'>詳細</a>
                            <a href="{{ route('admin.reservations.edit', [$reservation->id]) }}" class='btn btn-outline-info'>編集</a>
                            <form method="post" action="{{ route('admin.reservations.destroy', $reservation->id) }}">
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
