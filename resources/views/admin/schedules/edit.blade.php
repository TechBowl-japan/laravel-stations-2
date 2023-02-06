@extends('layouts.app')

@section('content')
    <h3 class="mt-3">編集</h3>
    <form method="post" action="{{ route("admin.schedules.update", $schedule->id) }}">
      @csrf
      @method('patch')
      @include('admin.schedules.fields', ['schedule' => $schedule,'movie' => $schedule->movie])
    </form>
@endsection
