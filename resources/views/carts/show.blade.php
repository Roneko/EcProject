@extends('users')

@section('content')
@foreach ($items as $item)
    <h1>{{ $item->name }}</h1>
    </div>
    <div class="news">
        <img style="width:80%;height:auto;"src="{{ asset($item->path) }}" alt="img" class="item-content__image">
        <h4> {{ $item->price }}円</h4>
        <p>{{ $item->quantity }}個</p>
        <h4>{{ App\categories::find($item->category_id)->name }}</h4>
        <h4>{{ $item->text }}</h4>
    </div>
@endforeach
@endsection