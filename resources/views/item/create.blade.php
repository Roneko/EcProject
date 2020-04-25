@extends('admin')

@section('content')
<h4>商品登録</h4>
@include('layouts.alert')
@include('layouts.error')
<form method="POST" action="{{ route('item.confirm') }}" enctype="multipart/form-data">
<!-- @csrf -->
{{ csrf_field() }}
<div class="container-fluid">
<div class="row">
        <div class="col-md-5 pr-1">
            <div class="form-group">
                <label>商品名</label>
                <input type="text" class="form-control" placeholder="商品名" name="name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="col-md-5 px-1">
            <div class="form-group">
                <label>価格</label>
                <input type="text" class="form-control" placeholder="例:2,000" name="price" value="{{ old('price') }}">
            </div>
        </div>
  </div>
    <div class="row">
        <div class="col-md-5 pr-1">
            <div class="form-group">
                <label>在庫</label>
                <input type="text" class="form-control" placeholder="例:20" name="quantity" value="{{ old('quantity') }}">
            </div>
        </div>
        <div class="col-md-5 pr-1">
                <div class="form-group">
                    <label>カテゴリー</label>
                    {{ Form::select('category_name', \App\category::select('id', 'name')
                        ->get()->pluck('name','id')->prepend( "選択してください", ""), null, ['class' => 'form-control']) }}
    
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
                <textarea name="text" id="" cols="30" rows="40" class="form-control">{{ old('text') }}</textarea>
            </div>
        </div>
    </div>
    {{ Form::submit('確認', ['class' => 'btn btn-info btn-block']) }}
    {{-- <button class="btn btn-info float-right" type="submit">確認</button> --}}

    <div class="clearfix"></div>
</div>
</form>
@endsection