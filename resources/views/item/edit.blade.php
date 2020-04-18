@extends('admin')

@include('layouts.script')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
                <div class="card-header">
                    <h4 class="card-title">商品記事編集</h4>
                </div>
                @include('layouts.alert')
                @include('layouts.error')
                <div class="news_header__title">
                    <h1>{{ $item->name }}</h1>
                </div>
                <div class="news">
                    <img style="width:80%;height:auto;"src="{{ asset($item->path) }}" alt="img" class="item-content__image">
                    <h4> {{ $item->price }}円</h4>
                    <p>{{ $item->quantity }}個</p>
                    <h4>{{ App\categories::find($item->category_id)->name }}</h4>
                    <h4>{{ $item->text }}</h4>
                </div>
                <form method="POST" action="{{ route('item.update', $item)}}" enctype="multipart/form-data" class="col-6">
                    <!-- @csrf -->
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>商品名</label>
                            <input type="text" class="form-control" placeholder="商品名" name="name" value="{{ $item->name }}">
                        </div>
                    </div>
                    <div class="col-md-5 px-1">
                        <div class="form-group">
                            <label>価格</label>
                            <input type="text" class="form-control" placeholder="例:2,000" name="price" value="{{ $item->price }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>在庫</label>
                                <input type="text" class="form-control" placeholder="例:20" name="quantity" value="{{ $item->quantity }}">
                            </div>
                        </div>
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>カテゴリー</label>
                                {{ Form::select('category_name', \App\categories::select('id', 'name')
                                    ->get()->pluck('name','id')->prepend( "選択してください", ""), null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>商品画像</label>
                                <div class="btn btn-primary">
                                    選択
                                    <input type="file" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>テキスト</label>
                                <textarea name="text" id="" cols="30" rows="40" class="form-control">{{ $item->text }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-2">
                                <span class="btn btn-danger float-left" data-toggle="modal" data-target="#deleteModal">削除</span>
                            </div>
                            <div class="col-md-10">
                                <button class="btn btn-info float-right" type="submit">編集</button>
                            </div>
                        </div>
                </form>
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('item.destroy', $item) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">削除確認画面</h4></h4>
                                </div>
                                <div class="modal-body">
                                    <label>{{ $item->name }}のデータを削除しますか？</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                                    <button type="submit" class="btn btn-danger">削除</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div>

@endsection