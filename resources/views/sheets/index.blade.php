@extends('layouts.app')

@section('content')
    <div class="card mt-5">
        <div class="card-body align-self-center">スクリーン1</div>
    </div>
    <div class="row row-cols-5 mt-5">
        @foreach ($sheets as $key => $sheet)
            <div class="col">
                <div class="card">
                    <div class="card-body align-self-center">
                        <p class="card-text">{{ $sheet->row }}-{{ $sheet->column }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
