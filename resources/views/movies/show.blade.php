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
        <div class="col-3">
            <p class="card-text">スクリーン1</p>
        </div>
    </div>
    <div class="row mt-2">
        @foreach ($schedules as $schedule)
            <div class="col-2">
                <div class="card">
                    <div class="card-body align-self-center">
                        <p class="card-text">{{ $schedule->start_time->format('H:i'); }} 〜 {{ $schedule->end_time->format('H:i') }}</p>
                        <a href="{{ route('sheets.reserve', ['movieId' => $movie->id, 'scheduleId' => $schedule->id, 'date' => $schedule->start_time->format('Y-m-d H:i')]) }}" class="btn btn-primary">座席を予約する</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
