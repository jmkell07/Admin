@extends('layouts.blog-post')

@section('content')

                    <h1>{{ $post->title}}</h1>
                    <p class="lead">
                        by <a href="#">{{$post->user->name}}</a>
                    </p>
                    <hr>
                    <p><span class="glyphicon glyphicon-time"></span> Posted 
                        {{ $post->created_at}}</p>
                    <hr>
                    <img class="img-responsive" src="{{$post->photo->path}}" alt="">
                    <hr>
                    <p>{{$post->body}}</p>
                    <hr>

            @if (Auth::check() )
                
            
                    <div class="well">
                        <h4>Leave a Comment:</h4>

                {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
                    <div class='form-group'>
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3 ]) !!}
                    </div>
                    <div class='form-group'>
                        {!! Form::submit('Submit', ['class'=>'btn btn-primary' ]) !!}
                    </div>
                {!! Form::close() !!}
                    </div>
                    <hr>
                    <!-- Posted Comments -->
            @endif

            @if (count($comments) > 0)
                @foreach ($comments as $comment)
                    <div class="media well">
                        <a href="#" class="pull-left">
                            <img style="max-width:75px;" src="{{$comment->gravatar}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$comment->author}} <small>{{$comment->created_at->diffForHumans()}}</small></h4>
                           
                            <p>{{ $comment->body }}</p>
                        </div>

                        <div class="reply-container">
                        
                        @if( count($comment->replies) > 0 )
                        @foreach ($comment->replies as $reply)
                        @if ($reply->is_active)
                            
                        <div class="media well nested">
                                                <a href="#" class="pull-left">
                            <img style="max-width:75px;" src="{{$reply->gravatar}}" alt="">
                        </a>
<h4 class="media-heading">{{$reply->author}} <small>{{$reply->created_at->diffForHumans()}}</small></h4>
<p>{{ $reply->body }}</p>
                    </div>
                    @endif
                    @endforeach
                    @endif

{!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply', 'class'=> '']) !!}
<div class='form-group'>
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <input type="hidden" name="comment_id" value="{{$comment->id}}"> {!! Form::textarea('body', null, ['class'=>'form-control',
    'rows'=>3 ]) !!}
</div>
<div class='form-group'>
    {!! Form::submit('Submit', ['class'=>'btn btn-primary' ]) !!}
</div>
{!! Form::close() !!}

@if (Auth::user())
    <button class="toggle-reply btn btn-primary pull-right">Reply</button>    
@endif


                </div>
                    </div>
                @endforeach
            @endif
            
@endsection

@section('categories')
    <ul class="list-unstyled">
           <li><a href="#">{{$post->category->name}}</a></li> 
    </ul>
@endsection

@section('script')
    <script>
        $('.toggle-reply').click(function(){
           // $(this).parent().find('.media.nested').toggle();
            $(this).parent().find('form').slideToggle();
            $(this).slideToggle();
        });
    </script>
@endsection