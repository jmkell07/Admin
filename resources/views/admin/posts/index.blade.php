@extends('layouts.admin') 
@section('content')
    <h1>Posts</h1>
    
    <table class='table'>
        <thead class='thead-inverse'>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if ($posts) @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                <td><img class="post-thumb" src="{{$post->photo ? $post->photo->path : '/images/placeholder.png'}}" alt=""></td>
                <td>{{$post->title}}</td>
                <td>{{str_limit($post->body,50)}}...</a>    </td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td><a class="btn btn-primary" href="{{route('admin.comments.show', $post->id)}}">Comments</a></td>
                <td><a class="btn btn-warning" href="{{route('admin.posts.edit', $post->id)}}">Edit</a></td>
                <td><a class="btn btn-info" href="{{route('home.post', $post->id)}}">View</a></td>
            </tr>
            @endforeach @endif
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>

    @include('includes.errors')
@endsection