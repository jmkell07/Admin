@extends('layouts.admin') 
@section('content')
<h1>Edit User</h1>
<div class="row">
    <div class="col-sm-3">
        <img src="{{ $user->photo->path }}" alt="" class="img-responsive img-rounded">
    </div>
    <div class="col-sm-9">
        {!! Form::model( $user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
        <div class='form-group'>
            {!! Form::label('name', 'Name') !!} 
            {!! Form::text('name', null, ['class'=>'form-control' ]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('email', 'Email') !!} 
            {!! Form::text('email', null, ['class'=>'form-control' ]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('role_id', 'Role') !!} 
            {!! Form::select('role_id', [''=>'Choose Options'] + $roles, null, ['class'=>'form-control'
            ]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('is_active', 'Status') !!} 
            {!! Form::select('is_active', [1=>'Active', 0=>'Not Active'], null, ['class'=>'form-control'
            ]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('password', 'Password') !!} 
            {!! Form::password('password', ['class'=>'form-control' ]) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('profile_pic', 'Profile Pic') !!} 
            {!! Form::file('profile_pic', null, ['class'=>'form-control' ]) !!}
        </div>
        <div class='form-group'>
            {!! Form::submit("Update " . $user->name, ['class'=>'btn btn-primary' ]) !!}
        </div>
        {!! Form::close() !!}
          
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('includes.errors')
        </div>
    </div>
@endsection
