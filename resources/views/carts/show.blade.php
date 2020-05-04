@extends('users')

@include('layouts.script')

@section('content')
@include('layouts.alert')
@include('layouts.error')

<form method="POST" action="{{ route('carts.purchased') }}" class="form-inline m-1">
{{ csrf_field() }}
{{ method_field('PATCH') }}
<div class="col-md-10">
    <button class="btn btn-info float-right" type="submit">購入</button>
</div>
</form>
<h3>合計金額：{{ $total }}円</h3>

@foreach ($item_users as $item_user)
    <h1>{{ $item_user->item->name }}</h1>
    </div>
    <div class="news">
        <img style="width:40%;height:auto;"src="{{ asset($item_user->item->path) }}" alt="img" class="item-content__image">
        <h4> {{ $item_user->item->price }}円</h4>
        <h4>{{ $item_user->item->text }}</h4>

    <form method="POST" action="{{ route('carts.update', $item_user) }}" class="form-inline m-1">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="text" class="form-control" name="quantity" value="{{ $item_user->quantity }}">
                <div class="row">
                    <div class="col-md-10">
                        <button class="btn btn-info float-right" type="submit">編集</button>
                    </div>
                <input type="hidden" name="item_id" value="{{ $item_user->item_id }}">
                <div class="col-md-2">
                    <button type="button" class="delete-confirm btn btn-success" value="A002" data-toggle="modal" data-target="#confirm-delete">削除</button>
                </div>
            </div>
        </form>
        
<!-- Modal -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('carts.destroy', $item_user) }}" method="post">
        {{ csrf_field() }}
        {{ method_field("DELETE") }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">確認</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    削除しますか？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                    <button type="submit" class="btn btn-success" id="deletebtn" name="deletebtn" >はい</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endforeach
@endsection
