@extends('layouts.admin')

@section('content')
    <h1>Media</h1>

@if($photos)
    <table class='table'>
        <thead class='thead-inverse'>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Path</th>
                <th>Created</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($photos as $photo)
                <tr>
                    <td>{{$photo->id }}</td>
                    <td><img style="max-width:200px;" src="{{$photo->path }}" alt=""></td>
                    <td>{{$photo->path }}</td>
                    <td>{{$photo->created_at ? $photo->created_at : 'N/A'}}</td>
                    <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}
                        <div class='form-group'>
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger' ]) !!}
                        </div>
                    {!! Form::close() !!}    
                    </td>     
                </tr>   
            @endforeach

        </tbody>
    </table>
@endif


@endsection