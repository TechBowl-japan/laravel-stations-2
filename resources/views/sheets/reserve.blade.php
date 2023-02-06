@extends('layouts.app')

@section('content')
    <div class="card mt-5">
        <div class="card-body align-self-center">スクリーン1</div>
    </div>
    <div class="row row-cols-5 mt-5">
        @foreach ($sheets as $key => $sheet)
            <div class="col">
                <div class="card" style="{{ is_null($sheet->reservation_id) ? '' : 'background-color: lightgray;' }}"">
                    <div class="card-body align-self-center">
                        @if (is_null($sheet->reservation_id))
                            <a href="{{ route('reservations.create', ['movieId' => $movieId, 'scheduleId' => $scheduleId, 'date' => $date, 'sheetId' => $sheet->id]) }}">
                                <p class="card-text">{{ $sheet->row }}-{{ $sheet->column }}</p>
                            </a>
                        @else
                            <p class="card-text">{{ $sheet->row }}-{{ $sheet->column }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
