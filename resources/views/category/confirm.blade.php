@extends('admin')

@section('content')
<h4>カテゴリー登録</h4>
<form action="{{ route('category.store') }}" method="POST" >
{{ csrf_field() }}
<div class="container-fluid">
<div class="row">
        <div class="col-md-5 pr-1">
            <div class="form-group">
                <h1>{{ $data['name'] }}</h1>            
            </div>
        </div>
    <button type="submit" class="btn btn-info btn-fill pull-right">作成</button>
    <div class="clearfix"></div>
</div>
</form>
@endsection