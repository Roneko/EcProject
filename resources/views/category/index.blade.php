@extends('admin')

@section('content')
<h4>カテゴリー一覧</h4>
@include('layouts.alert')
@include('layouts.error')
<table class="table">
    <thead class="text-primary">
        <tr>
            <th>カテゴリー名</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
        <tr>
            <td ondblclick="window.location='{{ route('category.edit', $category) }}';">{{ $category->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
            