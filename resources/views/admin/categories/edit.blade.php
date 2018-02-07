@extends('layouts.admin') 
@section('content')
<h1>Edit Category</h1>

<div class="col-sm-12">
    {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category]]) !!}
    <div class='form-group'>
        {!! Form::label('name', 'Name') !!} {!! Form::text('name', null, ['class'=>'form-control' ]) !!}
    </div>
    <div class='form-group'>
        {!! Form::submit('Update', ['class'=>'btn btn-primary col-xs-3' ]) !!}
    </div>
    {!! Form::close() !!}
<div class="col-xs-6"></div>
    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id ]]) !!}
    <div class='form-group'>
        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-xs-3' ]) !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection