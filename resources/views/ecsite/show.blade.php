@extends('users')

@section('content')
   
    <a href="/ecsite/{{ $item->id }}">{{ $item->name }}</a>
    <div class="news">
        <img style="width:80%;height:auto;"src="{{ asset($item->path) }}" alt="img" class="item-content__image">
        <h4>{{ $item->price }}</h4>
        <p>{{ $item->quantity }}個</p>
        <h4>{{ App\categories::find($item->category_id)->name }}</h4>
        <h4>{{ $item->text }}</h4>
    </div>
@endsection