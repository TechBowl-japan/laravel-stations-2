@extends('layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col">
            <h3>
                {{ $reservation->name }}
            </h3>
            <p>メールアドレス: {{ $reservation->email }}</p>
            <p>開始時間: {{ $reservation->date }}</p>
            <p>座席: {{ strtoupper($reservation->sheet->row) }}{{ $reservation->sheet->column }}</p>
        </div>
    </div>
@endsection
