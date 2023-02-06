@extends('layouts.app')

@section('content')
    <h3 class="mt-3">新規追加</h3>
    <form method="post" action="{{ route('admin.schedules.store', $movie->id) }}">
      @csrf
      @include('admin.schedules.fields', ['schedule' => null])
    </form>
@endsection
