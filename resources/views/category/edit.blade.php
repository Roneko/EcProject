@extends('admin')

@section('content')
<h4>カテゴリー編集</h4>
@include('layouts.alert')
@include('layouts.error')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 pr-1">
            <div class="form-group">
                <p>カテゴリー名</p>
                <h1>{{ $category->name }}</h1>            
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('category.update', $category)}}" enctype="multipart/form-data" class="col-6">
        <!-- @csrf -->
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label>カテゴリー名</label>
                        <input type="text" class="form-control" placeholder="カテゴリー名" name="name" value="{{ $category->name }}">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-danger float-left" data-toggle="modal" data-target="#deleteModal">削除</button>
            <button type="submit" class="btn btn-info btn-fill pull-right">編集</button>
    </form>
</div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('category.destroy', $category) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">削除確認画面</h4>
                    </div>
                    <div class="modal-body">
                        <label>{{ $category->name }} を削除しますか？</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                        <button type="submit" class="btn btn-danger">削除</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection