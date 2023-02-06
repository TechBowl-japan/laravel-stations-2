@extends('layouts.app')

@section('content')
    <h3 class="mt-3">編集</h3>
    <form method="post" action="{{ route('admin.reservations.update', $reservation->id) }}">
      @csrf
      @method('patch')
      @include('admin.reservations.fields', ['reservation' => $reservation, 'edit' => true])
    </form>
@endsection
