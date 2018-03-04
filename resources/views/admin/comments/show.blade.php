@extends('layouts.admin') 
@section('content')
<h1>Comments (NOT IN USE)</h1>
<table class='table'>
    <thead class='thead-inverse'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Body</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if (count($comments) > 0 ) @foreach ($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->author}}</td>
            <td>{{$comment->email}}</td>
            <td>{{$comment->body}}</td>
            <td><a class="btn btn-info" href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
            <td>
                @if ($comment->is_active) {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]])
                !!}
                <div class='form-group'>
                    <input type="hidden" name="is_active" value="0"> {!! Form::submit('Unapprove', ['class'=>'btn btn-danger'
                    ]) !!}
                </div>
                {!! Form::close() !!} @else {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]])
                !!}
                <div class='form-group'>
                    <input type="hidden" name="is_active" value="1"> {!! Form::submit('Approve', ['class'=>'btn btn-success'
                    ]) !!}
                </div>
                {!! Form::close() !!} @endif
            </td>
            <td>
                {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                <div class='form-group'>
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger' ]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach @endif
    </tbody>
</table>
@endsection