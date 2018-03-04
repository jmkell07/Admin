@extends('layouts.admin') 
@section('content')
<h1>Replies</h1>
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
        @if (count($replies) > 0 ) @foreach ($replies as $reply)
        <tr>
            <td>{{$reply->id}}</td>
            <td>{{$reply->author}}</td>
            <td>{{$reply->email}}</td>
            <td>{{$reply->body}}</td>

            <td>
                @if ($reply->is_active) {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]])
                !!}
                <div class='form-group'>
                    <input type="hidden" name="is_active" value="0"> {!! Form::submit('Unapprove', ['class'=>'btn btn-danger'
                    ]) !!}
                </div>
                {!! Form::close() !!} @else {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]])
                !!}
                <div class='form-group'>
                    <input type="hidden" name="is_active" value="1"> {!! Form::submit('Approve', ['class'=>'btn btn-success'
                    ]) !!}
                </div>
                {!! Form::close() !!} @endif
            </td>
            <td>
                {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}
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