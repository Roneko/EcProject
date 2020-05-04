@extends('admin')

@section('content')
<h4>売上合計{{ $total }}円</h4>
@include('layouts.alert')
@include('layouts.error')
<table class="table">
    <thead class="text-primary">
        <tr>
            <th>購入者</th>
            <th>商品</th>
            <th>価格</th>
            <th>売上数</th>
            <th>売上金額</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($item_users as $item_user)
        <tr>
            <td>{{ $item_user->user->name}}</td>
            <td>{{ $item_user->item->name}}</td>
            <td>{{ $item_user->item->price}}円</td>
            <td>{{ $item_user->quantity}}個</td>
            <td>{{ $item_user->price}}円</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
            