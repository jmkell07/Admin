@extends('layouts.admin') 
@section('content')
<h1>Categories</h1>
  <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
        <div class='form-group'>
            {!! Form::label('name', 'Name') !!} {!! Form::text('name', null, ['class'=>'form-control' ]) !!}
        </div>
        <div class='form-group'>
            {!! Form::submit('Create', ['class'=>'btn btn-primary' ]) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-6">  
        <table class='table'>
            <thead class='thead-inverse'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Posts</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @if ($categories) @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{ route('admin.categories.edit', $category->id) }}">{{$category->name}}</a></td>
                    <td>{{ count($category->posts) }}</td>
                    <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'N/A'}}</td>
                    <td>{{$category->updated_at ? $category->updated_at->diffForHumans(): 'N/A'}}</td>
                </tr>
                @endforeach @endif
            </tbody>
        </table>
    </div>
@endsection