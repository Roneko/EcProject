@extends('users')

@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i>失敗</h4>
    {{ session('message') }}
</div>
@endif
@foreach ($items as $item)
    <h1><a href="/ecsite/{{ $item->id }}">{{ $item->name }}</a></h1>
    </div>
    <div class="news">
        <img style="width:80%;height:auto;"src="{{ asset($item->path) }}" alt="img" class="item-content__image">
        <h4> {{ $item->price }}円</h4>
        <p>{{ $item->quantity }}個</p>
        <h4>{{ App\category::find($item->category_id)->name }}</h4>
        <h4>{{ $item->text }}</h4>
    </div>
    @auth
<form method="POST" action="{{ route('carts.store') }}" class="form-inline m-1">
        {{ csrf_field() }}
            <select name="quantity" class="form-control col-md-2 mr-1">
                <option selected>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <button type="submit" class="btn btn-primary col-md-6">カートに入れる</button>
        </form>
    @endauth
@endforeach
@endsection