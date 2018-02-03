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
                <th>ID</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @if ($posts) @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category_id}}</td>
                <td>{{$post->photo_id}}</td>
                <td>{{$post->title}}</a></td>
                <td>{{$post->body}}</a></td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
            @endforeach @endif
        </tbody>
    </table>
    
    @include('includes.errors')
@endsection