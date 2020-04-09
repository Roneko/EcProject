@extends('admin')

@section('content')
<h4>商品一覧</h4>
@include('layouts.alert')
@include('layouts.error')
<table class="table">
    <thead class="text-primary">
        <tr>
            <th>商品名</th>
            <th>在庫</th>
            <th>価格</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($items as $item)
        <tr>
            <td ondblclick="window.location='{{ route('item.edit', $item) }}';">{{ $item->name }}</td>
            <td ondblclick="window.location='{{ route('item.edit', $item) }}';">{{ $item->quantity }}個</td>
            <td ondblclick="window.location='{{ route('item.edit', $item) }}';">{{ $item->price }}円</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
            