@extends('layouts.app')

@section('content')
    <h3 class="mt-3">編集</h3>
    <form method="post" action="{{ route('admin.movies.update', $movie->id) }}">
      @csrf
      @method('patch')
      @include('admin.movies.fields', ['movie' => $movie])
    </form>
@endsection
