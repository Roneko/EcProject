@extends('users')

@include('layouts.script')

@section('content')
@foreach ($item_users as $item_user)
    <h1>{{ $item_user->item->name }}</h1>
    <div class="news">
        <img style="width:50%;height:auto;"src="{{ asset($item_user->item->path) }}" alt="img" class="item-content__image">
        <h4> {{ $item_user->item->price }}円</h4>
        <h4>{{ $item_user->quantity }}個</h4>
        <h4>購入日：{{ $item_user->updated_at }}</h4>

    </div>
@endforeach
@endsection
