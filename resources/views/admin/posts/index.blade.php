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
            </tr>
        </thead>
        <tbody>
            @if ($posts) @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                <td><img class="post-thumb" src="{{$post->photo ? $post->photo->path : '/images/placeholder.png'}}" alt=""></td>
                <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                <td>{{str_limit($post->body,50)}}...</a></td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
            </tr>
            @endforeach @endif
        </tbody>
    </table>
    
    @include('includes.errors')
@endsection