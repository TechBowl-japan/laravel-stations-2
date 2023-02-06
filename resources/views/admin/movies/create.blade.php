@extends('layouts.app')

@section('content')
    <h3 class="mt-3">新規追加</h3>
    <form method="post" action="{{ route('admin.movies.store') }}">
      @csrf
      @include('admin.movies.fields', ['movie' => null])
    </form>
@endsection
