@extends('layouts.app')

@section('content')
    <form method="get">
        <div class="row form-check mt-3">
            <label class="form-check-label" for="all">
              <input type="radio" name="is_showing" class="form-check-input" id="all" {{ $isShowing === 'all' ? 'checked' : ''}} value="all">すべて</input>
            </label>
            <label class="form-check-label" for="showing">
              <input type="radio" name="is_showing" class="form-check-input" id="showing" {{ $isShowing === "1" ? 'checked' : ''}} value="1">公開中</input>
            </label>
            <label class="form-check-label" for="plan">
              <input type="radio" name="is_showing" class="form-check-input" id="plan" {{ $isShowing === "0" ? 'checked' : ''}} value="0">公開予定</input>
            </label>
        </div>
        <div class="row mb-3">
          <input type="text" name="keyword" class="form-control" placeholder="キーワードで検索する" value="{{ $keyword }}" />
        </div>
        <button type="submit" class="btn btn-primary">検索</button>
    </form>
    <div class="row row-cols-3">
        @foreach ($movies as $movie)
            <div class="col">
                <div class="card movie-card">
                    <a href="{{ route('movies.show', $movie->id) }}">
                        <img src="{{ $movie->image_url }}" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <p class="card-text">{{ $movie->title }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $movies->links() }}
@endsection
