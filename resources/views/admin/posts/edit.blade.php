@extends('layouts.admin') 
@section('content')
<h1>Edit Post</h1>
    @include('includes.errors') 

    <div class="row">
        <div class="col-md-12">
            <img src="{{ $post->photo ? $post->photo->path : '#' }}" alt="" class="img-responsive img-rounded">
        </div>
    </div>

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
<div class='form-group'>
    {!! Form::label('title', 'Title') !!} {!! Form::text('title', null, ['class'=>'form-control' ]) !!}
</div>
<div class='form-group'>
    {!! Form::label('body', 'Body') !!} {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3 ]) !!}
</div>
<div class='form-group'>
    {!! Form::label('category_id', 'Category') !!} {!! Form::select('category_id',  $categories, null, ['class'=>'form-control'
    ]) !!}
</div>
<div class='form-group'>
    {!! Form::label('photo_id', 'Photo') !!} {!! Form::file('photo_id', null, ['class'=>'form-control' ]) !!}
</div>
<div class='form-group'>
    {!! Form::submit('Update', ['class'=>'btn btn-primary col-xs-4']) !!}
</div>
{!! Form::close() !!}

{!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id] ]) !!}
        <div class="col-xs-4"></div>
        <div class='form-group'>
            {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-xs-4 ' ]) !!}
        </div>
{!! Form::close() !!}

@endsection