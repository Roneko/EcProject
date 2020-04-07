@extends('admin')

@section('content')
<h4>商品一覧</h4>
@include('layouts.alert')
@include('layouts.error')
<table class="table">
    <thead class="text-primary">
        <tr>
            <th>商品名</th>
            <th>価格</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@endsection
            