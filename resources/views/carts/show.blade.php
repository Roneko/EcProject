@extends('users')

@include('layouts.script')

@section('content')
@include('layouts.alert')
@include('layouts.error')
@foreach ($items as $item)
    <h1>{{ $item->name }}</h1>
    </div>
    <div class="news">
        <img style="width:80%;height:auto;"src="{{ asset($item->path) }}" alt="img" class="item-content__image">
        <h4> {{ $item->price }}円</h4>
        <p>{{ $item->quantity }}個</p>
        <h4>{{ $item->text }}</h4>

        <form method="POST" action="{{ route('carts.store') }}" class="form-inline m-1">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="text" class="form-control" name="quantity" value="{{ ItemUser::where([['user_id',1],['purchased',0]])->get(); }}">
                <div class="row">
                    <div class="col-md-10">
                        <button class="btn btn-info float-right" type="submit">編集</button>
                    </div>
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <div class="col-md-2">
                    <button type="button" class="delete-confirm btn btn-success" value="A002" data-toggle="modal" data-target="#confirm-delete">削除</button>
                </div>
            </div>
        </form>
       
<!-- Modal -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('carts.destroy', $item) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
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
        </div>
    </div>
</div>
@endforeach
@endsection
