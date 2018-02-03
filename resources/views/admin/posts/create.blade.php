@extends('layouts.admin') 
@section('content')
<h1>create</h1>
    @include('includes.errors')

    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}
        <div class='form-group'>
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class'=>'form-control' ]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('body', 'Body') !!} 
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3 ]) !!}
        </div> 
        <div class='form-group'>
            {!! Form::label('category_id', 'Category') !!} 
            {!! Form::select('category_id', array(''=>'options'), ['class'=>'form-control' ]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('photo_id', 'Photo') !!} 
            {!! Form::file('photo_id', null, ['class'=>'form-control' ]) !!}
        </div>     

        <div class='form-group'>
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@endsection