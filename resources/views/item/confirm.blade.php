@extends('admin')

@section('content')
<h4>商品登録</h4>
<form method="POST" action="{{ route('item.store') }}">
{{ csrf_field() }}
<div class="row">
        <div class="col-md-5 pr-1">
            <div class="form-group">
            <h4>{{ $data['name'] }}</h4>
            </div>
        </div>
        <div class="item-content__image-box">
            <img style="width:100%;height:auto;"src="{{ asset($data['read_temp_path']) }}" alt="img" class="item-content__image">
        </div>
            <div class="col-md-5 px-1">
            <div class="form-group">
                <h6>¥{{ $data['price'] }}(税込)</h6>
            </div>
        </div>
  </div>
    <div class="row">
        <div class="col-md-5 pr-1">
            <div class="form-group">
                <h6>在庫：{{ $data['quantity'] }}</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
            <h6>{{ $data['text'] }}</h6>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-info btn-fill pull-right">作成</button>
    <div class="clearfix"></div>