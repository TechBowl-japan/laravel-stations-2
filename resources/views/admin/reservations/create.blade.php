@extends('layouts.app')

@section('content')
    <h3 class="mt-3">新規追加</h3>
    <form method="post" action="{{ route('admin.reservations.store') }}">
      @csrf
      @include('admin.reservations.fields', ['reservation' => null, 'edit' => false])
    </form>
@endsection
