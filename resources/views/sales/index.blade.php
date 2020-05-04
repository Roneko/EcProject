@extends('admin')

@section('content')
<h4>売り上げ</h4>
@include('layouts.alert')
@include('layouts.error')
<table class="table">
    <thead class="text-primary">
        <tr>
            <th>売り上げ</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($item_users as $item_user)
        <tr>
            <td ondblclick="window.location='{{ route('/', $item_user) }}';">{{ $item_user->quantity }}個</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
            