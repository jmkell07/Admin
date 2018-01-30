@extends('layouts.admin')

@section('content')
    <h1>Users</h1>

    <table class='table'>
        <thead class='thead-inverse'>
            <tr>
                <th>ID</th>
                <th>Profile Pic</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @if ($users)
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td class="img-holder"><img src="{{$user->photo ? $user->photo->path : '#'}}" class="img-responsive img-rounded"></td>
                        <td><a href="{{ route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td class="btn btn-status btn-reverse {{$user->is_active ? 'btn-success' : 'btn-danger' }}">{{$user->is_active ? 'Active':'Not Active'}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection