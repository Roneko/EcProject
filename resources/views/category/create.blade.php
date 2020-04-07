@extends('admin')

@section('content')
<h4>カテゴリー登録</h4>
@include('layouts.alert')
@include('layouts.error')
<form method="POST" action="{{ route('category.confirm') }}" enctype="multipart/form-data">
<!-- @csrf -->
{{ csrf_field() }}
<div class="container-fluid">
<div class="row">
        <div class="col-md-5 pr-1">
            <div class="form-group">
                <label>カテゴリー名</label>
                <input type="text" class="form-control" placeholder="カテゴリー名" name="name" value="{{ old('name') }}">
            </div>
        </div>
    <button type="submit" class="btn btn-info btn-fill pull-right">作成</button>
    <div class="clearfix"></div>
</div>
</form>
@endsection